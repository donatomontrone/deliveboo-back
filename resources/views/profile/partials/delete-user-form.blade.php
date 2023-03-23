<section class="space-y-6">
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
                                        <h2 class="mb-4 text-lg font-medium text-gray-900">Cancella account</h2>
                                        <p class="mt-1 text-sm text-gray-600"> Una volta eliminato il tuo account, tutte
                                            le sue risorse e i dati verranno eliminati definitivamente. Prima di
                                            eliminare il tuo account, scarica tutti i dati o le informazioni che
                                            desideri conservare. </p>
                                    </div>
                                    <form class="mt-6 space-y-6 user">
                                        
                                        <button type="button" class="btn btn-danger btn-user rounded-5 small"  data-bs-toggle="modal" data-bs-target="#delete-account">Elimina account
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Modal --}}
                        <div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete-account">Conferma eliminazione</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Sei sicuro di voler eliminare il tuo account?
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Una volta eliminato il tuo account, tutte le sue risorse e i dati verranno eliminati definitivamente, incluso il ristorante associato. Inserisci la tua password per confermare che desideri eliminare definitivamente il tuo account.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancella</button>
                    
                                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                            @csrf
                                            @method('delete')
                    
                    
                                            <div class="input-group">
                    
                                                <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />
                    
                                                @error('password')
                                                <span class="invalid-feedback mt-2" role="alert">
                                                    <strong>{{ $errors->userDeletion->get('password')}}</strong>
                                                </span>
                                                @enderror
                    
                    
                    
                                                <button type="submit" class="btn btn-danger">
                                                    Elimina account
                                                </button>
                                                <!--  -->
                                            </div>
                                        </form>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>