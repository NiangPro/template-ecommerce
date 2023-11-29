<div class="container col-md-8 mt-4">

    <form wire:submit.prevent="store" method="post">
        <div class="form-group mb-3">
            <label for="">Nom <span class="text-danger">*</span></label>
            <input type="text" placeholder="Entrer le nom de la catégorie" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
            @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Nombre de jours <span class="text-danger">*</span></label>
            <input type="number" placeholder="Entrer le nombre de jours" class="form-control @error('form.nbrejour') is-invalid @enderror" wire:model="form.nbrejour">
            @error('form.nbrejour') <span class="error text-danger">{{$message}}</span> @enderror
        </div>
        
        <button type="submit" class="btn btn-outline-success">@if($form["id"]) Modifier @else Ajouter @endif</button>
    </form>
</div>