@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zweryfikuj swój adres email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link weryfikujący został wysłany na podany adres email.
                        </div>
                    @endif

                    Sprawdź swój email w celu weryfikacji konta
                    Jeżeli nie otrzymałeś emaila, <a href="{{ route('verification.resend') }}">Kliknij tu by wysłać ponownie</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
