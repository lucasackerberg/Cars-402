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
        $cars = Car::where('status', 'Pending')->where('user_id', 0)->get();
        $assignedCars = $user->cars()->where('status', 'Ongoing')->get();
        return view('dashboard', [
            'user' => $user,
            'cars' => $cars,
            'assignedCars' => $assignedCars,
        ]);
    }
}
