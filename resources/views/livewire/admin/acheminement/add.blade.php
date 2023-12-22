<div class="container col-md-8 mt-4">

    <form wire:submit.prevent="store" method="post">
        <div class="row">
            
            <div class="form-group mb-3 col-md-12">
                <label for="">Pays <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom du pays" class="form-control @error('form.pays') is-invalid @enderror" wire:model="form.pays">
                @error('form.pays') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="">Prix d'un kg pour bâteau</label>
                <input type="number" min="1" placeholder="Entrer le prix du volume par bâteau" class="form-control @error('form.prix_bateau') is-invalid @enderror" wire:model="form.prix_bateau">
                @error('form.prix_bateau') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="">Nombre de jours pour bâteau</label>
                <input type="number" min="1" placeholder="Entrer le nombre de jours par bâteau" class="form-control @error('form.nbrejour_bateau') is-invalid @enderror" wire:model="form.nbrejour_bateau">
                @error('form.nbrejour_bateau') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="">Prix d'un kg pour avion</label>
                <input type="number" min="1" placeholder="Entrer le prix du volume par avion" class="form-control @error('form.prix_avion') is-invalid @enderror" wire:model="form.prix_avion">
                @error('form.prix_avion') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-3 col-md-6">
                <label for="">Nombre de jours pour avion</label>
                <input type="number" min="1" placeholder="Entrer le nombre de jours par avion" class="form-control @error('form.nbrejour_avion') is-invalid @enderror" wire:model="form.nbrejour_avion">
                @error('form.nbrejour_avion') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            
        </div>
        
        <button type="submit" class="btn btn-outline-success">@if($form["id"]) Modifier @else Ajouter @endif</button>
    </form>
</div>