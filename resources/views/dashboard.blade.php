@include('header')
<div class="content">
    <h3>Welcome, {{ $user->name }}!</h3>
    <h4>The following cars are yours:</h4>
    <div class="dashboardWrapper">
        @foreach($cars as $car)
        <div>
            <h3>{{ $car->status }} {{ $car->brand }} {{ $car->model }} Year: {{ $car->year }} </h3>
        </div>
        @endforeach
    </div>
    <form action="/createCar" method="POST" class="createCarForm">
        @csrf
        <h2>Create car</h2>
        <div>
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
@include('footer')