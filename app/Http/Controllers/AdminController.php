<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->get();
        $totalUsers = User::count();
        return view('admin.index', compact('bookings', 'totalUsers'));
    }

    public function deleteBooking($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Booking deleted!');
    }
}