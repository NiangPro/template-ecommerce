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
                    <form wire:submit.prevent="register">  
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prenom</label>
                                    <input class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom" type="text" placeholder="Prenom">
                                    @error('form.prenom') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Nom</label>
                                    <input class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom" type="text" placeholder="Nom">
                                    @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Adresse</label>
                                    <input class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse" type="text" placeholder="Adresse">
                                    @error('form.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>N° Téléphone</label>
                                    <input class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel" type="tel" placeholder="Numéro de téléphone">
                                    @error('form.tel') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>E-mail</label>
                                    <input class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email" type="email" placeholder="E-mail">
                                    @error('form.email') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Mot de passe</label>
                                    <input class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password" type="password" placeholder="Mot de passe">
                                    @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Mot de passe de confirmation</label>
                                    <input class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation" type="password" placeholder="Mot de passe de confirmation">
                                    @error('form.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
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
                        <form wire:submit.prevent="test">
                        <div class="row">
                            <div class="col-md-12">
                                <label>E-mail</label>
                                <input class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email" type="text" placeholder="Entrer votre email">
                                @error('form.email') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Mot de passe</label>
                                <input class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password" type="password" placeholder="Entrer votre mot de passe">
                                @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Garder ma session</label>
                                </div>
                            </div>
                            <button class="btn col-md-12">Se Connecter</button>
                            <div class="col-md-12 mt-3 mb-3 text-grey text-center">
                                Ou
                            </div>
                            <button class="btn col-md-12 mb-2" style="background: rgb(82, 82, 249); color:white;border:none;">Facebook</button>
                            <button class="btn col-md-12 mb-2" style="background: rgb(246, 100, 100); color:white;border:none;">Google</button>
                            <button class="btn col-md-12" style="background: rgb(25, 25, 26); color:white;border:none;">Github</button>
                            
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

</script>

@endsection