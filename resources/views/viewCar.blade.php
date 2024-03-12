@include('header')
@include('navbar')

<div class="addNewCarWrapper">
    <div class="addNewCarForm">
        <form action="{{ route('updateCar', ['car' => $car->id]) }}" method="POST" class="updateCarForm">
            @csrf

            <div class="editCarForm">
            <h2 class="editCar">Edit car</h2>
                <form action="{{ route('destroy', ['car' => $car->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark btn-sm">Delete this car</button>
                </form>
            </div>
           
            <div class="form-group">
                <label for="brand">Brand</label>
                <input name="brand" type="text" value="{{ $car->brand }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input name="model" type="text" value="{{ $car->model }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input name="year" type="text" value="{{ $car->year }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input name="color" type="text" value="{{ $car->color }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="registration">Registration</label>
                <input name="registration" type="text" value="{{ $car->registration }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description" class="form-control">{{ $car->problem_description }}</textarea>
            </div>
            <button type="submit" class="btn btn-danger btn-lg">Update</button>
        </form>
       
    </div>
</div>

@include('footer')
