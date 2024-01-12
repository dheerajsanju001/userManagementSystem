@if (count($errors) > 0)
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    @include('common.nav');
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>SignUp Form</span></div>
            @if (empty($editData['id']))
                <form action="{{ route('register') }}" method="POST">
                @else
                    <form action="{{ url('updateRecord' . $editData['id']) }}" method="POST">
            @endif
            {{ csrf_field() }}
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="name" value="{{ isset($editData['name']) ? $editData['name'] : '' }}"
                    placeholder="Enter your UserName">
            </div>
            @error('name')
                {{ $errors->first('name') }}
            @enderror
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="email" name="email" value="{{ isset($editData['email']) ? $editData['email'] : '' }}"
                    placeholder="Enter your email">
            </div>
            @error('email')
                {{ $errors->first('email') }}
            @enderror
            @if (empty($editData['id']))
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Create password">
                </div>
                @error('password')
                    {{ $errors->first('password') }}
                @enderror
            @endif
            <div class="row button">
                <input type="submit" value="Regester Now">
            </div>
            <div class="signup-link">Not a member? <a href="login">Login now</a></div>
            </form>
        </div>
    </div>

</body>

</html>
