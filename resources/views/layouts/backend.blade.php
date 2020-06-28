<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZnajdźSwójDom - Panel użytkownika</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        var base_url = '{{ url('/admin') }}';
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top text-white py-3">
        <a class="navbar-brand mr-5" href="{{ url('/') }}">Znajdź Swój Dom</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <span class="nav-link">Zalogowany jako: {{ Auth::user()->getFullNameAttribute() }}</span>
            </li>
          </ul>
            <a class="btn btn-secondary mr-1" href="{{ url('/admin/user') }}">Profil</a>
            <a class="btn btn-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Wyloguj się
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </nav>

      <div class="container-fluid mt-3">
          <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar mt-4">
                  <div class="sidebar-sticky">
                      <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a class="nav-link {{ request()->routeIs('adverts') || request()->routeIs('addAdvert') || request()->routeIs('editAdvert') ? 'active' : '' }}" href="{{ url('admin') }}">Moje ogłoszenia</a>
                              <span class="badge badge-pill badge-info">{{ count(Auth::user()->advert) }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a class="nav-link {{ request()->routeIs('messages') ? 'active' : '' }}" href="{{ url('admin/messages') }}">Wiadomości</a>
                              <span class="badge badge-pill badge-success">{{ count(Auth::user()->messages) }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              <a class="nav-link {{ request()->routeIs('observables') ? 'active' : '' }}" href="{{ url('admin/observables') }}">Obserwowane</a>
                              <span class="badge badge-pill badge-warning">{{ count(Auth::user()->observeAdvert) }}</span>
                          </li>
                          @if( Auth::user()->hasRole(['admin']))
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <a class="nav-link {{ request()->routeIs('cities') || request()->routeIs('addCity') || request()->routeIs('editCity') ? 'active' : '' }}" href="{{ url('admin/cities') }}">Miasta</a>
                                  <span class="badge badge-pill badge-primary">{{ count(App\City::all()) }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a class="nav-link {{ request()->routeIs('users') ? 'active' : '' }}" href="{{ url('admin/users') }}">Użytkownicy</a>
                                  <span class="badge badge-pill badge-primary">{{ count(App\User::all()) }}</span>
                              </li>
                              @endif
                          </li>
                      </ul>
                  </div>
              </nav>

              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  @yield('content')



              </main>
          </div>
      </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.rent').hide();
        $('.sell').hide();
        $('.flat').hide();
        $('.room').hide();
        $('.costs').hide();
        $(function () {
            $('input[type=radio]').on('change', function (e) {
                let whichOne = $(e.currentTarget).val();
                $('.rent').hide();
                $('.sell').hide();
                $('.costs').show();
                $('.' + whichOne).show();
            });

            $('input[value=flat]').on('change', function (e) {
                let whichOne = $(e.currentTarget).val();
                $('.costs').show();
                $('.flat').show();
                $('.room').show();
            });

            $('input[value=house]').on('change', function (e) {
                let whichOne = $(e.currentTarget).val();
                $('.room').show();
                $('.flat').show();
                $('.room').show();
            });

            $('input[value=room]').on('change', function (e) {
                let whichOne = $(e.currentTarget).val();
                $('.room').show();
                $('.flat').hide();
                $('.' + whichOne).show();
            });

            $('input[value=property]').on('change', function (e) {
                let whichOne = $(e.currentTarget).val();
                $('.room').show();
                $('.flat').hide();
                $('.room').hide();
            });
        });
    </script>
</body>
</html>
