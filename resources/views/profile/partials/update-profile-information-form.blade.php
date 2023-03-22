<section>
    {{-- <header>
        <h2 class="text-secondary">
            I tuoi dati
        </h2>

        <p class="mt-1 text-muted">
            Aggiorna le informazioni del profilo e l'indirizzo email del tuo account.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('name')}}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="surname">Cognome</label>
            <input class="form-control" type="text" name="surname" id="surname" autocomplete="surname" value="{{old('surname', $user->surname)}}" required autofocus>
            @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('surname')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email">
                E-mail
            </label>

            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email)}}" required autocomplete="username" />

            @error('email')
            <span class="alert alert-danger mt-2" role="alert">
                <strong>{{ $errors->get('email')}}</strong>
            </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-muted">
                    Il tuo indirizzo e-mail non è verificato.

                    <button form="send-verification" class="btn btn-outline-dark">
                        Fare clic qui per inviare nuovamente l'e-mail di verifica
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">Salva</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted">Salvato</p>
            @endif
        </div>
    </form> --}}



    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg mt-5 mb-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="">
                                        <h2 class="mb-4 text-lg font-medium text-gray-900">I tuoi dati</h2>
                                        <p class="mt-1 text-sm text-gray-600">Aggiorna le informazioni del profilo e l'indirizzo email del tuo account.</p>
                                    </div>
                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                        @csrf
                                    </form>
                                    <form method="post" action="{{ route('profile.update') }}" class="user mt-6 space-y-6">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus placeholder="Nome">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->get('name')}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="text" name="surname" id="surname" autocomplete="surname" value="{{old('surname', $user->surname)}}" required autofocus placeholder="Cognome">
                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->get('surname')}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="email" name="email" type="email" class="form-control form-control-user" value="{{ old('email', $user->email)}}" required autocomplete="username" placeholder="E-mail"/>
                                            @error('email')
                                            <span class="alert alert-danger mt-2" role="alert">
                                                <strong>{{ $errors->get('email')}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div>
                                            <p class="mt-1 text-sm text-gray-600">
                                                Il tuo indirizzo e-mail non è verificato. Clicca per verificarla 
                            
                                                <button form="send-verification" class="btn btn-success btn-user">
                                                    Verifica
                                                </button>
                                            </p>
                            
                                            @if (session('status') === 'verification-link-sent')
                                            <p class="small text-success m-0 text-end">
                                                Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                                            </p>
                                            @endif
                                        </div>
                                        @endif
                                    <button type="submit" class="btn btn-primary btn-user">
                                        Salva
                                    </button>
                                        @if (session('status') === 'profile-updated')
                                        <script>
                                            const show = true;
                                            setTimeout(() => show = false, 2000)
                                            const el = document.getElementById('profile-status')
                                            if (show) {
                                                el.style.display = 'block';
                                            }
                                        </script>
                                            <p id="profile-status" class="small text-success m-0 text-end">
                                                Dati aggiornati con successo <i class="fa-solid fa-check"></i>
                                            </p>
                                        @endif
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</section>
