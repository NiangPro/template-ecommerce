<div>
    
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Connexion & Inscription</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">  
                    <form wire.ignore wire:submit.prevent="register()">  
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prenom</label>
                                    <input class="form-control @error('form1.prenom') is-invalid @enderror" wire:model="form1.prenom" type="text" placeholder="Prenom">
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
                                <div class="col-md-12">
                                    <button type="submit" class="btn">S'incrire</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="login-form">
                        <form wire:submit.prevent="login">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>E-mail</label>
                                    <input class="form-control @error('form2.email') is-invalid @enderror" wire:model="form2.email" type="text" placeholder="Entrer votre email">
                                    @error('form2.email') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Mot de passe</label>
                                    <input class="form-control @error('form2.password') is-invalid @enderror" wire:model="form2.password" type="password" placeholder="Entrer votre mot de passe">
                                    @error('form2.password') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Garder ma session</label>
                                    </div>
                                </div> --}}
                                <button class="btn col-md-12">Se Connecter</button>
                                {{-- <div class="col-md-12 mt-3 mb-3 text-grey text-center">
                                    Ou
                                </div>
                                <button class="btn col-md-12 mb-2" style="background: rgb(82, 82, 249); color:white;border:none;">Facebook</button>
                                <button class="btn col-md-12 mb-2" style="background: rgb(246, 100, 100); color:white;border:none;">Google</button>
                                <button class="btn col-md-12" style="background: rgb(25, 25, 26); color:white;border:none;">Github</button>
                                 --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
   
</div>

@section('js')
<script>
    window.addEventListener('badConnection', event =>{
        iziToast.error({
        title: 'Connexion',
        message: 'Email ou mot de passe incorrect',
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