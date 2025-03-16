<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\invoice;
use App\Models\payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{

    public function index()
    {
        $sort = request()->get('sort');
        $search = request()->get('search'); // Using the request helper
        $user = auth('CustomAuth')->id();
        // Retrieve companies based on the search parameter
        $companies = Company::where('user_id', $user)
            ->when($search, fn($query) => $query->where(fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('director', 'like', "%{$search}%")
            )
            )
            ->with(['payments', 'invoices']) // Eager load relationships
            ->get()
            ->map(fn($company) => [
                'company' => $company,
                'payment_amount' => $company->payments->sum('amount'),
                'invoice_amount' => $company->invoices->sum('amount'),
                'difference' => $company->payments->sum('amount') - $company->invoices->sum('amount'),
            ]);


        // Sort the merged collection based on the sort parameter
        if ($sort) {
            switch ($sort) {
                case 'name_asc':
                    $companies = $companies->sortBy(fn($item) => $item['company']->name);
                    break;
                case 'name_desc':
                    $companies = $companies->sortByDesc(fn($item) => $item['company']->name);
                    break;
                case 'inv_asc':
                    $companies = $companies->sortBy(fn($item) => $item['invoice_amount']);
                    break;
                case 'inv_desc':
                    $companies = $companies->sortByDesc(fn($item) => $item['invoice_amount']);
                    break;
                case 'pay_asc':
                    $companies = $companies->sortBy(fn($item) => $item['payment_amount']);
                    break;
                case 'pay_desc':
                    $companies = $companies->sortByDesc(fn($item) => $item['payment_amount']);
                    break;
                case 'diff_asc':
                    $companies = $companies->sortBy(fn($item) => $item['difference']);
                    break;
                case 'diff_desc':
                    $companies = $companies->sortByDesc(fn($item) => $item['difference']);
                    break;
                default:
                    break;
            }
        }

        // Reset the keys after sorting
        $companies = $companies->values();

        return view('company.index', compact('companies', 'search'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $invoices = Invoice::where('company_id', $id)->get();
        $totalInvoiceAmount = $invoices->sum('amount');


        $payments = Payment::where('company_id', $id)->get();
        $totalPaymentAmount = $payments->sum('amount');


        $difference = $totalInvoiceAmount - $totalPaymentAmount;
        $differenceColor = $difference > 0 ? 'text-red-700' : 'text-green-700';
        $difference = $difference > 0 ? $difference : $difference * -1;

        return view('company.company', compact(
            'company',
            'invoices',
            'payments',
            'totalPaymentAmount',
            'totalInvoiceAmount',
            'differenceColor',
            'difference'

        ));
    }


    public function create()
    {
        return View('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        try {
            $user = auth('CustomAuth')->user();

            if (!$user) {
                return redirect()->route('login.form')->with('error', 'You must be logged in to add a company.');
            }

            $validatedData = $request->only(['name', 'director', 'email', 'phone']);
            $validatedData['user_id'] = $user->id; // ✅ Correctly assigning user ID

            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
            }

            $company = Company::create($validatedData);

            return redirect()->route('company.index')->with('success', 'Company added successfully!');
        } catch (Exception $e) {
            return redirect()->route('company.create')->with('error', 'An error occurred while adding the company: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return View('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        // Find the company by ID
        $company = Company::findOrFail($id);

        // Default to the existing logo
        $logoPath = $company->logo; // Ensure there's always a value

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if (!empty($company->logo) && Storage::disk('public')->exists($company->logo)) {
                Storage::disk('public')->delete($company->logo);
            }
            // Store the new logo
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        try {
            // Update the company details
            $updated = $company->update([
                'name' => $request->name,
                'director' => $request->director,
                'email' => $request->email,
                'phone' => $request->phone,
                'logo' => $logoPath, // Store new logo or keep the existing one
            ]);

            return redirect()->route('company.show', ['company' => $id])
                ->with('success', 'Company updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('company.edit', ['company' => $id])
                ->with('error', 'An error occurred while updating the company: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();
            return redirect()->route('company.index')->with('success', 'Company deleted successfully!');
        } catch (Exception $e) {
            return redirect()->route('company.index')->with('error', 'Company was deleted!');
        }
    }
}
