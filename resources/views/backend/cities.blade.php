@extends('layouts.backend')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 border-bottom">
        <h1>Miasta</h1>
    </div>
    <br>
    <a class="btn btn-success mb-2" href="{{ url('admin/addCity') }}">Dodaj nowe miasto</a>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nazwa</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($cities as $city)
            <th scope="row">{{ $city->id }}</th>
            <td>{{ $city->name }}</td>
            <td>
                <a href="{{ route('editCity', ['id' => $city->id]) }}" class="btn btn-info">Edytuj</a>
                <a href="{{ route('deleteCity', ['id' => $city->id]) }}" class="btn btn-danger">Usuń</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
