@include('header')
<h1>Completed Cars</h1>

<div class="completedCarsWrapper">
    <div class="carsSection">
        @foreach($completedCars as $car)
            <div class="completedCar">
                <h4>{{ $car->brand }} {{ $car->model }} <br> Year: {{ $car->year }} <br> Status: {{ $car->status }} <br> Problem Description: {{ $car->problem_description }} <br> Color: {{ $car->color }} <br> Registration Plate: {{ $car->registration }} <br> </h4>
            </div>
        @endforeach
    </div>
</div>
@include('footer')