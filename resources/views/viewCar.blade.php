@include('header')
@include('navbar')


<div class="addNewCarWrapper">
    <div class="addNewCarForm">


            <h2 class="editCar">Edit car</h2>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('updateCar', ['car' => $car->id]) }}" method="POST" class="updateCarForm">
            @csrf
            <div class="form-group">
                <label for="brand">Brand</label>
                <input name="brand" type="text" value="{{ $car->brand }}" class="form-control">
            </div>
            @error('brand')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="model">Model</label>
                <input name="model" type="text" required value="{{ $car->model }}" class="form-control">
            </div>
            @error('model')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="year">Year</label>
                <input name="year" type="text" required value="{{ $car->year }}" class="form-control">
            </div>
            @error('year')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="color">Color</label>
                <input name="color" type="text" required value="{{ $car->color }}" class="form-control">
            </div>
            @error('color')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="registration">Registration</label>
                <input name="registration" type="text" required value="{{ $car->registration }}" class="form-control">
            </div>
            @error('registration')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description" required class="form-control">{{ $car->problem_description }}</textarea>
            </div>
            @error('problem_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit" class="btn btn-danger btn-lg">Update</button>
        </form>

        <div class="editCarForm">
            <form action="{{ route('destroy', ['car' => $car->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark btn-sm">Delete this car</button>
            </form>
        </div>
       
    </div>
</div>

@include('footer')
