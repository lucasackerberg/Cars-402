<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>402 Street Swagger Customs</title>
</head>
<body>
    @include('errors')
    <div class="loginContainer">
        <div class="loginText">
            <h1 class="orbitron">402 <br> Street <br> Swagger <br> Customs</h1>
        </div>
        <form method="post" action="/login" name="loginForm" class="loginForm">
            @csrf
            <div>
                <label class="loginLabelText" for="username"></label>
                <input name='email' id="email" type="email" placeholder="Email" class="loginInput"/>
            </div>
            <div>
                <label class="loginLabelText" for="password"></label>
                <input name="password" id="password" type="password" placeholder="Password" class="loginInput"/>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
