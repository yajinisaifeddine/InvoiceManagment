<?php

namespace App\Http\Controllers;


use App\Models\invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class InvoiceController extends Controller
{

    /**
     * Display a listing of the invoices.
     */
    public function index()
    {
        // Fetch all invoices with their associated company
        $invoices = Invoice::with('company')->get();
        return view('invoice.index', compact('invoices'));
    }


    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoice.show', compact('invoice'));
    }
    /**
     * Show the form for creating a new invoice.
     */
    public function create($company = null)
    {
        // If companyId is provided, fetch the company

        return view('invoice.create', compact('company'));


        // If no companyId is provided, show a generic create form

    }

    /**
     * Store a newly created invoice in the database.
     */
    public function store(Request $request, $companyId)
    {
        // Validate the request data
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'number' => 'required|string|max:255|unique:invoices',
                'date' => 'nullable|date',
                'amount' => 'required|numeric|min:0',
                'copy' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            ]);

            // Set default value for date if not provided
            $validatedData['date'] = $validatedData['date'] ?? now();

            // Add the company_id to the validated data
            $validatedData['company_id'] = $companyId;

            // Handle file upload for 'copy'
            if ($request->hasFile('copy')) {
                $filePath = $request->file('copy')->store('invoices', 'public');
                $validatedData['copy'] = $filePath;
            }

            // Create the invoice
            Invoice::create($validatedData);

            // Redirect with a success message
            return redirect()->route('company.show', $companyId)
                ->with('success', 'Invoice created successfully!');
        } catch (Exception $e) {
            return redirect()->route('invoice.create', $companyId)
                ->with('error', 'Invoice was not created ! ' . $e->getMessage());
        }
    }

    /**
     * Display the specified invoice.
     */


    /**
     * Show the form for editing the specified invoice.
     */
    public function edit($id)
    {
        // Fetch the invoice by ID
        $invoice = Invoice::findOrFail($id);

        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified invoice in the database.
     */
    public function update(Request $request, $id)
    {
        // Fetch the invoice by ID
        try {

            $invoice = Invoice::findOrFail($id);

            // Validate the request data
            $validatedData = $request->validate([
                'number' => 'required|string|max:255|unique:invoices,number,' . $invoice->id,
                'date' => 'nullable|date',
                'amount' => 'required|numeric|min:0',
                'copy' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            ]);

            if (!$request->date) {
                $validatedData['date'] = $invoice->date;
            }

            // Handle file upload for 'copy'
            if ($request->hasFile('copy')) {
                // Delete the old file if it exists
                if ($invoice->copy) {
                    Storage::disk('public')->delete($invoice->copy);
                }

                // Store the new file
                $filePath = $request->file('copy')->store('invoices', 'public');
                $validatedData['copy'] = $filePath;
            }

            // Update the invoice
            $invoice->update($validatedData);
            // dd($invoice);

            // Redirect with a success message
            return redirect()->route('company.show', $invoice->company_id)
                ->with('success', 'Invoice updated successfully!');
        } catch (Exception $e) {
            return redirect()->route('invoice.edit', $invoice->id)
                ->with('error', 'Invoice was updated !' . $e->getMessage());
        }
    }

    /**
     * Remove the specified invoice from the database.
     */
    public function destroy($company, $id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->delete();
            return redirect()->route('company.show', $company)->with('success', 'Invoice deleted successfully!');
        } catch (Exception $e) {
            return redirect()->route('company.show', $company)->with('error', 'Invoice was not deleted! ' . $e->getMessage());
        }
    }

    public function download($id) {}
    public function print($id) {}
}
