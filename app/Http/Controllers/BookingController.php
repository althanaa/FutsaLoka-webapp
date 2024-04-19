<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // method untuk menampilkan halaman booking
    public function index(Request $request)
    {
        // berisi data booking user saat ini
        $bs = Booking::all();
        return view('booking', compact('bs'));
    }

    // menampilkan halaman checkout
    public function checkout(Request $request)
    {
        // melakukan query sesuai jenis & lokasi lapangan yang dipilih
        $selected_lapangan = Lapangan::query()
            ->where('lokasi', $request->lokasi)
            ->where('jenis', $request->jenis)
            ->first();

        $date_start = $request->date_start;
        $date_end = $request->date_end;

        $is_exist = Booking::query()
            ->where('lapangan_id', '=', $selected_lapangan->id) // lapangan harus berbeda
            ->where(function ($query) use ($date_start, $date_end) {
                $query->whereBetween('date_start', [$date_start, $date_end])
                    ->orWhereBetween('date_end', [$date_start, $date_end])
                    ->orWhere(function ($query) use ($date_start, $date_end) {
                        $query->where('date_start', '<', $date_start)
                                ->where('date_end', '>', $date_end);
                    });
            })
            ->get();

        if ($is_exist->isNotEmpty()) {
            return back()->with('failed-booking', $is_exist)->withInput($request->input());
        }

        $sewa_sepatu = $request->sewa_sepatu ? 50000 : 0;
        $sewa_kostum = $request->sewa_kostum ? 45000 : 0;

        // total durasi dalam satuan menit (date_end - date_start)
        $total_durasi_in_minutes = Carbon::parse($request->date_end)->diffInMinutes($request->date_start);
        $total_harga = (($selected_lapangan->price / 60) + ($sewa_kostum /60) + ($sewa_sepatu/60)) * $total_durasi_in_minutes;
            // dd($total_durasi_in_minutes, ($selected_lapangan->price / 60));
        $name = $request->name;
        $no_tlp = $request->no_tlp;

        return view('checkout', compact('selected_lapangan', 'date_start', 'date_end', 'total_harga', 'total_durasi_in_minutes', 'sewa_sepatu', 'sewa_kostum', 'name', 'no_tlp'));
    }

    // melakukan proses booking / checkout
    public function booking(Request $request)
    {
        $selected_lapangan = Lapangan::find($request->selected_lapangan_id);

        Booking::create([
            'lapangan_id' => $selected_lapangan->id,
            'price' => $selected_lapangan->price,
            'total_price' => $request->total_harga,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'name' => $request->name,
            'no_tlp' => $request->no_tlp,
            'pay' => $request->pay
        ]);

        return redirect('/booking')->with('success-booking');
    }
}
