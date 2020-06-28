@extends('layouts.frontend')
@section('content')
    <div class="jumbotron jumbotron-fluid mt-5 text-white" style="background-image: url({{ asset('images/flat.jpg') }});">
        <div class="container">
            <h1 class="display-4 pt-5 mt-5 text-white">Znajdź swoje miejsce</h1>
            <p class="lead">Znajdź coś dla siebie wśród bogatej oferty ogłoszeń. </p>

            <form class="form-inline mb-5 pb-5" method="POST" action="{{ url('/search') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="sr-only" for="city">Miasto</label>
                        <input type="text" class="form-control mb-2 mr-sm-1 autocomplete" id="city" name="city" value="{{old('city')}}" placeholder="City">
                    </div>

                    <div class="form-group">
                        <select class="form-control mb-2 mr-sm-1" id="type" name="type">
                            @if(old('type') == 'wynajem' )
                                <option selected value="wynajem">Wynajem</option>
                                <option value="sprzedaż">Kupno</option>
                            @elseif(old('type') == 'sprzedaż')
                                <option value="wynajem">Wynajem</option>
                                <option selected value="sprzedaż">Kupno</option>
                            @else
                                <option value="wynajem">Wynajem</option>
                                <option value="sprzedaż">Kupno</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control mb-2 mr-sm-1" id="form" name="form">
                            @if(old('form') == 'mieszkanie')
                                <option selected value="mieszkanie">Mieszkanie</option>
                                <option value="dom">Dom</option>
                                <option value="pokój">Pokój</option>
                                <option value="działka">Działka</option>
                            @elseif(old('form') == 'dom')
                                <option value="flat">Mieszkanie</option>
                                <option selected value="house">Dom</option>
                                <option value="pokój">Pokój</option>
                                <option value="działka">Działka</option>
                            @elseif(old('form') == 'pokój')
                                <option value="mieszkanie">Mieszkanie</option>
                                <option value="dom">Dom</option>
                                <option selected value="pokój">Pokój</option>
                                <option value="działka">Działka</option>
                            @elseif(old('form') == 'działka')
                                <option value="mieszkanie">Mieszkanie</option>
                                <option value="dom">Dom</option>
                                <option value="pokój">Pokój</option>
                                <option selected value="działka">Działka</option>
                            @else
                                <option value="mieszkanie">Mieszkanie</option>
                                <option value="dom">Dom</option>
                                <option value="pokój">Pokój</option>
                                <option value="działka">Działka</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="price">Cena</label>
                        <input type="text" class="form-control mb-2 mr-sm-1 pay sell" id="price" name="price" value="{{ old('price') }}" placeholder="Cena do">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="rent">Czynsz</label>
                        <input type="text" class="form-control mb-2 mr-sm-1 pay rent" id="rent" name="rent" value="{{ old('rent') }}" placeholder="Czynsz do">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="area">Powierzchnia</label>
                        <input type="text" class="form-control mb-2 mr-sm-1" id="area" name="area" value="{{ old('area') }}" placeholder="Pow. do">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="rooms">Pokoje</label>
                        <input type="number" class="form-control mb-2 mr-sm-1" id="rooms" name="rooms" value="{{ old('rooms') }}" placeholder="Pokoje">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="sr-only" for="floor">Piętro</label>
                        <input type="number" class="form-control mb-2 mr-sm-1" id="floor" name="floor" value="{{ old('floor') }}" placeholder="Piętro">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="year">Rok</label>
                        <input type="number" class="form-control mb-2 mr-sm-1" id="year" name="build_year" value="{{ old('build_year') }}" placeholder="Rok">
                    </div>

                    <select class="form-control mb-2 mr-sm-1" id="place" name="place">
                        <option value="">Miejsce</option>
                        @if(old('place') == 'miejsce parkingowe')
                            <option selected value="miejsce parkingowe">Miejsce parkingowe</option>
                            <option value="garaż">Garaż</option>
                        @elseif(old('place') == 'garaż')
                            <option value="miejsce parkingowe">Miejsce parkingowe</option>
                            <option selected value="garaż">Garaż</option>
                        @else
                            <option value="miejsce parkingowe">Miejsce parkingowe</option>
                            <option value="garaż">Garaż</option>
                        @endif
                    </select>

                    <select class="form-control mb-2 mr-sm-1" id="energy" name="energy">
                        <option value="">Typ energii</option>
                        @if(old('energy') == 'gaz')
                            <option selected value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option value="węgiel">Węgiel</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @elseif(old('energy') == 'solar')
                            <option value="gaz">Gaz</option>
                            <option selected value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option value="węgiel">>Węgie</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @elseif(old('energy') == 'prąd')
                            <option value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option selected value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option value="węgiel">>Węgie</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @elseif(old('energy') == 'opał')
                            <option value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option selected value="opał">Opał</option>
                            <option value="węgiel">>Węgiel</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @elseif(old('energy') == 'węgiel')
                            <option value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option selected value="węgiel">>Węgie</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @elseif(old('energy') == 'pompa ciepła')
                            <option value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option value="węgiel">>Węgie</option>
                            <option selected value="pompa ciepła">Pompa ciepła</option>
                        @else
                            <option value="gaz">Gaz</option>
                            <option value="solar">Solar</option>
                            <option value="prąd">Prąd</option>
                            <option value="opał">Opał</option>
                            <option value="węgiel">Węgiel</option>
                            <option value="pompa ciepła">Pompa ciepła</option>
                        @endif

                    </select>
                </div>
                <div class="form-row">

                    <div class="form-check form-check-inline flat">
                        <input class="form-check-input" type="checkbox" id="aircondition" name="aircondition" value="1" {{ old('aircondition') ? 'checked' : '' }}>
                        <label class="form-check-label" for="aircondition">Klimatyzacja</label>
                    </div>

                    <div class="form-check form-check-inline flat mr-4">
                        <input class="form-check-input" type="checkbox" id="cellar" name="cellar" value="1" {{ old('cellar') ? 'checked' : '' }}>
                        <label class="form-check-label" for="cellar">Piwnica</label>
                    </div>

                    <div class="form-check form-check-inline flat mr-3">
                        <input class="form-check-input" type="checkbox" id="garden" name="garden" value="1" {{ old('garden') ? 'checked' : '' }}>
                        <label class="form-check-label" for="garden">Ogród</label>
                    </div>

                    <div class="form-check form-check-inline flat mr-3">
                        <input class="form-check-input" type="checkbox" id="balcony" name="balcony" value="1" {{ old('balcony') ? 'checked' : '' }}>
                        <label class="form-check-label" for="balcony">Balkon</label>
                    </div>

                    <div class="form-check form-check-inline flat mr-4 ml-1">
                        <input class="form-check-input" type="checkbox" id="terrace" name="terrace" value="1" {{ old('terrace') ? 'checked' : '' }}>
                        <label class="form-check-label" for="terrace">Taras</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning mb-2 offset-6">Szukaj</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if(session('noadverts'))
                <p class="text-md-center text-danger">{{ session('noadverts') }}</p>
            @endif
            <p>Użytkownik {{ $user->FullName}} ma {{ count($adverts) }} ogłoszeń</p>
            @foreach($adverts as $advert)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="{{ asset('images/photo.jpg') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <a href="{{ route('advert',['id' => $advert->id, 'name' => $advert->name]) }}"><h5 class="card-title">{{ $advert->name }}</h5></a>
                            <p class="card-text">{{ $advert->address->street}} {{ $advert->address->number }}, {{$advert->city->name}}</p>
                            <p class="card-text">{{ str_limit($advert->description, 200) }}</p>
                            <p class="card-text"><small class="text-muted">Dodano {{ $created }}</small></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if($advert->costs->price != 0)
                                    Cena:
                                    {{ $advert->costs->price }}
                                @else
                                    Czynsz:
                                   {{ $advert->costs->rent }}
                                @endif
                                    zł</h5>

                            <p class="card-text">Powierzchnia: {{ $advert->dimensions->area }} m<sup>2</sup></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
