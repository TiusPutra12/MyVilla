<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('Homepage');
});

// Admin Panel Routes
Route::get('/admin', [BookingController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.booking.status');

// API Route for Booking Submission (Without CSRF since frontend submits via pure JS currently, wait I should use standard web route or API? I'll use standard web route but disable CSRF for it if needed, or add CSRF to the form. Laravel 11 automatically protects web routes with CSRF).
// Let's use standard POST and ensure CSRF token is sent.
Route::post('/api/bookings', [BookingController::class, 'store'])->name('api.bookings.store');