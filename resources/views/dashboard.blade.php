@include('header')
<div class="content">
    <h3>Welcome, {{ $user->name }}!</h3>
    <h4>These are the current repairs inside the shop</h4>
    <div class="dashboardWrapper">
        <button class="loginButton addNewCarButton"><a href="/completedCars">See completed cars here!</a></button>
        @foreach($cars as $car)
        <div>
            <h3>{{ $car->status }} {{ $car->brand }} {{ $car->model }} Year: {{ $car->year }} </h3>
            <form action="{{ route('completeCar', ['car' => $car->id]) }}" method="POST" class="updateStatusForm">
                @csrf
                @method('PUT')
                <button type="submit">Move to Completed</button>
            </form>
        </div>
        @endforeach
        <button class="loginButton addNewCarButton"><a href="/addnewcar">Add new car</a></button>
    </div> 
</div>
@include('footer')