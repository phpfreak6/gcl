<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {

        $mybookings = [];
        if (Auth::User()->roles[0]->id == 1) {
            $mybookings = Booking::all();
        } else {
            $mybookings = Auth::User()->bookings;
        }
        return view('bookings.index', compact('mybookings'));
    }
}
