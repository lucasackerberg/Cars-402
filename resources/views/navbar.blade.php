<nav class="nav nav-tabs">
        <li class="nav-item">
                <a class="{{ Request::is('dashboard') ? 'active' : '' }} nav-item nav-link" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
                <a class="{{ Request::is('addnewcar') ? 'active' : '' }} nav-item nav-link" href="/addnewcar">Add new car</a>
        </li>
        <li class="nav-item">
                <a class=" {{ Request::is('allCars') ? 'active' : '' }} nav-item nav-link" href="/allCars">All cars</a>
        </li>
        <li class="nav-item">
                <a class="{{ Request::is('completedCars') ? 'active' : '' }} nav-item nav-link" href="/completedCars">Completed repairs</a>
        </li>
        <li class="nav-item">
                <a class="{{ Request::is('logout') ? 'active' : '' }} nav-item nav-link" href="/logout">Logout</a>
        </li>
</nav>
<div class="currentlyLoggedIn">
        <h6>Logged in as: {{ $user->name }}</h6>
</div>

