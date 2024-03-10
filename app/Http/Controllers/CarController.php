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
    public function allCars(Request $request, $col = 'created_at', $sort = 'asc')
    {
        $user = Auth::user();
        $cars = Car::orderBy($col, $sort)->get();

        if($sort === 'asc'){
            $changeSort = 'desc';
        } else {
            $changeSort = 'asc';
        }

        return view('allCars', ['cars' => $cars, 'changeSort' => $changeSort, 'user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function completeCar(Car $car)
    {
        $user = Auth::user();

        $car->update(['status' => 'Complete', 'user' => $user]);

        return redirect()->back()->with('success', 'Car status updated successfully');
    }

    public function completedCars()
    {
        $user = Auth::user();
        $completedCars = Car::where('status', 'Complete')->get();

        return view('completedCars', ['completedCars' => $completedCars, 'user' => $user]);
    }

    public function CreateCar()
    {   
        $user = Auth::user();
        return view('addNewCar', ['user' => $user]);
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
    $car->delete();

    return redirect()->route('dashboard')->with('success', 'Car deleted successfully');
    }

    


}
