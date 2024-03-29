@include('header')
@include('navbar')
<h2>Completed Cars</h2>

<div class="completedCarsWrapper">
    <div class="carsSection">
      
        <div class="completedCar">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($completedCars as $car)
                        <tr>
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
    </div>
</div>
@include('footer')