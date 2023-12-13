<div>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
                </ol>
            </nav>
        </div>
        
    </div>

    <div class="card radius-10">
        <div class="card-body">
           <div class="d-flex align-items-center">
               <div>
                   <h6 class="mb-0">Liste des dernières commandes</h6>
               </div>
               
           </div>
           <div class="table-responsive">
                <table id="example" class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Reference</th>
                        <th>Produits</th>
                        <th>Client</th>
                        <th>Livraison</th>
                        <th>Montant Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $o)
                        <tr>
                            <td>{{$o->reference}}</td>
                            <td>
                                @foreach ($o->products as $p)
                                    <span><img src="storage/images/{{$p->image}}" class="product-img-2" alt="{{$p->nom}}"> {{$p->nom}}</span><br>
                                @endforeach
                            </td>
                            <td>{{$o->user->prenom}} {{$o->user->nom}}</td>
                            <td>{{$o->shipping}} F CFA</td>
                            <td>{{$o->total_amount}} F CFA</td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
