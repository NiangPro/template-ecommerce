<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                    @include('livewire.admin.category.add')
                @else
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $c)
                            <tr>
                                <td class="h5">{{$c->nom}}</td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm radius-30" wire:click="editer({{$c->id}})"><i class="bx bx-show"></i></button>
                                    <button class="btn btn-outline-danger btn-sm radius-30"><i class="bx bx-trash"></i></button>
                                </td>
                            </tr>
                            @if($c->children)
                                
                                @foreach ($c->children as $child)
                                    <tr>
                                        <td class="ps-5 h6"><i class='bx bx-subdirectory-right'></i>{{$child->nom}}</td>
                                        <td>
                                            <button class="btn btn-outline-info btn-sm radius-30" wire:click="editer({{$child->id}})"><i class="bx bx-show"></i></button>
                                            <button class="btn btn-outline-danger btn-sm radius-30"><i class="bx bx-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
    window.addEventListener('addCategory', event =>{
        iziToast.success({
        title: 'Catégorie',
        message: 'Catégorie ajoutée avec succès',
        position: 'topRight'
        });
    });

</script>

@endsection
