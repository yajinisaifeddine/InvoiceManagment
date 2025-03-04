<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //

    public function index()
    {
        return view("account.index");
    }

    public function create()
    {
        return view("account.create");
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'nullable|string|max:20',
                'password' => 'required|string|min:8|confirmed',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle the profile picture upload
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logo', 'public');
                $validatedData['logo'] = $logoPath;
            }

            // Hash the password
            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['name'] = ucwords($validatedData['name']);
            // Create the account


            $account = User::create($validatedData);

            auth('CustomAuth')->login($account);
            // Redirect or return a response
            return redirect()->route('company.index')->with('success', 'Account created successfully!');
        } catch (Exception $e) {

            return redirect()->route('account.create')->with('error', 'Account was not created! ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the edit view
        return view('account.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Fetch the authenticated user
            $user = User::findOrFail($id);
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'nullable|string|max:20',
                'password' => 'nullable|string|min:8|confirmed',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle the logo upload
            if ($request->hasFile('logo')) {
                // Delete the old logo if it exists
                if ($user->logo && Storage::disk('public')->exists($user->logo)) {
                    Storage::disk('public')->delete($user->logo);
                }

                // Store the new logo
                $logoPath = $request->file('logo')->store('logos', 'public');
                $validatedData['logo'] = $logoPath;
            }

            // Hash the password if provided
            if ($request->filled('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']); // Remove password from the array if not provided
            }

            // Update the user
            $user->update($validatedData);

            // Redirect with success message
            return redirect()->route('account.index', $id)->with('success', 'Account updated successfully!');
        } catch (Exception $e) {
            // Log the error and redirect with an error message
            return redirect()->route('account.edit', $id)->with('error', 'Account was not updated! ' . $e->getMessage());
        }
    }
}
