<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <nav>
        <div class="menu">
            <div class="logo">
                <a href="#">UMS</a>
            </div>
            <ul>
                <li><a href="Home">Home</a></li>
                @if (empty(Auth::user()->id))
                    <li><a href="register">Register</a></li>
                    <li><a href="login">Login</a></li>
                @else
                @endif
                @if (!empty(Auth::user()->id))
                    <li style="color: white"><a href="userListPage">Users</a></li>
            </ul>

            <a href="dashboard">
                <li style="color: white">{{ Auth::user()->name }}</li>
            </a>
            @endif
        </div>
    </nav>
</body>

</html>
