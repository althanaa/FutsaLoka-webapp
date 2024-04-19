<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;

use Illuminate\Http\Request;

class BookingListController extends Controller
{
    public function index()
    {
        // Get today's date
        $today = Carbon::today()->toDateString();

        // Fetch bookings from today onwards and sorted by start date
        $bookings = Booking::whereDate('date_start', '>=', $today)
                            ->orderBy('date_start')
                            ->get();

        // Pass the bookings to the view
        return view('bookinglist', compact('bookings'));
    }
}

