<div class="container col-md-10 mt-4">

    <form wire:ignore.self wire:submit.prevent="store" method="post">
        <div class="row">
            <div class="form-group mb-4 col-md-6">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom du produit" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Catégorie <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.category_id">
                    <option value="">Veuillez selectionner une catégorie</option>
                    @foreach ($categories as $c)
                        <option value="{{$c->id}}"> @if($c->parent) {{$c->parent->nom}} ->  @endif {{$c->nom}}</option>
                    @endforeach
                </select>
                @error('form.category_id') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-4">
                <label for="">Prix <span class="text-danger">*</span></label>
                <input type="number" min="0" placeholder="Entrer le prix du produit" class="form-control @error('form.prix') is-invalid @enderror" wire:model="form.prix">
                @error('form.prix') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-4">
                <label for="">Quantité en stock <span class="text-danger">*</span></label>
                <input type="number" min="0" placeholder="Entrer la quantité du produit" class="form-control @error('form.qte') is-invalid @enderror" wire:model="form.qte">
                @error('form.qte') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-4">
                <label for="">Poids (en Kg) <span class="text-danger">*</span></label>
                <input type="number" min="0" step="0.01" placeholder="Entrer le poids du produit" class="form-control @error('form.poids') is-invalid @enderror" wire:model="form.poids">
                @error('form.poids') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Description <span class="text-danger">*</span></label>
                <textarea placeholder="Entrer la description du produit" class="form-control @error('form.description') is-invalid @enderror" wire:model="form.description"></textarea>
                @error('form.description') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-6">
                <label for="">Tags</label> <br>
                @foreach($tags as $key=>$t)
                <label for="">{{$t->nom}} <input type="checkbox" class="" wire:model="form.tags.{{$key}}" value="{{$t->id}}"></label>
                @endforeach
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

