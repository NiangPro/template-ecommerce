    <div class="container col-md-10 mt-4 card border-primary border-bottom border-3 border-0">
        <div class="card-body">
            <h5 class="card-title text-primary">{{$title}}</h5>
            <hr>
        
    <form wire:submit.prevent="store" method="post">
        <h5 class="text-center">Les champs <span class="text-danger">*</span> sont obligatoires</h5>
        <div class="row">
            <div class="form-group mb-4 col-md-6">
                <label for="">Prénom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le prénom" class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom">
                @error('form.prenom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Nom utilisateur (pseudo) <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" class="form-control @error('form.pseudo') is-invalid @enderror" wire:model="form.pseudo">
                @error('form.pseudo') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
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
                <label for="">Mot de passe <span class="text-danger">*</span></label>
                <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password">
                @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Mot de passe de confirmation <span class="text-danger">*</span></label>
                <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation">
                @error('form.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
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
            
            
            <div class="form-group mb-4 col-md-6">
                <label for="">Image</label>
                <input type="file" placeholder="Entrer l'image du produit" class="form-control @error('form.image') is-invalid @enderror" wire:model="form.image">
                @error('form.image') <span class="error text-danger">{{$message}}</span> @enderror
                <div wire:loading wire:target="form.image" class="text-success">Chargement...</div>
            </div>
            <div class="col-md-6 text-center">
                @if($form["image"])
                <img src="{{$form['image']->temporaryUrl()}}" alt="Responsive image" width="200" height="150"><br>
                @elseif($imgEditing)
                <img src="storage/images/{{$imgEditing}}" alt="Responsive image" width="200" height="150"><br>
                @endif
            </div>
        </div>
        @if($form["id"])
        <button type="submit" class="btn btn-outline-warning">Modifier</button>
        @else
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
        @endif
    </form>
</div>
</div>