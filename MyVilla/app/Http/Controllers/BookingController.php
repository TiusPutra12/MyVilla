<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
    // API endpoint for submitting a booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'total_price' => 'required|numeric',
        ]);

        $booking = Booking::create($validated);

        // Format WA message
        $waText = "Halo MyVilla, saya ingin memesan vila dengan detail berikut:\n\n";
        $waText .= "*Nama Pemesan:* " . $booking->name . "\n";
        $waText .= "*Check In:* " . $booking->check_in . "\n";
        $waText .= "*Check Out:* " . $booking->check_out . "\n";
        $waText .= "*Tamu:* " . $booking->adults . " Dewasa, " . $booking->children . " Anak-anak\n";
        $waText .= "*Total Estimasi:* Rp " . number_format($booking->total_price, 0, ',', '.') . "\n\n";
        $waText .= "Mohon info ketersediaan dan cara pembayarannya. Terima kasih.";

        $waNumber = '6282247011652';
        $waUrl = 'https://wa.me/' . $waNumber . '?text=' . urlencode($waText);

        return redirect($waUrl);
    }

    // Admin Dashboard View
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('bookings'));
    }

    // Admin Action: Accept or Reject
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:accepted,rejected'
        ]);

        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diubah!');
    }
}
