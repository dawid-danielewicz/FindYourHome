@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mt-5">
                <h4 class="mt-5">{{ $advert->name }}</h4>
                <div class="fotorama mt-2" data-nav="thumbs" data-allowFullscreen="true">
                    @foreach($advert->photos as $photo)
                        <a href="{{ asset('images/łąka.jpg') /*$photo->path ?? $placeholder*/ }}"><img src="{{ asset('images/łaka.jpg') }}" class="img-fluid"></a>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 mt-5">
                <h4 class="mt-5">Właściciel</h4>
                <div class="card mt-2" style="width: 18rem; border: none;">
                    <div class="card-body" style="background-color: #f7f7f9;">
                        <img src="{{ asset('images/photo.jpg') }}" alt="..." class="img-fluid mb-3" width="100" height="100">
                        <h5 class="card-title">{{ $advert->user->FullName}}</h5>
                        <p class="card-text">tel.: {{ $advert->user->telephone }}</p>
                        <p class="card-text">email: {{ $advert->user->email }}</p>
                        <p class="card-text">Objekt nr.: {{ $advert->id }}</p>
                        <p class="card-text">Dodano: {{ $created}}</p>
                        <p class="card-text">Zaaktualizowano: {{ $updated }}</p>
                        <a href="{{ route('userAdverts',['id' => $advert->user->id]) }}" style="width: 15rem" class="btn btn-success mb-1">Wszystkie ogłoszenia użytkownika</a>
                        @auth
                        @if($observed != null)
                            <a href="{{ route('unObserve', ['id'=>$advert->id]) }}" style="width: 15rem" class="btn btn-secondary">Obserwujesz</a>
                        @else
                            <a href="{{ route('observe', ['id'=>$advert->id]) }}" style="width: 15rem" class="btn btn-warning">Obserwuj ogłoszenie</a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-5">
                <h3>Dane podstawowe</h3>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Forma ogłoszenia</td>
                        <td>{{ $advert->form }}</td>
                    </tr>
                    <tr>
                        <td>Typ ogłoszenia</td>
                        <td>{{ $advert->type }}</td>
                    </tr>
                    <tr>
                        <td>Powierzchnia</td>
                        <td>{{ $advert->dimensions->area }}m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td>Dostępne od</td>
                        <td>{{ $advert->avaliable }}</td>
                    </tr>
                    <tr>
                        <td>Adres</td>
                        <td>ulica {{ $advert->address->street }} {{ $advert->address->number }}
                            <br>{{ $advert->city->name }}, {{ $advert->address->zip_code }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <h4 class="mt-5">Cena wg. średniej</h4>
                <div class="card" style="width: 18rem; border: none;">
                    <div class="card-body" style="background-color: #f7f7f9;">
                        <p>Średnia w: {{ $advert->city->name }}</p>
                        <hr>
                        @foreach($costs as $cost)
                                @continue($cost->form != 'pokój')
                            <p>{{$cost->form}} {{ $cost->costs->rent }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-5">
                <h3>Koszty</h3>
                <table class="table">
                    <tbody>
                    @if($advert->costs->rent != 0)
                    <tr>
                        <td>Czynsz</td>
                        <td>{{ $advert->costs->rent }}zł</td>
                    </tr>
                    <tr>
                        <td>Kaucja</td>
                        <td>{{ $advert->costs->deposit }} zł</td>
                    </tr>
                    <tr>
                        <td>Czynsz za m<sup>2</sup></td>
                        <td>{{ floor($advert->costs->rent/$advert->dimensions->area) }} zł</td>
                    </tr>
                    @else
                        <tr>
                            <td>Cena</td>
                            <td>{{ $advert->costs->price }} zł</td>
                        </tr>
                        <tr>
                            <td>Cena za m<sup>2</sup></td>
                            <td>{{ floor($advert->costs->price/$advert->dimensions->area) }} zł</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Koszt ogrzewania</td>
                        <td>{{ $advert->costs->heating_costs }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-5">
                <h3>Opis</h3>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            {{ $advert->description }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-5">
                <h3>Dodatkowe</h3>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Piętro</td>
                        <td>{{ $advert->fixtures->floor }}</td>
                    </tr>
                    @if($advert->fixtures->aircondition)
                    <tr>
                        <td>Klimatyzacja</td>
                    </tr>
                    @endif
                    @if($advert->fixtures->cellar)
                        <tr>
                            <td>Piwnica</td>
                            <td></td>
                        </tr>
                    @endif
                    @if($advert->fixtures->place)
                        <tr>
                            <td>Miejsce</td>
                            <td>{{ $advert->fixtures->place }},
                            @if($advert->fixtures->place == 'garaż')
                                powierzchnia {{ $advert->dimensions->garage_area }} m<sup>2</sup>
                                @endif
                            </td>

                        </tr>
                    @endif
                    @if($advert->fixtures->garden)
                        <tr>
                            <td>Ogród</td>
                            <td>powierzchnia {{ $advert->dimensions->garden_area }} m<sup>2</sup></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mt-5">
                <h3>Charakterystyka</h3>
                <table class="table">
                    <tbody>
                    @if($advert->rooms->rooms)
                        <tr>
                            <td>Liczba pokoi</td>
                            <td>{{ $advert->rooms->rooms }}</td>
                        </tr>
                    @endif
                    @if($advert->rooms->bathrooms)
                        <tr>
                            <td>Liczba łazienek</td>
                            <td>{{ $advert->rooms->bathrooms }}</td>
                        </tr>
                    @endif
                    @if($advert->rooms->balcony)
                        <tr>
                            <td>Balkon</td>
                            <td>{{ $advert->dimensions->balcony_area }} m<sup>2</sup></td>
                        </tr>
                    @endif
                    @if($advert->rooms->terrace)
                        <tr>
                            <td>Taras</td>
                            <td>{{ $advert->dimensions->terrace_area }} m<sup>2</sup></td>
                        </tr>
                    @endif
                    @if($advert->conditions->build_year)
                    <tr>
                        <td>Rok wybudowania</td>
                        <td>{{ $advert->conditions->build_year }}</td>
                    </tr>
                    @endif
                    @if($advert->conditions->fixed)
                    <tr>
                        <td>Wyremontowano</td>
                        <td>{{ $advert->conditions->fixed }}</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" id="message">
            <div class="col-md-8 mt-5">
                <h3>Ogrzewanie</h3>
                <table class="table">
                    <tbody>
                    @if($advert->heating->heating_type)
                    <tr>
                        <td>typ</td>
                        <td>{{ $advert->heating->heating_type }}</td>
                    </tr>
                    @endif
                    @if($advert->heating->heating_type)
                    <tr>
                        <td>źródło</td>
                        <td>{{ $advert->heating->energy }}</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-8 mb-5 bg-light rounded pt-2 pb-2">
            <h3>Wyślij wiadomość do {{ $advert->user->FullName }}</h3>
            <br>
            @if(Session::has('messagesent'))
                <p class="alert alert-success mb-2">{{ Session::get('messagesent') }}</p>
            @endif
            <form action="{{ url('/sendMessage') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Imię</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Imię">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone">Telefon</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone " name="telephone" placeholder="Telefon">
                    @error('telephone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Treść</label>
                    <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content">Witam jestem zainteresowany Pana(i) ogłoszeniem.</textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <input type="hidden" id="user_id" name="user_id" value="{{ $advert->user->id }}">
                <button type="submit" class="btn btn-success">Wyślij</button>
            </form>
        </div>
    </div>
@endsection
