<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_name' => 'required',
            'hours' => 'required|numeric|min:1',
            'nid_file' => 'required|file',
            'dl_file' => 'required|file',
        ]);

        $nidPath = $request->file('nid_file')->store('documents', 'public');
        $dlPath = $request->file('dl_file')->store('documents', 'public');

        $bikePrice = explode('=', $request->bike_name)[1] ?? 200;
        $totalRent = $request->hours * $bikePrice;

        Booking::create([
            'user_id' => auth()->id(),
            'bike_name' => $request->bike_name,
            'hours' => $request->hours,
            'total_rent' => $totalRent,
            'nid_file' => $nidPath,
            'dl_file' => $dlPath,
            'status' => 'pending',
        ]);

        return view('booking.confirm');
    }
    public function myBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())->latest()->get();
        return view('booking.mybookings', compact('bookings'));
    }
}