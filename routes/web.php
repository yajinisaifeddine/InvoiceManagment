<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::View('/account/create', 'account.create')->name("account.create");
Route::post('/account/create', [AccountController::class, 'store'])->name('account.store');



// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Protected Routes (require authentication)
Route::middleware('custom.auth')->group(function () {

    Route::get('/', function () {
        return redirect('/company');
    });

    Route::View('/account', 'account.index')->name('account.index');
    Route::get("/account/{id}/edit", [AccountController::class, 'edit'])->name("account.edit");
    Route::put("/account/{id}/update", [AccountController::class, "update"])->name("account.update");





    Route::resource('company', CompanyController::class);

    Route::get('/company/{company}/delete', [CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/company/sort/{sort}');




    Route::resource('invoice', InvoiceController::class);

    Route::get('/company/{company}/add-invoice', [InvoiceController::class, 'create'])->name('invoice.create');

    Route::post('/company/{company}/add-invoice', [InvoiceController::class, 'store'])->name('invoice.store');

    Route::get('/company/{company}/delete-invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');

    Route::get('/invoice/{id}/print', [InvoiceController::class,   'print'])->name('invoice.print');

    Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');





    Route::resource('payment', PaymentController::class);

    Route::get('/company/{company}/add-payment', [PaymentController::class, 'create'])->name('payment.create');

    Route::post('/company/{company}/add-payment', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('/company/{company}/delete-payment/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');

    Route::get('/payment/{id}/print', [PaymentController::class,   'print'])->name('payment.print');

    Route::get('/payment/{id}/download', [PaymentController::class, 'download'])->name('payment.download');



    Route::post('/clear-session', function () {
        session()->forget(['success', 'error']);
        return response()->json(['status' => 'success']);
    })->name('clear-session');
});

use App\Http\Controllers\Auth\VerificationController;

// Email verification routes
Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');
