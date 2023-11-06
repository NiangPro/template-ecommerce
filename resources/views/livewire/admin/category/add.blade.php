<div class="container col-md-5 mt-4">

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
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
    </form>
</div>