<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zaloguj się</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top text-white py-2">
    <a class="navbar-brand mr-5" href="{{ url('/') }}">ZnajdźSwójDom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Typy ogłoszeń
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Mieszkania</a>
                    <a class="dropdown-item" href="#">Domy</a>
                    <a class="dropdown-item" href="#">Pokoje</a>
                </div>
            </li>
        </ul>
        <a href="{{ url('register') }}" class="btn btn-primary my-2 my-sm-0 mr-1">Zarejestruj się</a>
        <a href="{{ url('login') }}" class="btn btn-secondary my-2 my-sm-0">Zaloguj się</a>
    </div>
</nav>

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Logowanie</h1>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Adres email" valeu="{{ old('email') }}" required autocomplete="email" autofocus>
        <label for="inputEmail">Adres Email</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Hasło" required>
        <label for="inputPassword">Hasło</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            Zapamiętaj mnie
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Zapomniałeś hasło?
        </a>
    @endif
    <p class="mt-5 mb-3 text-muted text-center">&copy; {{ date('Y') }}</p>
</form>
</body>
</html>

