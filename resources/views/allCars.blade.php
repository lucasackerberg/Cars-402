@include('header')
@include('navbar')

<h2>All the cars</h2>

    <div class="allCars">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     

@include('footer')