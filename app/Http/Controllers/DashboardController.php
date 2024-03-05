<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $cars = Car::where('status', 'Pending')->get();
        return view('dashboard', [
            'user' => $user,
            'cars' => $cars,
        ]);
    }
}
