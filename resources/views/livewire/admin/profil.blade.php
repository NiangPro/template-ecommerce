<div>
    <div class="row">
        <div class="card radius-10 border-primary border-start border-0 border-4 col-md-5">
            <div class="card-body">
                <h5 class="text-center">Modification du mot de passe</h5><hr>
                <form wire:submit.prevent="changePassword" method="post">
                    <div class="form-group mb-4">
                        <label for="">Ancien Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password_old') is-invalid @enderror" wire:model="form.password_old">
                        @error('form.password_old') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password">
                        @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Mot de passe de confirmation <span class="text-danger">*</span></label>
                        <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation">
                        @error('form.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Modifier</button>
                    
                </form>
            </div>
        </div>

        <div class="card radius-10 border-warning border-start border-0 border-4 col-md-7">
            <div class="card-body">
                <h5 class="text-center">Information Personnelle</h5><hr>
                <form  wire:submit.prevent="editInformation">
                    <div class="row">
                        <div class="col-md-5">
                            @if($form["image"])
                            <img width="180" class="col-md-12 rounded" height="200" src="{{$form['image']->temporaryUrl()}}" alt="user avatar">
                            @elseif($imgEditing)
                            <img width="180" class="col-md-12 rounded" height="200" src="{{asset('storage/images/'.Auth::user()->image)}}" alt="user avatar">
                            @endif
                            <div class="form-group mt-2 mb-4 col-md-12">
                                <input type="file" placeholder="Entrer l'image du produit" class="form-control @error('form.image') is-invalid @enderror" wire:model="form.image">
                                @error('form.image') <span class="error text-danger">{{$message}}</span> @enderror
                                <div wire:loading wire:target="form.image" class="text-success">Chargement...</div>
                            </div>
                        </div>
                        <div class="col-md-7 mt-4">
                            <div class="form-group mb-4 col-md-12">
                                <label for="">Prénom <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Entrer le prénom" class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom">
                                @error('form.prenom') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <label for="">Nom <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Entrer le nom" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-4 col-md-12">
                                <label for="">Nom utilisateur (pseudo) <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Entrer le nom d'utilisateur" class="form-control @error('form.pseudo') is-invalid @enderror" wire:model="form.pseudo">
                                @error('form.pseudo') <span class="error text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="">Adresse <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Entrer l'adresse" class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse">
                            @error('form.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="">Numéro téléphone 1 <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Ex: 783828282" class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel">
                            @error('form.tel') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="">Numéro téléphone 2</label>
                            <input type="text" placeholder="Ex: 783828282" class="form-control @error('form.tel2') is-invalid @enderror" wire:model="form.tel2">
                            @error('form.tel2') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" placeholder="Entrer l'adresse email" class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email">
                            @error('form.email') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="">Pays</label>
                            <input type="text" placeholder="Entrer le pays" class="form-control @error('form.pays') is-invalid @enderror" wire:model="form.pays">
                            @error('form.pays') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-6">
                            <label for="">Nationalite</label>
                            <input type="text" placeholder="Entrer la nationalité" class="form-control @error('form.nationalite') is-invalid @enderror" wire:model="form.nationalite">
                            @error('form.nationalite') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Modifier</button>

                </form>
            </div>
        </div>
    </div>
    
</div>

@section('js')
<script>
    window.addEventListener('passwordFailed', event =>{
        iziToast.error({
        title: 'Mot de passe',
        message: 'Le mot de passe actuel est incorrect',
        position: 'topRight'
        });
    });

    window.addEventListener('passwordUpdate', event =>{
        iziToast.success({
        title: 'Mot de passe',
        message: 'Mis à jour de mot de passe avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('updateInfo', event =>{
        iziToast.success({
        title: 'Mot de passe',
        message: 'Mis à jour avec succès',
        position: 'topRight'
        });
    });


</script>

@endsection

