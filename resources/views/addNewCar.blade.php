@include('header')
@include('navbar')

<div class="addNewCarWrapper">
    <div class="addNewCarForm">
        <form action="/createCar" method="POST" class="createCarForm">
            @csrf
            <h2>Add new car</h2>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input name="brand" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input name="year" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input name="color" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="registration">Registration</label>
                <input name="registration" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-danger btn-lg">Create Car</button>
        </form>
    </div>
</div>

@include('footer')
