<!DOCTYPE html>
<html>
<head>
    <title>Slide Navbar</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form method="post" action="{{ url('/signup') }}">
            @csrf
            <label class="label" for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="name" placeholder="name" >
            <input type="text" name="email" placeholder="Email" >
            <input type="password" name="password" placeholder="Password">
            <button class="logBtn">Sign up</button>
        </form>
    </div>

    <div class="login">
        <form method="post" action="{{ url('/log') }}">
            @csrf
            <label class="label" for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required="">
            <button class="logBtn">Login</button>
        </form>
    </div>
</div>
</body>
</html>

