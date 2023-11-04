<div class="container col-md-10 mt-4">

    <form wire:submit.prevent="store" method="post">
        <div class="row">
            <div class="form-group mb-4 col-md-6">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom de la catégorie" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Catégorie <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.category_id">
                    <option value="">Veuillez selectionner une catégorie</option>
                    @foreach ($categories as $c)
                        <option value="{{$c->id}}">{{$c->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Prix <span class="text-danger">*</span></label>
                <input type="number" placeholder="Entrer le prix du produit" class="form-control @error('form.prix') is-invalid @enderror" wire:model="form.prix">
                @error('form.prix') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Quantité en stock <span class="text-danger">*</span></label>
                <input type="number" placeholder="Entrer la quantité du produit" class="form-control @error('form.qte') is-invalid @enderror" wire:model="form.qte">
                @error('form.qte') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Description <span class="text-danger">*</span></label>
                <textarea placeholder="Entrer la description du produit" class="form-control @error('form.description') is-invalid @enderror" wire:model="form.description"></textarea>
                @error('form.description') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                @if($form["image"])
                <img src="{{$form['image']->temporaryUrl()}}" alt="Responsive image" width="100%" height="100%"><br>
                @endif
                <label for="">Image <span class="text-danger">*</span></label>
                <input type="file" placeholder="Entrer l'image du produit" class="form-control @error('form.image') is-invalid @enderror" wire:model="form.image">
                @error('form.image') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
    </form>
</div>