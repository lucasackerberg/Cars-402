<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|string',
            'color' => 'required|string',
            'registration' => 'required|string',
            'problem_description' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Create a new car record in the database
        $car = new Car([
            'status' => 'Pending',
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'registration' => $request->input('registration'),
            'problem_description' => $request->input('problem_description'),
        ]);

        // Associate the car with the authenticated user
        $user->cars()->save($car);

        return redirect()->route('dashboard')->with('success', 'Car created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|string',
            'color' => 'required|string',
            'registration' => 'required|string',
            'problem_description' => 'required|string',
        ]);

        $car->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'registration' => $request->input('registration'),
            'problem_description' => $request->input('problem_description'),
        ]);

        return redirect()->back()->with('success', 'Car status updated successfully');
    }

    /**
     * View a single
     */
    public function viewCar(int $carId)
    {
        $user = Auth::user();
        $car = Car::where('id', $carId)->first();
 
        return view('viewCar', [
            'car' => $car,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function completeCar(Car $car)
    {
        $car->update(['status' => 'Complete']);

        return redirect()->back()->with('success', 'Car status updated successfully');
    }

    public function completedCars()
    {
        $completedCars = Car::where('status', 'Complete')->get();

        return view('completedCars', ['completedCars' => $completedCars]);
    }

    public function CreateCar()
    {
        return view('addNewCar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
