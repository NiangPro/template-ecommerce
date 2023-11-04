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
                    @include('livewire.admin.produit.add')
                @else
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Categorie</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Réduction</th>
                        <th>ACtions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $p)
                        <tr>
                            <td>{{$p->nom}}</td>
                            <td><img src="storage/images/{{$p->image}}" class="product-img-2" alt="product img"></td>
                            <td>{{$p->category->nom}}</td>
                            <td><span class="badge bg-success text-white shadow-sm">{{$p->qte}}</span></td>
                            <td>{{$p->prix}} F CFA</td>
                            <td>{{$p->reduction}} F CFA</td>
                            <td>
                                <a href="" class="btn btn-outline-success btn-sm"><i class="icon-eye"></i></a>
                            </td>
                        </tr>
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
    window.addEventListener('addProduct', event =>{
        iziToast.success({
        title: 'Produit',
        message: 'Produit ajouté avec succès',
        position: 'bottomRight'
        });
    });

</script>

@endsection
