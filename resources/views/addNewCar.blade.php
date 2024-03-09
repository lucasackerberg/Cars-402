@include('header')
@include('navbar')
<div class="addNewCarWrapper">
    <div class="addNewCarForm">
        <form action="/createCar" method="POST" class="createCarForm">
            @csrf
            <h2>Create car</h2>
            <div class="mb-3">
                <label for="brand">Brand</label>
                <input name="brand" type="text">
            </div>
            <div>
                <label for="model">Model</label>
                <input name="model" type="text">
            </div>
            <div>
                <label for="year">Year</label>
                <input name="year" type="text">
            </div>
            <div>
                <label for="color">Color</label>
                <input name="color" type="text">
            </div>
            <div>
                <label for="registration">Registration</label>
                <input name="registration" type="text">
            </div>
            <div>
                <label for="problem_description">Problem Description</label>
                <textarea name="problem_description"></textarea>
            </div>
            <button type="submit">Create Car</button>
        </form>
    </div>
</div>
@include('footer')