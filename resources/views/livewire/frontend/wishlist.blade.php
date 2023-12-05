<div>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Favori<span>Boutique</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Favori</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <table id="example" class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Disponibilité</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($allFavoris !=null)
                            @foreach($allFavoris as $fav)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset('storage/images/'.$fav->product->image)}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$fav->product->nom}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{$fav->product->prix}} Fcfa</td>
                                    <td class="stock-col">
                                        @if($fav->product->qte > 0)
                                            <span class="in-stock">Disponible</span>
                                        @else
                                            <span class="out-of-stock">Indisponible</span>
                                        @endif
                                    </td>
                                    <td class="action-col">
                                        @if($fav->product->qte > 0)
                                            <button wire:click.prevent="addToCart({{$fav->product->id}})" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Ajouter au panier</button>
                                        @else
                                            <button class="btn btn-block btn-outline-primary-2 disabled">Ajouter au panier</button>
                                        @endif
                                    </td>
                                    <td class="remove-col"><button wire:click.prevent="removeFavori({{$fav->id}})" class="btn-remove"><i class="icon-close"></i></button></td>
                                </tr>
                            @endforeach
                        @else
                                <h4>Aucun favori pour le moment</h4>
                        @endif
                    </tbody>
                </table><!-- End .table table-wishlist -->
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</div>

@section('js')
    <script>
        window.addEventListener('productAdded', event =>{
            iziToast.success({
            title: 'Produit',
            message: 'Produit ajouté avec succès',
            position: 'topRight'
            });

            setTimeout(() => {
                window.location.reload();
            }, 3000);
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

        window.addEventListener('existProduct', event =>{
            iziToast.error({
            title: 'Panier',
            message: 'Ce produit existe déja dans le panier',
            position: 'topRight'
            });

            setTimeout(() => {
                window.location.reload();
            }, 3000);
        });

        window.addEventListener('removeFav', event =>{
        iziToast.success({
        title: 'Produit',
        message: 'Le Produit a été retiré des Favoris',
        position: 'topRight'
        });

    });

    </script>

@endsection
