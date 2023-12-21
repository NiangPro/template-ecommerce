<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Mode d'acheminement</li>
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

    <div class="card radius-10">
        <div class="card-body">
           <div class="d-flex align-items-center">
               <div>
                   <h6 class="mb-0">{{$title}}</h6>
               </div>
               
           </div>
            <div class="table-responsive">
                @if($type == "add" || $type == "edit")
                    @include('livewire.admin.acheminement.add')
                @else
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Pays</th>
                            <th>Prix Bâteau</th>
                            <th>Jours par Bâteau</th>
                            <th>Prix Avion</th>
                            <th>Jours par Avion</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aches as $c)
                            <tr >
                                <td class="h5">{{$c->pays}}</td>
                                <td>{{$c->prix_bateau}} FCFA</td>
                                <td>{{$c->nbrejour_bateau}} jours</td>
                                <td>{{$c->prix_avion}} FCFA</td>
                                <td>{{$c->nbrejour_avion}} jours</td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm radius-30" wire:click="editer({{$c->id}})"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-outline-danger btn-sm radius-30" wire:click="readyForDelete({{$c->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                           
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
                    </tbody>
                </table>
                @endif
            </div>
        </div>
     </div>
</div>

@section('js')
<script>
    window.addEventListener('addAcheminement', event =>{
        iziToast.success({
        title: "Mode d'acheminement",
        message: "Mode d'acheminement ajouté avec succès",
        position: 'topRight'
        });
    });

    window.addEventListener('updateAcheminement', event =>{
        iziToast.success({
        title: "Mode d'acheminement",
        message: 'Mis à jour avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('deleteAcheminement', event =>{
        iziToast.success({
        title: "Mode d'acheminement",
        message: "Mode d'acheminement supprimé avec succès",
        position: 'topRight'
        });

        $("#exampleModal").modal("hide");
        document.location();
    });

</script>

@endsection
