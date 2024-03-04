<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    @include('errors');
    <div class="loginContainer">
        <h1>402Cars - Your virtual car inventory!</h1>
        <form method="post" action="/login" name="loginForm">
            @csrf
            <div>
                <label for="username">Email</label>
                <input name="email" id="email" type="email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
