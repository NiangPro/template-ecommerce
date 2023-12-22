<div>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Détails</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div wire:ignore.self class="product-gallery product-gallery-vertical">
                                        <div class="row">
                                            <figure class="product-main-image">
                                                @foreach($product->tags as $t)
                                                    <span style="background-color: " class="product-label label-new">{{$t->nom}}</span>
                                                @endforeach
                                                @if($imgGalerie)
                                                    <img id="product-zoom" src="{{asset('storage/images/'.$imgGalerie)}}" data-zoom-image="{{asset('storage/images/'.$imgGalerie)}}" alt="product image">
                                                @else
                                                    <img id="product-zoom" src="{{asset('storage/images/'.$product->image)}}" data-zoom-image="{{asset('storage/images/'.$product->image)}}" alt="product image">
                                                @endif
                                                <a href="#product-zoom-gallery" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->
    
                                            <div wire:ignore.self id="product-zoom-gallery" class="product-image-gallery">
                                                @foreach($product->images as $img)
                                                    <a class="product-gallery-item" href="#" data-image="{{asset('storage/images/'.$img->nom)}}" data-zoom-image="{{asset('storage/images/'.$img->nom)}}">
                                                        <img src="{{asset('storage/images/'.$img->nom)}}" alt="image galerie">
                                                    </a>
                                                @endforeach
                                            </div><!-- End .product-image-gallery -->
                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details product-details-sidebar">
                                        <h1 class="product-title">{{$product->nom}}</h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            {{-- <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a> --}}
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            @if($product->reduction!=0)
                                                <span class="new-price">{{$product->reduction}}F CFA</span>
                                                <span class="intro-old-price ml-2">{{$product->prix}}F CFA</span>
                                            @else
                                                <span class="new-price">{{$product->prix}}F CFA</span>
                                            @endif
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <p>{{$product->description}}</p>
                                        </div><!-- End .product-content -->

                                       

                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <label for="qty">Quantité</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" wire:model="qte" class="form-control" min="1"  step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                                                @if($product->type == 0)
                                                <button class="btn-product btn-cart btn btn-warning btn" wire:click.prevent="addToCart"><span>ajouter au panier</span></button>
                                                @else
                                                <button class="btn-product btn-cart btn btn-warning btn" wire:click="gotoCheckout"><span>Commander</span></button>
                                                @endif
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                @if($product->type == 0)
                                                <a href="#" wire:click.prevent="addToWishlist({{$product->id}})" class="btn-product btn-compare" title="Compare"><span>ajouter au favoris</span></a>
                                                @endif
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer details-footer-col">
                                            <div class="product-cat">
                                                <span>Catégorie</span>
                                                <a href="#">{{$product->category->nom}}</a>,
                                            </div><!-- End .product-cat -->

                                           
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->

                        <div class="product-details-tab">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">information additionnelle</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                    <div class="product-desc-content">
                                        <h3>Detail du produit</h3>
                                        <p>{{$product->nom}}</p>
                                        <ul>
                                            <li>{{$product->nom}} {{$product->description}}</li>
                                        </ul>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                    <div class="product-desc-content">
                                        <h3>Information</h3>
                                        <p>{{$product->supplementaire}}. </p>

                                       
                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-details-tab -->

                    </div><!-- End .col-lg-9 -->

                    {{-- <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">Related Product</h4><!-- End .widget-title -->

                                <div class="products">
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/1.jpg" alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Light brown studded Wide fit wedges</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$110.00</span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/2.jpg" alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Yellow button front tea top</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $56.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/3.jpg" alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Beige metal hoop tote bag</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $50.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->

                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="assets/images/products/single/sidebar/4.jpg" alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">Black soft RI weekend travel bag</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                $75.00
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product product-sm -->
                                </div><!-- End .products -->

                                <a href="category.html" class="btn btn-outline-dark-3"><span>Voir d'autres produits</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .widget widget-products -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                                
                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-product -->
                    </aside><!-- End .col-lg-3 --> --}}
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- End .mb-5 -->

                
                <div class="container for-you">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Tu pourrais aussi aimer</h2><!-- End .title -->
                        </div><!-- End .heading-left -->
                    </div><!-- End .heading -->

                    <div class="products">
                        <div class="row justify-content-center">
                            @foreach ($produits as $p)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            @foreach($p->tags as $t)
                                                <span class="product-label label-circle label-sale">{{$t->nom}}</span>
                                            @endforeach
                                            <a href="{{route('singleProduct', ["id" => $p->id])}}">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                @if($this->isFavori($p->id))
                                                    <a wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-fav btn-wish" title="Ajouer au favori"><i class="icon-heart"></i></a>
                                                @else
                                                    <a wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist btn-fav" title="Ajouer au favori"></a>
                                                @endif
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart" title="ajout panier"><span>Ajouter au panier</span></a>
                                                <a  href="{{route('singleProduct', ["id" => $p->id])}}" class="btn-product" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$p->category->nom}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="produit/{{$p->id}}">{{$p->nom}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                @if($p->reduction!=0)
                                                    <span class="new-price">{{$p->reduction}}F CFA</span>
                                                    <span class="intro-old-price ml-2">{{$p->prix}}F CFA</span>
                                                @else
                                                    <span class="new-price">{{$p->prix}}F CFA</span>
                                                @endif
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                {{-- <span class="ratings-text">( 4 Reviews )</span> --}}
                                            </div><!-- End .rating-container -->
                                            <div class="product-nav product-nav-thumbs">
                                                @if($p->images)
                                                    @foreach($p->images as $img)
                                                        <a href="{{route('singleProduct', ["id" => $p->id])}}">
                                                            <img src="{{asset('storage/images/'.$img->nom)}}" alt="image galerie">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .container -->


            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
</div>

@section('js')
<script>
    window.addEventListener('productAdded', event =>{
        iziToast.success({
        title: 'Panier',
        message: 'Produit ajouté au panier avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('productUpdate', event =>{
        iziToast.success({
        title: 'Panier',
        message: 'La quantité a été mise à jour avec succès',
        position: 'topRight'
        });
    });

    window.addEventListener('lowQuantity', event =>{
        iziToast.error({
        title: 'Panier',
        message: 'Quantité de stock insuffisante',
        position: 'topRight'
        });
    });

    window.addEventListener('noLogged', event =>{
        iziToast.error({
        title: 'Panier',
        message: "Veuillez vous connecter d'abord",
        position: 'topRight'
        });
        
    });

    window.addEventListener('noLoggedFavori', event =>{
            iziToast.error({
            title: 'Favori',
            message: 'Veuillez d\'abord se connecter',
            position: 'topRight'
            });
        });

        window.addEventListener('favoriAdded', event =>{
            iziToast.success({
            title: 'Favori',
            message: 'Favori ajouté avec succès',
            position: 'topRight'
            });

            setTimeout(() => {
                window.location.reload();
            }, 3000);
        });

        window.addEventListener('existFavori', event =>{
            iziToast.error({
            title: 'Favori',
            message: 'Ce favori existe déja dans la liste',
            position: 'topRight'
            });

            setTimeout(() => {
                window.location.reload();
            }, 3000);
        });
  

</script>

@endsection