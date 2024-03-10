@include('header')
@include('navbar')

<h2>All the cars</h2>

    <div class="allCars">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><a href="{{ route('allCars', ['sort' => $changeSort, 'col' => 'id']) }}" class="sortButton-{{ $changeSort }}">ID</a></th>
                    <th>User ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th><a href="{{ route('allCars', ['sort' => $changeSort, 'col' => 'status']) }}" class="sortButton-{{ $changeSort }}">Status</a></th>
                    <th>Edit / Remove</th>
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
                        <td><a href="{{ route('viewCar', ['car' => $car->id]) }}">Car details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     

@include('footer')