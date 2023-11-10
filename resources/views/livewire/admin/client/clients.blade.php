<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Clients</li>
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
                    @include('livewire.admin.administrateur.add')
                @else
                <table id="example" class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Image</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Pseudo</th>
                        <th>ACtions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $c)
                        <tr>
                            <td><img src="storage/images/{{$c->image}}" class="product-img-2" alt="product img"></td>
                            <td>{{$c->prenom}}</td>
                            <td>{{$c->nom}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->adresse}}</td>
                            <td>{{$c->tel}}</td>
                            <td>{{$c->pseudo}}</td>
                            
                            <td>
                                <button wire:click="editer({{$c->id}})" class="btn btn-outline-success btn-sm"><i class="bx bx-show"></i></button>
                                <button class="btn btn-outline-danger btn-sm"  wire:click="readyForDelete({{$c->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-trash"></i></button>
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
