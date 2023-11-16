<div class="col-md-4 container">
    <form wire:submit.prevent="store" method="POST">
            <div class="form-group mb-4 col-md-12">
                <label for="">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Entrer le nom" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            @if($form["id"])
        <button type="submit" class="btn btn-outline-warning">Modifier</button>
        @else
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
        @endif
    </form>
</div>