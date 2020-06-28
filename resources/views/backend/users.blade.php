@extends('layouts.backend')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 border-bottom">
        <h1>Użytkownicy</h1>
    </div>
    <br>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Email</th>
            <th scope="col">Tel.</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($users as $user)
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telephone }}</td>
            <td>
                <a href="{{ route('deleteUser',['id' => $user->id]) }}" class="btn btn-danger">Usuń</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
