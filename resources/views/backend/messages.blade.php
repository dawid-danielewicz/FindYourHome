@extends('layouts.backend')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 border-bottom">
        <h1>Moje wiadomości</h1>
    </div>
    <br>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nadawca</th>
            <th scope="col">Email</th>
            <th scope="col">Telefon</th>
            <th scope="col">Zawartość</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
        <tr>
            <th scope="row">{{ $message->name }}</th>
            <td>{{ $message->email }}</td>
            <td>{{ $message->telephone }}</td>
            <td>{{ $message->content }}</td>
            <td>
                <a href="{{ route('deleteMessage',['id' => $message->id]) }}" class="btn btn-danger">Usuń</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
