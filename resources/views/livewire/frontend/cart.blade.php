<div>
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Panier<span>Boutique</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("accueil")}}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantite</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($tabProds as $key =>$c)
                                    <tr wire:ignore.self>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{asset('storage/images/'.$c["image"])}}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{$c["nom"]}}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">{{$c["prix"]}} F</td>
                                        <td class="price-col">
                                            <div class="cart-product-quantity">
                                                <input type="number" class="form-control" wire:change="changeQteProd({{$c["id"]}}, {{$key}})" wire:model="tabProds.{{$key}}.qte"  min="1"  step="1" data-decimals="0" required>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="total-col">{{$c["prix"] * $c["qte"]}} F</td>
                                        <td class="remove-col"><button wire:confirm="Êtes-vous sûr de vouloir supprimer ?" wire:click="removeCart({{$c["id"]}})" class="btn-remove"><i class="icon-close"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            {{-- <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append --> --}}
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                                <a href="#" wire:click="refreshCart" class="btn btn-outline-dark-2"><span>Actualiser le panier</span><i class="icon-refresh"></i></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Total du Panier</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Sous-total:</td>
                                            <td>{{$subTotal}}F</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{$subTotal}}F</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{route("checkout")}}" class="btn btn-outline-primary-2 btn-order btn-block">Suivre ma commande</a>
                            </div><!-- End .summary -->

                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
</div>

@section('js')
<script>
    window.addEventListener('removeCart', event =>{
        iziToast.success({
        title: 'Produit',
        message: 'Le Produit a été retiré du panier',
        position: 'topRight'
        });

    });

    window.addEventListener('lowQuantity', event =>{
        iziToast.error({
        title: 'Panier',
        message: 'Quantité de stock insuffisante',
        position: 'topRight'
        });
        setTimeout(() => {
            window.location.reload();
        }, 3000);
    });

    window.addEventListener('refresh', event =>{
        window.location.reload();

    });
</script>

@endsection