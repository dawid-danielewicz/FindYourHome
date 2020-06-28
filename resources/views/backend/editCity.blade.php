@extends('layouts.backend')
@section('content')
    <div class="col-md-6 mt-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
            <h1>Edytuj miasto</h1>
        </div>
        <form method="POST" action="{{ route('updateCity', ['id' => $city->id]) }}">
            @csrf
            <div class="form-group">
                @if(Session::has('cityupdated'))
                    <p class="alert alert-success mb-2">{{ Session::get('cityupdated') }}</p>
                @endif
                <label for="name">Nazwa</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $city->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-success mb-3" value="Zaaktualizuj">
        </form>
    </div>
@endsection
