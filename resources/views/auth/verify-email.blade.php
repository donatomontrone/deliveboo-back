@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica indirizzo e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Un nuovo link di verifica è stato inviato al tuo indirizzo e-mail.
                    </div>
                    @endif

                    Prima di procedere, controlla il link di verifica nella tua casella di posta.
                    Se non hai ricevuto la mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clicca qui </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
