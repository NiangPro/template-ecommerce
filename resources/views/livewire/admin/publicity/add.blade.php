<div class="container col-md-10 mt-4">

    <form wire:submit.prevent="store">
        <div class="row">
            <div class="form-group mb-4 col-md-12">
                <label for="">Produit <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.product_id" disabled>
                    <option value="">Veuillez selectionner un produit</option>
                    @foreach ($prods as $p)
                        <option value="{{$p->id}}"> 
                            {{$p->nom}}
                        </option>
                    @endforeach
                </select>
                @error('form.product_id') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
            <div class="form-group mb-4 col-md-12">
                <label for="">Type <span class="text-danger">*</span></label>
                <select class="form-control" wire:model="form.type">
                    <option value="">Veuillez selectionner un type</option>
                    <option value="banner">Bannière</option>
                    <option value="mini">Mini</option>
                </select>
                @error('form.type') <span class="error text-danger">{{$message}}</span> @enderror
            </div>
        </div>
        @if($form["id"])
        <button type="submit" class="btn btn-outline-warning">Modifier</button>
        @else
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
        @endif
    </form>
</div>

