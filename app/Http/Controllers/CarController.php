<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Show the form for creating a new resource.
    public function create(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
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
        $user = Auth::user();

        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
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


   // View a single car
    public function viewCar(int $carId)
    {
        $user = Auth::user();
        $car = Car::where('id', $carId)->first();
 
        return view('viewCar', [
            'car' => $car,
            'user' => $user,
        ]);
    }

    // View all cars
    public function allCars(Request $request, $col = 'created_at', $sort = 'asc')
    {
        $user = Auth::user();
        $cars = Car::orderBy($col, $sort)->get();

        if($sort === 'asc'){
            $changeSort = 'desc';
        } else {
            $changeSort = 'asc';
        }

        return view('allCars', [
            'cars' => $cars, 
            'changeSort' => $changeSort, 
            'user' => $user
        ]);
    }

   // Change status to complete
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

        return view('completedCars', [
            'completedCars' => $completedCars, 
            'user' => $user
        ]);
    }

    // Adding new car
    public function CreateCar()
    {   
        $user = Auth::user();
        return view('addNewCar', ['user' => $user]);
    }

    //Assigning a mechanic to a specific car
    public function assignMechanic(Car $car)
    {
        $car->update(['user_id' => auth()->id()]);
        $car->update(['status' => 'Ongoing']);

        return redirect()->back()->with('success', 'Car assigned successfully');
    }

    //Deleting a car
    public function destroy(Car $car)
    {
    $car->delete();

    return redirect()->route('dashboard')->with('success', 'Car deleted successfully');
    }

    


}
