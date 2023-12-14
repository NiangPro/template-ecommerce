<div>
    <div class="container">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-box">
                        <div wire:ignore.self class="form-tab">
                            <ul wire:ignore.self class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Se connecter</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">S'inscrire</a>
                                </li>
                            </ul>
                            <div wire:ignore.self class="tab-content" id="tab-content-5">
                                <div wire:ignore.self class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form wire:ignore.self wire:submit.prevent="login()">  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Pseudo</label>
                                                <input class="form-control @error('form2.pseudo') is-invalid @enderror" wire:model="form2.pseudo" type="text" placeholder="Entrer votre pseudo">
                                                @error('form2.pseudo') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label>Mot de passe</label>
                                                <input class="form-control @error('form2.password') is-invalid @enderror" wire:model="form2.password" type="password" placeholder="Entrer votre mot de passe">
                                                @error('form2.password') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Se connecter</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                                <div wire:ignore.self class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form  wire:ignore.self wire:submit.prevent="register()">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prenom</label>
                                                <input wire.ignore.self class="form-control @error('form1.prenom') is-invalid @enderror" wire:model="form1.prenom" type="text" placeholder="Prenom">
                                                @error('form1.prenom') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                                <input class="form-control @error('form1.nom') is-invalid @enderror" wire:model="form1.nom" type="text" placeholder="Nom">
                                                @error('form1.nom') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Pseudo</label>
                                                <input class="form-control @error('form1.pseudo') is-invalid @enderror" wire:model="form1.pseudo" type="text" placeholder="Pseudo">
                                                @error('form1.pseudo') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                                <input class="form-control @error('form1.adresse') is-invalid @enderror" wire:model="form1.adresse" type="text" placeholder="Adresse">
                                                @error('form1.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>N° Téléphone 1</label>
                                                <input class="form-control @error('form1.tel') is-invalid @enderror" wire:model="form1.tel" type="tel" placeholder="Numéro de téléphone 1">
                                                @error('form1.tel') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>N° Téléphone 2</label>
                                                <input class="form-control @error('form1.tel2') is-invalid @enderror" wire:model="form1.tel2" type="tel" placeholder="Numéro de téléphone 2">
                                                @error('form1.tel2') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Nationnalité</label>
                                                <input class="form-control @error('form1.nationalite') is-invalid @enderror" wire:model="form1.nationalite" type="text" placeholder="Nationnalité">
                                                @error('form1.nationalite') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Pays</label>
                                                <input class="form-control @error('form1.pays') is-invalid @enderror" wire:model="form1.pays" type="text" placeholder="Pays">
                                                @error('form1.pays') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label>E-mail</label>
                                                <input class="form-control @error('form1.email') is-invalid @enderror" wire:model="form1.email" type="email" placeholder="E-mail">
                                                @error('form1.email') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Mot de passe</label>
                                                <input class="form-control @error('form1.password') is-invalid @enderror" wire:model="form1.password" type="password" placeholder="Mot de passe">
                                                @error('form1.password') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>Mot de passe de confirmation</label>
                                                <input class="form-control @error('form1.password_confirmation') is-invalid @enderror" wire:model="form1.password_confirmation" type="password" placeholder="Mot de passe de confirmation">
                                                @error('form1.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>S'inscrir</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            {{-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox --> --}}
                                        </div><!-- End .form-footer -->
                                    </form>
                                    {{-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice --> --}}
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>
   
</div>

@section('js')
<script>
    window.addEventListener('badConnection', event =>{
        iziToast.error({
        title: 'Connexion',
        message: 'Nom d\'utilisateur ou mot de passe incorrect',
        position: 'topRight'
        });
    });

    window.addEventListener('addSuccessful', event =>{
        iziToast.success({
        title: 'Inscrit',
        message: 'Inscription avec succes',
        position: 'topRight'
        });
    });

</script>

@endsection