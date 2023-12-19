<div>
    <div class="row">
        <div class="card radius-10 border-primary border-start border-0 border-4 col-md-5">
            <div class="card-body">
                <h5 class="text-center">Réinitialisation du mot de passe</h5><hr>
                <form wire:submit.prevent="changePassword" method="post">
                    <div class="form-group mb-4">
                        <label for="">Utilisateurs <span class="text-danger">*</span></label>
                        <select wire:model="form.user_id"   class="form-control @error('form.user_id') is-invalid @enderror">
                            <option value="">Veuillez selectionner un utilisateur</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }}</option>
                            @endforeach
                        </select>
                        @error('form.user_id') <span class="error text-danger">{{$message}}</span> @enderror
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
            <h5 class="text-center">Information de la Boutique</h5><hr>
            <form  wire:submit.prevent="editInformation">
                <div class="row">
                    <div class="col-md-5">
                        @if($form["image"])
                        <img width="180" class="col-md-12 rounded" height="200" src="{{$form['image']->temporaryUrl()}}" alt="user avatar">
                        @elseif($image)
                        <img width="180" class="col-md-12 rounded" height="200" src="{{asset('storage/images/'.$image)}}" alt="user avatar">
                        @endif
                        <div class="form-group mt-2 mb-4 col-md-12">
                            <input type="file" placeholder="Entrer l'image du produit" class="form-control @error('form.image') is-invalid @enderror" wire:model="form.image">
                            @error('form.image') <span class="error text-danger">{{$message}}</span> @enderror
                            <div wire:loading wire:target="form.image" class="text-success">Chargement...</div>
                        </div>
                    </div>
                    <div class="col-md-7 mt-4">
                        <div class="form-group mb-4 col-md-12">
                            <label for="">Nom de la boutique <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Entrer le nom" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                            @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="">sigle</label>
                            <input type="text" placeholder="Entrer le sigle" class="form-control @error('form.sigle') is-invalid @enderror" wire:model="form.sigle">
                            @error('form.sigle') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4 col-md-12">
                            <label for="">Numéro téléphone <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Ex: 783828282" class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel">
                            @error('form.tel') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="">Adresse <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Entrer l'adresse" class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse">
                        @error('form.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group mb-4 col-md-6">
                        <label for="">Numéro téléphone Fixe</label>
                        <input type="text" placeholder="Ex: 333828282" class="form-control @error('form.fixe') is-invalid @enderror" wire:model="form.fixe">
                        @error('form.fixe') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" placeholder="Entrer l'adresse email" class="form-control @error('form.email') is-invalid @enderror" wire:model="form.email">
                        @error('form.email') <span class="error text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="">Slogan</label>
                        <input type="text" placeholder="Entrer le slogan" class="form-control @error('form.slogan') is-invalid @enderror" wire:model="form.slogan">
                        @error('form.slogan') <span class="error text-danger">{{$message}}</span> @enderror
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

    window.addEventListener('updateInfo', event =>{
        iziToast.success({
        title: 'Mot de passe',
        message: 'Mis à jour avec succès',
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


</script>

@endsection