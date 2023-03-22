<section>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="">
                                    <h2 class="mb-4 text-lg font-medium text-gray-900">Cambia password</h2>
                                    <p class="mt-1 text-sm text-gray-600">Assicurati che il tuo account utilizzi una password lunga e casuale per rimanere al sicuro. </p>
                                </div>
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 user">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <input class="mt-1 form-control form-control-user" type="password" name="current_password" id="current_password" autocomplete="current-password" placeholder="Vecchia password">
                                        @error('current_password')
                                        <span class="invalid-feedback mt-2" role="alert">
                                            <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="mt-1 form-control form-control-user" type="password" name="password" id="password" autocomplete="new-password" placeholder="Nuova password">
                                        @error('password')
                                        <span class="invalid-feedback mt-2" role="alert">
                                            <strong>{{ $errors->updatePassword->get('password')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="mt-2 form-control form-control-user" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" placeholder="Conferma password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback mt-2" role="alert">
                                            <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user">
                                        Salva
                                    </button>
                                    @if (session('status') === 'password-updated')
                                    <script>
                                        const show = true;
                                        setTimeout(() => show = false, 2000)
                                        const el = document.getElementById('status')
                                        if (show) {
                                            el.style.display = 'block';
                                        }
                                    </script>
                                            <p id="status" class="small text-success m-0 text-end">
                                                Password salvata con successo <i class="fa-solid fa-check"></i>
                                            </p>

                                    
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</section>