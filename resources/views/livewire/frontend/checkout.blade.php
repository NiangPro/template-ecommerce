<div>
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Poursuivre ma commande<span>Boutique</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Poursuivre ma commande</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    @if(count($products) > 0)
                    <form action="#">
                        <div class="checkout-discount">
                                <input type="text" class="form-control" required id="checkout-discount-input">
                                <label for="checkout-discount-input" class="text-truncate">Vous avez un coupon? <span>Cliquez ici pour saisir votre code</span></label>
                        </div><!-- End .checkout-discount -->
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Détails de la facturation</h2><!-- End .checkout-title -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Prénom *</label>
                                            <input type="text"  class="form-control" readonly wire:model="form.prenom">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Nom *</label>
                                            <input type="text" class="form-control"  readonly wire:model="form.nom">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Pays *</label>
                                    <input type="text" class="form-control"  readonly wire:model="form.pays">

                                    <label>Nationalité *</label>
                                    <input type="text" class="form-control"  readonly wire:model="form.nationalite">

                                    <label>Adresse *</label>
                                    <input type="text" class="form-control" placeholder="House number and Street name"  readonly wire:model="form.adresse">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>N° Telephone 1 *</label>
                                            <input type="text" class="form-control"  readonly wire:model="form.tel">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>N° Telephone 2</label>
                                            <input type="text" class="form-control"  readonly wire:model="form.tel2">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->


                                    <label>Email *</label>
                                    <input type="email" class="form-control"  readonly wire:model="form.email">


                                    <label>Notes sur la commande (optionnel)</label>
                                    <textarea class="form-control" wire:model="comments" cols="30" rows="4" placeholder="Notes concernant votre commande, par exemple, notes spéciales pour la livraison"></textarea>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Votre commande</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($products as $c)
                                            <tr>
                                                <td><a href="#">{{str($c->product->nom)->limit(17)}}</a></td>
                                                <td>
                                                    @if($c->product->reduction > 0) 
                                                        {{$c->product->reduction * $c->qte}}
                                                    @else
                                                        {{$c->product->prix * $c->qte}}
                                                    @endif
                                                    F</td>
                                            </tr>
                                            @endforeach
                                            <tr class="summary-subtotal">
                                                <td>Sous-total:</td>
                                                <td>{{$subTotal}}F</td>
                                            </tr><!-- End .summary-subtotal -->
                                            {{-- <tr class="summary-subtotal">
                                                <td>Expédition par:</td>
                                                <td></td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td colspan="2" class="text-left">
                                                    <div class="accordion-summary" id="accordion-mode">
                                                        @foreach($achms as $key => $a)
                                                        <div class="card">
                                                            <div class="card-header" id="mode-{{$a->id}}">
                                                                <h2 class="card-title">
                                                                    <a role="button" class="collapsed"  wire:click.prevent="calculTransport({{$a->id}})" data-toggle="collapse" href="#ach-{{$a->id}}" aria-expanded="false" aria-controls="ach-{{$a->id}}">
                                                                        {{ucfirst($a->nom)}}
                                                                    </a>
                                                                </h2>
                                                            </div><!-- End .card-header -->
                                                            <div id="ach-{{$a->id}}" class="collapse" aria-labelledby="mode-{{$a->id}}" data-parent="#accordion-mode">
                                                                <div class="card-body">
                                                                    Prix d'un Kg -> {{$a->prix}} FCFA le Kg <br>
                                                                    Durée de Livraison -> {{$a->nbrejour}} jours
                                                                    <h6 class="border-top">Calcul du prix de transport</h6>
                                                                    @foreach($products as $c)
                                                                    <span>
                                                                        <b>{{$c->product->nom}}</b><br>
                                                                            {{$c->product->poids}}kg x {{$c->qte}} x {{$a->prix}} = {{$c->product->poids * $a->prix * $c->qte}} FCFA
                                                                    </span><br>
                                                                    @endforeach
                                                                </div><!-- End .card-body -->
                                                            </div><!-- End .collapse -->
                                                        </div>
                                                        @endforeach
                                                    </div><!-- End .accordion --> 
                                                    <span><b>Montant du Transport</b> = {{$montantTransport}} FCFA</span>
                                                </td>
                                            </tr> --}}
                                            <tr>
                                                <td ><b>Livraison</b></td>
                                                <td >
                                                    OUI <input type="radio" name="shipping" id="yesShipping"><br>
                                                    NON <input type="radio" name="shipping" wire:click="initAmount"  id="noShipping">
                                                </td>
                                            </tr>
                                            <tr id="mshipping">
                                                <td colspan="2">
                                                    <select name="" id="sshipping" wire:model="montantTransport" class="form-control">
                                                        <option value="0">Selectionner un lieu</option>
                                                        @foreach ($livraisons as $l)
                                                        <option value="{{$l->prix}}">{{$l->lieu}} -> {{$l->prix}}</option>
                                                        @endforeach
                                                        <br>
                                                        <b>Montant Livraison: {{$this->montantTransport}}</b>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{$item_price}} FCFA</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <button type="button" wire:click="payer" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Passer une commande</span>
                                        <span class="btn-hover-text">Procéder au paiement</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                    @else
                        <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong class="h4 text-white">Veuillez d'abord ajouter des produits dans le panier!</strong>.
                        </div>
                    @endif
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
</div>

@section('js')
<script>
    window.addEventListener('display-errors', (errors) => {
        console.log(errors.detail.errors);
        for (let i = 0; i < errors.detail.errors.length; i++) {
            iziToast.error({
                title: 'Paiement',
                message: errors.detail.errors[i],
                position: 'topRight'
            });
        }
    });

    window.addEventListener('successOrder', event =>{
        iziToast.success({
        title: 'Commande',
        message: 'Commande effectuée avec succès',
        position: 'topRight'
        });
    });

   window.addEventListener('noLogged', event =>{
        iziToast.error({
        title: 'Panier',
        message: 'Veuillez d\'abord se connecter',
        position: 'topRight'
        });

        setTimeout(() => {
            window.location.reload();
        }, 3000);
    });
    
    let shipping = document.getElementById("yesShipping");
    let mshipping = document.getElementById("mshipping");
    let noShipping = document.getElementById("noShipping");
    let sshipping = document.getElementById("sshipping");
    mshipping.style.visibility = "hidden";

    shipping.addEventListener("click", ()=>{
        if (shipping.value) {
            mshipping.style.visibility = "visible";
        }
    })

    
    window.addEventListener('cachedSection', event =>{
        mshipping.style.visibility = "hidden";
    });


    noShipping.addEventListener("click", ()=>{
        if (shipping.value) {
            mshipping.style.visibility = "hidden";
            sshipping.selectedIndex = 0;
        }
    })

</script>

@endsection
