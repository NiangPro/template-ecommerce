<div class="container col-md-10 mt-4">

    <form wire:ignore.self wire:submit.prevent="store" method="post">
        <div class="row">
            <div class="form-group mb-4 col-md-12">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom du produit" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            
            
            <div class="form-group mb-4 col-md-6">
                <label for="">Image <span class="text-danger">*</span></label>
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

