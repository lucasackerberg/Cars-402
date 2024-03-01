@include('header')
<div class="content">
    <h3>Welcome, {{ $user->name }}!</h3>
    <h4>The following cars are yours:</h4>
    <div class="dashboardWrapper">

    </div>
</div>
@include('footer')