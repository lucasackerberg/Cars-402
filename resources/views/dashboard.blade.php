@include('header')
<div class="content">
    <h3>Welcome, {{ $user->name }}!</h3>
    <h4>These are the current repairs inside the shop</h4>
    <div class="dashboardWrapper">
        <button class="loginButton addNewCarButton"><a href="/completedCars">See completed cars here!</a></button>

            <!-- Change this to a table maybe, this is the avaliable Cars "list". Where a mechanic can assign himself -->
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
 
        <div>
           
            <!-- Creating a table to display all the data from our databse -->
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Update</th>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Move to completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td><a href="{{ route('viewCar', ['car' => $car->id]) }}">View</a></td>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->user_id }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->problem_description }}</td>
                                <td>{{ $car->status }}</td>
                                <td> 
                                    <form action="{{ route('completeCar', ['car' => $car->id]) }}" method="POST" class="updateStatusForm">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">-></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
        <button class="loginButton addNewCarButton"><a href="/completedCars">Completed repairs</a></button>
        <button class="loginButton addNewCarButton"><a href="/addnewcar">Add new car</a></button>
    </div> 
</div>
@include('footer')