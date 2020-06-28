@extends('layouts.backend')
@section('content')
    <div class="col-md-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
            <h1>Dodaj nowe ogłoszenie</h1>
        </div>
        <form>
            <p class="h3 mb-3">Typ ogłoszenia</p>
            <div class="form-check form-check-inline mb-4">
                <input class="form-check-input" type="radio" name="type" id="rent" value="rent">
                <label class="form-check-label" for="rent">Wynajem</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="sell" value="sell">
                <label class="form-check-label" for="inlineRadio2">Sprzedaż</label>
            </div>

            <p class="h3">Forma</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="form" id="flat" value="flat">
                <label class="form-check-label" for="flat">Mieszkanie</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="form" id="house" value="house">
                <label class="form-check-label" for="house">Dom</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="form" id="room" value="room">
                <label class="form-check-label" for="room">Pokój</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="form" id="property" value="property">
                <label class="form-check-label" for="property">Działka</label>
            </div>

            <p class="h3 border-bottom my-4">Dane podstawowe</p>
            <div class="form-group">
                <label for="photos">Dodaj zdjęcia</label>
                <input type="file" class="form-control-file" name="photos" id="photos">
            </div>

            <div class="form-group">
                <label for="title">Tytuł</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Tytuł">
            </div>
            <div class="form-group">
                <label for="description">Opis</label>
                <textarea class="form-control" name="description" id="description" rows="5">Opis</textarea>
            </div>
            <div class="form-group">
                <label for="area">Powierzchnia</label>
                <input type="text" class="form-control" name="area" id="area" placeholder="100">
            </div>
            <div class="form-group">
                <label for="City">Miasto</label>
                <input type="text" class="form-control autocomplete" name="city" name id="city" placeholder="miasto">
            </div>
            <div class="form-group">
                <label for="zip_code">Kod pocztowy</label>
                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Kod pocztowy">
            </div>
            <div class="form-row">
            <div class="col">
                <label for="street">Ulica</label>
                <input type="text" class="form-control" name="street" id="street" placeholder="ulica" >
            </div>
            <div class="col">
                <label for="number">Numer</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="numer" >
            </div>
            </div>
            <div class="form-group">
                <label for="avaliable">Dostępne</label>
                <input type="date" class="form-control" name="avaliable" id="avaliable">
            </div>

            <p class="h3 costs my-4 border-bottom">Koszty</p>
            <div class="form-group rent">
                <label for="rentprice">Czynsz</label>
                <input type="text" class="form-control" name="rent" id="rentprice" placeholder="np. 600">
            </div>
            <div class="form-group rent">
                <label for="price_per_m">Cena za m<sup>2</sup></label>
                <input type="text" class="form-control" name="rent_per_m" id="rent_per_m" placeholder="np. 15">
            </div>
            <div class="form-group rent">
                <label for="deposit">Kaucja</label>
                <input type="text" class="form-control" name="deposit" id="deposit" placeholder="np. 1200">
            </div>
            <div class="form-group sell">
                <label for="price">Cena</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="np. 50 000">
            </div>
            <div class="form-group flat room">
                <label for="heating_costs">Koszty ogrzewania</label>
                <input type="text" class="form-control" name="heating_costs" id="heating_costs" placeholder="np. 14">
            </div>

            <p class="h3 border-bottom my-4 flat room">Dodatkowe</p>

            <div class="flat">
            <p class="h4 flat my-4">Pokoje</p>
            <div class="form-group flat">
                <label for="bathrooms">Łazienki</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" placeholder="1">
            </div>
            <div class="form-group flat">
                <label for="rooms">Pokoje</label>
                <input type="number" class="form-control" name="rooms" id="rooms" placeholder="1">
            </div>

            <div class="form-check form-check-inline flat mt-3">
                <input class="form-check-input" type="checkbox" name="balcony" id="balcony" value="balkon">
                <label class="form-check-label" for="balcony">Balkon</label>
            </div>
            <div class="form-check form-check-inline flat">
                <input class="form-check-input" type="checkbox" name="terrace" id="terrace" value="taras">
                <label class="form-check-label" for="terrace">Taras</label>
            </div>
            </div>

            <p class="h4 flat room my-4">Wyposażenie</p>
            <div class="form-check form-check-inline flat">
                <input class="form-check-input" type="checkbox" name="aircondition" id="aircondition" value="aircondition">
                <label class="form-check-label" for="aircondition">Klimatyzacja</label>
            </div>
            <div class="form-check form-check-inline flat">
                <input class="form-check-input" type="checkbox" name="cellar" id="cellar" value="cellar">
                <label class="form-check-label" for="cellar">Piwnica</label>
            </div>
            <div class="form-check form-check-inline flat">
                <input class="form-check-input" type="checkbox" name="garden" id="garden" value="garden">
                <label class="form-check-label" for="garden">Ogród</label>
            </div>
            <div class="form-group  mt-4">
                <label for="place">Miejsce</label>
                <select class="form-control mb-2 mr-sm-1" name="place" id="place">
                    <option>garaż</option>
                    <option>miejsce parkingowe</option>
                </select>
            </div>
            <div class="form-group room">
                <label for="floor">Piętro</label>
                <select class="form-control mb-2 mr-sm-1" name="floor" id="floor">
                    <option>parter</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>10+</option>
                </select>
            </div>

            <div class="flat">
            <p class="h4 my-4">Stan</p>
            <div class="form-group">
                <label for="year">Rok</label>
                <input type="text" class="form-control" name="year" id="year" placeholder="np. 2005">
            </div>
            <div class="form-group">
                <label for="fixed">Wyremontowano</label>
                <input type="text" class="form-control" name="fixed" id="fixed" placeholder="np. 2018">
            </div>

            <p class="h4 my-4">Ogrzewanie</p>
            <div class="form-group">
                <label for="energy">Rodzaj energii</label>
                <select class="form-control mb-2 mr-sm-1" name="energy" id="energy">
                    <option>gaz</option>
                    <option>solar</option>
                    <option>prąd</option>
                    <option>olej</option>
                    <option>węgiel</option>
                    <option>pompa ciepła</option>
                </select>
            </div>
            <div class="form-group">
                <label for="heating_type">Typ ogrzewania</label>
                <select class="form-control mb-2 mr-sm-1" name="heating_type" id="heating_type">
                    <option>piec</option>
                    <option>ogrzewanie centralne</option>
                    <option>ogrzewanie podłogowe</option>
                </select>
            </div>
            </div>
            <input type="submit" class="btn btn-success my-4" value="Dodaj ogłoszenie">
        </form>
    </div>
@endsection
