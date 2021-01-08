<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Znajdź swój dom</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <script>
        var base_url = '{{ url('/') }}';
    </script>
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
                      @auth
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/admin/messages') }}">Wiadomości <span class="badge badge-pill badge-success">{{ count(Auth::user()->messages) }}</span></a>
                      </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('admin/observables') }}">Obserwowane <span class="badge badge-pill badge-warning">{{ count(Auth::user()->observeAdvert) }}</span></a>
                          </li>
                      @endauth
                  </ul>
                    @guest
                    <a href="{{ url('register') }}" class="btn btn-primary mr-1 py-2">Rejestracja</a>
                    <a href="{{ url('login') }}" class="btn btn-warning py-2">Logowanie</a>
                    @else
                        <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->getFullNameAttribute() }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-success" href="{{ url('admin/addAdvert') }}"><strong>Dodaj ogłoszenie</strong></a>
                                <a class="dropdown-item" href="{{ url('admin/user') }}"><strong>Mój profil</strong></a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <strong>Wyloguj się</strong>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </ul>
                        @endguest
                </div>
              </nav>

              @yield('content')

                <div class="footer">
                    <div class="jumbotron jumbotron-fluid mb-0">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-3">
                                <h5 class="ml-3">Popularne</h5>
                                <a href="#" class="nav-link text-muted">Mieszkania w Warszawie</a>
                                <a href="#" class="nav-link text-muted">Mieszkania w Krakowie</a>
                                <a href="#" class="nav-link text-muted">Mieszkania w Poznaniu</a>
                                <a href="#" class="nav-link text-muted">Mieszkania w Gdańsku</a>
                                <a href="#" class="nav-link text-muted">Mieszkania w Łodzi</a>
                            </div>
                            <div class="col-md-3 pl-5">
                                <h5 class="ml-3">O nas</h5>
                                <a href="#" class="nav-link text-muted">Obsługa klienta</a>
                                <a href="#" class="nav-link text-muted">Kontakt</a>
                                <a href="#" class="nav-link text-muted">Pomoc</a>
                                <a href="#" class="nav-link text-muted">Polityka prywatności</a>
                            </div>
                            <div class="col-md-3 pl-5">
                                <h5 class="ml-3">Więcej</h5>
                                <a href="#" class="nav-link text-muted">Wzory umów</a>
                                <a href="#" class="nav-link text-muted">Kariera</a>
                            </div>
                            <div class="col-md-3 text-center">
                                <h5>Aplikacja mobilna</h5>
                                <a href=""><img src="{{ asset('images/google.png') }}" class="img-fluid"></a>
                                <a href=""><img src="{{ asset('images/google.png') }}" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row border-top" style="background-color: #e9ecef;">
                            <div class="col-sm-4 offset-4 text-center py-5">
                                Znajdź Swój Dom &copy; {{ date('Y') }}
                            </div>
                        </div>
                    </div>

                </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
$('#price').hide();
$(document).ready(function () {
    $('#type').change(function(){
        $(this).find("option:selected").each(function(){
            let optionValue = $(this).attr("value");
            if(optionValue){
                if(optionValue == 'wynajem')
                    optionValue = 'rent'
                else if(optionValue == 'sprzedaż')
                    optionValue = 'sell'
                $('.pay').not('.' + optionValue).hide();
                $('.' + optionValue).show();
            }else{
                $('.pay').hide();
            }
        });
    });
});


</script>
</body>
</html>
