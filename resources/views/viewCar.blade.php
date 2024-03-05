@include('header')
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
            <button type="submit">Update Car</button>
        </form>
    </div>
</div>
@include('footer')