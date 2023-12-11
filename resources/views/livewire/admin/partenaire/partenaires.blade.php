<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
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
                @if($type != "list")
                    @include('livewire.admin.partenaire.add')
                @else
                <table id="example" class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parteners as $p)
                        <tr>
                            <td>{{$p->nom}}</td>
                            <td><img src="storage/images/{{$p->image}}" class="product-img-2" alt="product img"></td>
                            
                            <td class="text-right">
                                <button wire:click="editer({{$p->id}})" class="btn btn-outline-success btn-sm"><i class="bx bx-show"></i></button>
                                <button class="btn btn-outline-danger btn-sm"  wire:click="readyForDelete({{$p->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-trash"></i></button>
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
    window.addEventListener('addPartener', event =>{
        iziToast.success({
        title: 'Partenaire',
        message: 'Partenaire ajouté avec succès',
        position: 'bottomRight'
        });
    });

    window.addEventListener('updatePartener', event =>{
        iziToast.success({
        title: 'Partenaire',
        message: 'Mis à jour avec succès',
        position: 'topRight'
        });
    });

    

    window.addEventListener('deletePartener', event =>{
        iziToast.success({
        title: 'Partenaire',
        message: 'Partenaire supprimé avec succès',
        position: 'topRight'
        });

        $("#exampleModal").modal("hide");
        
    });

</script>

@endsection
