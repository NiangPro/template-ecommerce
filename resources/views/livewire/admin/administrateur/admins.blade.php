<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Administrateurs</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                @if($type != "list")
                <button  wire:click.prevent="changeType('list')" class="btn btn-info">Retour</button>
                @else
                <button  wire:click.prevent="changeType('add')" class="btn btn-success">Ajouter</button>
                @endif
            </div>
        </div>
    </div>

    @if ($type != "list")
     @include('livewire.admin.administrateur.add')
    @else   
        <div class="row">
            @foreach ($admins as $admin)
                <div class="col-md-3 card border-primary border-bottom border-3 border-0">
                    <img src="storage/images/{{$admin->image}}" width="100%" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$admin->prenom}} {{$admin->nom}}</h5>
                        <hr>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-outline-info" wire:click="editer({{$admin->id}})"><i class="bx bx-show"></i></button>
                            <button class="btn btn-outline-danger" wire:click="readyForDelete({{$admin->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-trash"></i></button>
                        </div>
                    </div>
                </div>
                
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Etes-vous sûr de vouloir supprimer?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          <button type="button" class="btn btn-danger" wire:click="delete">Supprimer</button>
                        </div>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@section('js')
<script>
    window.addEventListener('addAdmin', event =>{
        iziToast.success({
        title: 'Administrateur',
        message: 'Administrateur ajoutée avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('updateAdmin', event =>{
        iziToast.success({
        title: 'Administrateur',
        message: 'Mis à jour avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('deleteAdmin', event =>{
        iziToast.success({
        title: 'Administrateur',
        message: 'Catégorie supprimée avec succès',
        position: 'topRight'
        });

        $("#exampleModal").modal("hide");
        document.location();
    });

</script>

@endsection
