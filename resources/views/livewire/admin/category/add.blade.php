<div class="container col-md-8 mt-4">

    <form wire:submit.prevent="store" method="post">
        <div class="form-group">
            <label for="">Nom <span class="text-danger">*</span></label>
            <input type="text" placeholder="Entrer le nom de la catégorie" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
            @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
        </div>
        <div class="form-group mt-4 mb-4">
            <label for="">Catégorie parente</label>
            <select class="form-control" wire:model="form.parent_id">
                <option value="">Veuillez selectionner une catégorie</option>
                @foreach ($categories as $c)
                        <option value="{{$c->id}}">{{$c->nom}}</option>
                    @endforeach
            </select>
        </div>
        <div class="row">
            <div class="form-group mb-4 col-md-6">
                <label for="">Image <span class="text-danger">*</span></label>
                <input type="file" placeholder="Entrer l'image du produit" class="form-control @error('form.image') is-invalid @enderror" wire:model="form.image">
                @error('form.image') <span class="error text-danger">{{$message}}</span> @enderror
                <div wire:loading wire:target="form.image" class="text-success">Chargement...</div>
            </div>
            <div class="col-md-6 text-center">
                @if($form["image"])
                <img src="{{$form['image']->temporaryUrl()}}" alt="Responsive image" width="200" height="150"><br>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">@if($form["id"]) Modifier @else Ajouter @endif</button>
    </form>
</div>