@include('header')
@include('navbar')
<div class="addNewCarWrapper">
    <div class="addNewCarForm">
        <form action="{{ route('updateCar', ['car' => $car->id]) }}" method="POST" class="updateCarForm">
            @csrf
            <h2>Edit car</h2>
            <div>
                <label for="brand">Brand</label>
                <input name="brand" type="text" value="{{ $car->brand }}">
            </div>
            <div>
                <label for="model">Model</label>
                <input name="model" type="text" value="{{ $car->model }}">
            </div>
            <div>
                <label for="year">Year</label>
                <input name="year" type="text" value="{{ $car->year }}">
            </div>
            <div>
                <label for="color">Color</label>
                <input name="color" type="text" value="{{ $car->color }}">
            </div>
            <div>
                <label for="registration">Registration</label>
                <input name="registration" type="text" value="{{ $car->registration }}">
            </div>
            <div>
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description">{{ $car->problem_description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Car</button>
        </form>
        <form action="{{ route('destroy', ['car' => $car->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Delete Car</button>
        </form>
    </div>
</div>
@include('footer')