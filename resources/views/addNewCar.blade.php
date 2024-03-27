@include('header')
@include('navbar')

<div class="addNewCarWrapper">
    <div class="addNewCarForm">
        <form action="/createCar" method="POST" class="createCarForm">
            @csrf
            <h2>Add new car</h2>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input name="brand" type="text" required class="form-control">
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input name="model" type="text" required class="form-control">
                @error('model')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input name="year" type="text" required class="form-control">
                @error('year')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input name="color" type="text" required class="form-control">
                @error('color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="registration">Registration</label>
                <input name="registration" type="text" required class="form-control">
                @error('registration')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description" required class="form-control"></textarea>
                @error('problem_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger btn-lg">Add</button>
        </form>
    </div>
</div>

@include('footer')
