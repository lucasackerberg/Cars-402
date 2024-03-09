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

        // Create a new car record in the database
        $car = new Car([
            'user_id' => 0,
            'status' => 'Pending',
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'registration' => $request->input('registration'),
            'problem_description' => $request->input('problem_description'),
        ]);
        $car->save();
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

    //view all cars
    public function allCars()
    {
        $cars = Car::all();

        return view('allCars', ['cars' => $cars]);
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

    public function assignMechanic(Car $car)
    {
        $car->update(['user_id' => auth()->id()]);
        $car->update(['status' => 'Ongoing']);

        return redirect()->back()->with('success', 'Car assigned successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
