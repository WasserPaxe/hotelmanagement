<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::count();
        $bookings = Booking::count();
        $rooms = Room::count();
        $roomAvailabe = Room::where('status', 'Disponível')->count();
        //return view('home');
        return view('admin.dash.index', compact('rooms', 'bookings', 'roomAvailabe', 'customers'));
    }
}
