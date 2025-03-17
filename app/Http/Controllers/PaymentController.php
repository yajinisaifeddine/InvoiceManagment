<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\company;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        // Fetch all payments with their associated company
        $payments = Payment::with('company')->get();

        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create($company)
    {
        // Fetch the company by ID


        return view('payment.create', compact('company'));
    }

    /**
     * Store a newly created payment in the database.
     */
    public function store(Request $request, $companyId)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'amount' => 'required|numeric|min:0',
            'copy' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Max 2MB
        ]);

        // Set default value for date if not provided
        $validatedData['date'] = $validatedData['date'] ?? now();

        // Add the company_id to the validated data
        $validatedData['company_id'] = $companyId;

        // Handle file upload for 'copy'
        if ($request->hasFile('copy')) {
            $filePath = $request->file('copy')->store('payments', 'public');
            $validatedData['copy'] = $filePath;
        }

        // Create the payment
        Payment::create($validatedData);

        // Redirect with a success message
        return redirect()->route('company.show', $companyId)
            ->with('success', 'Payment created successfully!');
    }

    /**
     * Display the specified payment.
     */
    public function show($id)
    {
        // Fetch the payment by ID with its
        // associated company


        $payment = Payment::findOrFail($id);
        return view('payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit($id)
    {
        // Fetch the payment by ID
        $payment = Payment::findOrFail($id);

        return view('payment.edit', compact('payment'));
    }

    /**
     * Update the specified payment in the database.
     */
    public function update(Request $request, $id)
    {
        // Fetch the payment by ID
        try {

            $payment = Payment::findOrFail($id);

            // Validate the request data
            $validatedData = $request->validate([
                'type' => 'required|string|max:255',
                'amount' => 'required|numeric|min:0',
                'date' => 'nullable|date',
                'description' => 'nullable|string|max:255',
                'copy' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Max 2MB
            ]);
            if (!$validatedData['date']) {
                $validatedData['date'] = $payment->date;
            }

            // Handle file upload for 'copy'
            if ($request->hasFile('copy')) {
                // Delete the old file if it exists
                if ($payment->copy) {
                    Storage::disk('public')->delete($payment->copy);
                }

                // Store the new file
                $filePath = $request->file('copy')->store('payments', 'public');
                $validatedData['copy'] = $filePath;
            }

            // Update the payment
            //dd($validatedData);
            $payment->update($validatedData);
            // Redirect with a success message
            return redirect()->route('company.show', $payment->company_id)
                ->with('success', 'Paiement créé avec succès !');
        } catch (Exception $e) {
            return redirect()->route('payment.edit', $payment->id)->with('error', ' Le paiement n\'a pas été créé !');
        }
    }

    public function destroy($company, $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return redirect()->route('company.show', $company)->with('success', 'Paiement supprimé avec succès !');
        } catch (Exception $e) {
            return redirect()->route('company.show', $company)->with('error', 'Le paiement n\'a pas été supprimé ! ' );
        }
    }
    public function download($id)
    {
        $payment = Payment::findOrFail($id);
        $filePath = public_path("storage/{$payment->copy}"); // Absolute path

        if (!File::exists($filePath)) {
            abort(404, 'payment file not found.');
        }
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $fileName = "payment-{$payment->date}.{$extension}";


        return Response::download($filePath, $fileName);
    }
}
