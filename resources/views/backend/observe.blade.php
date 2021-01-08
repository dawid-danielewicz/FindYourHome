@extends('layouts.backend')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 border-bottom">
        <h1>Obserwowane ogłoszenia</h1>
    </div>
    <br>
    <table class="table table-hover">
        <thead class="thead-dark" style="background-color: #2f3640;">
        <tr>
            <th scope="col">id</th>
            <th scope="col">nazwa</th>
            <th scope="col">typ</th>
            <th scope="col">forma</th>
            <th scope="col">miasto</th>
            <th scope="col">dodano</th>
            <th scope="col">operacje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($adverts as $advert)
        <tr>
            <th scope="row">{{ $advert->id }}</th>
            <td>{{ $advert->name }}</td>
            <td>{{ $advert->type }}</td>
            <td>{{ $advert->form }}</td>
            <td>{{ $advert->city->name }}</td>
            <td>{{ $advert->created_at }}</td>
            <td>
                <a href="{{ route('advert', ['id' => $advert->id, 'name' => $advert->name]) }}" class="btn btn-info">Pokaż</a>
                <a href="{{ route('unObserve', ['id' => $advert->id]) }}" class="btn btn-warning">Nie obserwuj</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
