<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('riwayat', compact('bookings'));
    }
}
