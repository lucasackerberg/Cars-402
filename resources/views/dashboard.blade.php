@include('header')
<div class="content">
    <h3>Welcome, {{ $user->name }}!</h3>
    <h4>These are the current repairs inside the shop</h4>
    <div class="dashboardWrapper">
        <button class="loginButton addNewCarButton"><a href="/completedCars">See completed cars here!</a></button>

        <div class="assignedCarsWrapper">
            <h2>Assigned Cars/Jobs</h2>
            <ul>
                @foreach($assignedCars as $car)
                    <li>
                        <h3>Status: {{ $car->status }} {{ $car->brand }} {{ $car->model }} Year: {{ $car->year }} </h3>
                        <form action="{{ route('completeCar', ['car' => $car->id]) }}" method="POST" class="updateStatusForm">
                            @csrf
                            @method('PUT')
                            <button type="submit">Move to Completed</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="avaliableCarsWrapper">
            <h2>Avaliable Cars/Jobs</h2>
            <ul>
                @foreach($cars as $car)
                <div class="car">
                    <h3>Status:{{ $car->status }} Brand:{{ $car->brand }} {{ $car->model }} Year: {{ $car->year }} </h3>
                    <form action="{{ route('assignMechanic', ['car' => $car->id]) }}" method="POST" class="assignMechanicForm">
                        @csrf
                        @method('PUT') 
                        <button type="submit">Assign Yourself</button>
                    </form>
                </div>
                @endforeach

            </ul>
        </div>


        <button class="loginButton addNewCarButton"><a href="/addnewcar">Add new car</a></button>
    </div> 
</div>
@include('footer')