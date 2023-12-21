<div class="container col-md-10 mt-4">

    <form wire:ignore.self wire:submit.prevent="store" method="post">
        <div class="row">
            <div class="form-group mb-4 col-md-4">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom du produit" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-4">
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
                <label for="">Réduction</label>
                <input type="number" min="0" placeholder="Entrer le prix de réduction" class="form-control @error('form.reduction') is-invalid @enderror" wire:model="form.reduction">
                @error('form.reduction') <span class="error text-danger">{{$message}}</span> @enderror
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
                <label for="">Infos supplementaires</label>
                <textarea placeholder="Entrer la description du produit" class="form-control @error('form.supplementaire') is-invalid @enderror" wire:model="form.supplementaire"></textarea>
                @error('form.supplementaire') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-4">
                <label for="">Type de Produit <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.type"  wire:change="afficherPays">
                    <option value="0">Local</option>
                    <option value="1">Extérieur</option>
                </select>
                @error('form.type') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            @if($showPays == 1)
            <div class="form-group mb-4 col-md-4">
                <label for="">Pays <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.category_id">
                    <option value="">Veuillez selectionner un pays</option>
                    @foreach ($pays as $c)
                        <option value="{{$c->id}}"> {{$c->pays}}</option>
                    @endforeach
                </select>
                @error('form.category_id') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            @endif
            <div class="form-group mb-4 col-md-4">
                <label for="">Tags</label> <br>
                <select wire:model="form.tags" multiple class="form-control">
                    <option value="">Veuillez selectionner des tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->nom }}</option>
                    @endforeach
                </select>
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
            @if($form["id"])
                <div class="form-group mb-4 col-md-4 mt-2">
                    <label for="">Image Galerie</label>
                    <input type="file" multiple placeholder="Entrer des images galerie" class="form-control @error('form.galeries') is-invalid @enderror" wire:model="form.galeries">
                    @error('form.galeries') <span class="error text-danger">{{$message}}</span> @enderror
                    <div wire:loading wire:target="form.galeries" class="text-success">Chargement...</div>
                </div>
                <div class="col-md-8 text-center mt-2" style="position: relative; display: flex; flex-wrap: wrap;">
                    @if($form["galeries"])
                        @foreach($form["galeries"] as $image)
                            <img src="{{$image->temporaryUrl()}}" alt="Responsive image" width="200" height="150">
                        @endforeach
                        @elseif($imgGalerie)
                        @foreach($imgGalerie as $image)
                            <span style="position: relative; margin-bottom: 5px; margin-left: 2px">
                                <img src="storage/images/{{$image->nom}}" alt="Responsive image" width="200" height="150">
                                <a wire:click.prevent="removeGalerie({{$image->id}})" style="position: absolute; right: 4px;" type="bouton" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
                            </span>
                                                   
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
        @if($form["id"])
            <button type="submit" class="btn btn-outline-warning">Modifier</button>
        @else
            <button type="submit" class="btn btn-outline-success">Ajouter</button>
        @endif
    </form>
</div>
