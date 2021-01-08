<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zarejestrój się</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top text-white py-3" style="background-color: #2f3640;">
    <a class="navbar-brand mr-5" href="{{ url('/') }}">Znajdź Swój Dom</a>
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
                    <a class="dropdown-item" href="#">Działki</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('getArticles') }}">Artykuły</a>
            </li>
        </ul>
        <a href="{{ url('register') }}" class="btn btn-primary py-2 mr-1">Rejestracja</a>
        <a href="{{ url('login') }}" class="btn btn-warning py-2">Logowanie</a>
    </div>
</nav>

<form class="form-signin" method="POST" action="{{ route('register')}}">
    @csrf
    <div class="text-center mb-4">
        <h1 class="h2 my-5">Rejestracja</h1>
    </div>

    <div class="form-label-group">
        <input type="text" id="Name" class="form-control @error('name') is-invalid @enderror" placeholder="Imię" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
        <label for="Name">Imię</label>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="text" id="Surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Nazwisko" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
        <label for="Surname">Nazwisko</label>
        @error('surnname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="email" id="Email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
        <label for="Email">Email</label>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="Password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Hasło" required autocomplete="new-password">
        <label for="Password">Hasło</label>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="ConfirmPassword" class="form-control" placeholder="Powtórz hasło" name="password_confirmation" required autocomplete="new-password">
        <label for="ConfirmPassword">Powtórz hasło</label>
    </div>

    <div class="form-label-group">
        <input type="tel" id="Telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="Telefon" required autocomplete="telephone">
        <label for="Telephone">Telefon</label>
        @error('telephone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button class="btn btn-primary btn-block" type="submit">Zarejestruj się</button>
    <p class="mt-5 mb-3 text-muted text-center">Znajdź Swój Dom &copy; {{ date('Y') }}</p>
</form>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

