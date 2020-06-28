@extends('layouts.backend')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 border-bottom">
    <h1>Moje konto</h1>
</div>
<div class="row mt-5">
    <div class="col-md-4 text-md-center">
        <h4>Zdjęcie profilowe</h4>
        @if($user->photos()->first())
        <img src="{{ asset('images/photo.jpg') }}">
        <p class="mt-2">
            <a href="{{ route('deletePhoto', ['id' => $user->photos()->first()->id]) }}" class="btn btn-danger">Usuń</a>
        </p>
        @endif
    </div>

    <div class="col-md-6">
        <form method="POST" action="{{ route('user') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="surname">Nazwisko</label>
                <input type="text" class="form-control" name="surname" id="surname" value="{{ $user->surname }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="telephone">Telefon</label>
                <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $user->telephone }}">
            </div>
            <div class="form-group">
                <label for="photo">Dodaj zdjęcie</label>
                <input type="file" class="form-control-file" name="photo" id="photo">
            </div>
            <input type="submit" value="Zaaktualizuj" class="btn btn-success">
        </form>
    </div>
</div>
@endsection
