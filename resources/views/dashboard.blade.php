@include('header')
<div class="content">
    <!-- <h3>Welcome, {{ $user->name }}!</h3> -->
    
    @include('navbar')
    <div class="dashboardWrapper">
        <!-- <button class="loginButton addNewCarButton"><a href="/completedCars">See completed cars here!</a></button> -->

            <!-- Change this to a table maybe, this is the avaliable Cars "list". Where a mechanic can assign himself -->
        <div class="avaliableCarsWrapper">
            <h2>Avaliable Cars/Jobs</h2>

            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Assignment</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->user_id }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->problem_description }}</td>
                                <td>{{ $car->status }}</td>
                                <td> 
                                    <form action="{{ route('assignMechanic', ['car' => $car->id]) }}" method="POST" class="assignMechanicForm">
                                        @csrf
                                        @method('PUT') 
                                        <button type="submit" class="btn btn-light" >Take this job</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 

            <!-- <ul>
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
            </ul> -->
        </div>
 
        <div>
           <h2>Ongoing Repairs</h2> 
            <!-- Creating a table to display all the data from our databse -->
            <div>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Status</th>
                            <th>Move to completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignedCars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->user_id }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->problem_description }}</td>
                                <td><a href="{{ route('viewCar', ['car' => $car->id]) }}">Car details</a></td>
                                <td>{{ $car->status }}</td>
                                <td> 
                                    <form action="{{ route('completeCar', ['car' => $car->id]) }}" method="POST" class="updateStatusForm">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-light material-symbols-outlined">done_all</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
        
        <!-- <button class="loginButton addNewCarButton"><a href="/addnewcar">Add new car</a></button> -->
    </div> 
</div>
@include('footer')