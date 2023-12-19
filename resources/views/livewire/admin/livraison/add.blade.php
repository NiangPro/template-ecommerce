<div class="container col-md-8 mt-4">

    <form wire:submit.prevent="store" method="post">
        <div class="form-group mb-3">
            <label for="">Lieu <span class="text-danger">*</span></label>
            <input type="text" placeholder="Entrer le lieu" class="form-control @error('form.lieu') is-invalid @enderror" wire:model="form.lieu">
            @error('form.lieu') <span class="error text-danger">{{$message}}</span> @enderror
        </div>
       <div class="form-group mb-3">
            <label for="">Prix <span class="text-danger">*</span></label>
            <input type="number" min="1" placeholder="Entrer le prix" class="form-control @error('form.prix') is-invalid @enderror" wire:model="form.prix">
            @error('form.prix') <span class="error text-danger">{{$message}}</span> @enderror
        </div>
        
        <button type="submit" class="btn btn-outline-success">@if($form["id"]) Modifier @else Ajouter @endif</button>
    </form>
</div>