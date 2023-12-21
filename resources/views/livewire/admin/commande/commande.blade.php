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
        <div class="ms-auto">
            <div class="btn-group">
                @if($etat == "show")
                <button  wire:click.prevent="changeType('list')" class="btn btn-info">Retour</button>
                @endif
            </div>
        </div>
        
    </div>

    <div class="card radius-10">
        <div class="card-body">
           <div class="align-items-center">
               <div class="row mb-3">
                   <h6 class="mb-0 col-md-10" >{{$title}}</h6>
                   @if($etat == "show")
                   <div class="text-right col-md-2">
                    <button class="btn btn-sm btn-outline-success" onclick="return printDiv()" title="Facture"><i class="bx bx-receipt"></i> Imprimer</button>
                   </div>
                   @endif
               </div>
               
           </div>
           <div class="table-responsive">
                @if($etat == "show")
                    @include('livewire.admin.commande.facture')
                @else
                <table id="example" class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                        <th>Reference</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Livraison</th>
                        <th>Montant Total</th>
                        <th>Statut</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $o)
                        <tr>
                            <td>{{$o->reference}}</td>
                            <td>{{ date("d/m/Y", strtotime($o->created_at))}}</td>
                            <td>{{$o->user->prenom}} {{$o->user->nom}}</td>
                            <td>{{$o->shipping}} F CFA</td>
                            <td>{{$o->total_amount}} F CFA</td>
                            <td>
                                @if($o->statut == 0)
                                    <span class="badge bg-info">En attente</span>
                                @elseif($o->statut == 1)
                                    <span class="badge bg-success">Validée</span>
                                @else
                                    <span class="badge bg-danger">Rejetée</span>
                                @endif
                            </td>
                            <td>
                                @if($o->statut == 0 || $o->statut == 2)
                                <button class="btn btn-sm btn-outline-success" wire:click="valider({{$o->id}})" title="valider"><i class="bx bx-check"></i></button>
                                @endif
                                @if($o->statut == 1)
                                <button class="btn btn-sm btn-outline-info" wire:click="showFacture({{$o->id}})" title="Facture"><i class="bx bx-receipt"></i></button>
                                @endif
                                @if($o->statut == 0)
                                <button class="btn btn-sm btn-outline-danger" title="Rejeter"><i class="bx bx-x"></i></button>
                                @endif
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
    window.addEventListener('validOrder', event =>{
        iziToast.success({
        title: 'Commande',
        message: 'Commande validée avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('rejectOrder', event =>{
        iziToast.success({
        title: 'Commande',
        message: 'Commande rejetée',
        position: 'topRight'
        });
    });


    
function printDiv() {
    var printContents = document.getElementById('facture').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    location.reload();
}

</script>

@endsection
