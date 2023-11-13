<div>
    <div class="row">
        <div class="card radius-10 border-primary border-start border-0 border-4 col-md-5">
            <div class="card-body">
                <h5 class="text-center">Modification du mot de passe</h5><hr>
                <form wire:submit.prevent="store" method="post">
                        <div class="form-group mb-4">
                            <label for="">Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password">
                            @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Mot de passe de confirmation <span class="text-danger">*</span></label>
                            <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation">
                            @error('form.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                        </div>
                    <button type="submit" class="btn btn-outline-warning">Modifier</button>
                    
                </form>
            </div>
        </div>

        <div class="card radius-10 border-warning border-start border-0 border-4 col-md-7">
            <div class="card-body">
                <h5 class="text-center">Information Personnelle</h5><hr>
            </div>
        </div>
    </div>
    
</div>
