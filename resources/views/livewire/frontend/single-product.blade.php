<div>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Détails</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Suivant</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Precedant</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        <figure class="product-main-image">
                                            <span class="product-label label-top">Top</span>
                                            <img id="product-zoom" src="{{asset('storage/images/'.$product->image)}}" data-zoom-image="assets/images/products/single/sidebar-gallery/1-big.jpg" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        {{-- <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/sidebar-gallery/1.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/1-big.jpg">
                                                <img src="assets/images/products/single/sidebar-gallery/1-small.jpg" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/2.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/2-big.jpg">
                                                <img src="assets/images/products/single/sidebar-gallery/2-small.jpg" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/3.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/3-big.jpg">
                                                <img src="assets/images/products/single/sidebar-gallery/3-small.jpg" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/4.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/4-big.jpg">
                                                <img src="assets/images/products/single/sidebar-gallery/4-small.jpg" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery --> --}}
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details product-details-sidebar">
                                        <h1 class="product-title">{{$product->nom}}</h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            {{$product->prix}}
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <p>{{$product->description}}</p>
                                        </div><!-- End .product-content -->

                                       

                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <label for="qty">Quantité</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->

                                                <button class="btn-product btn-cart" wire:click.prevent="addToCart"><span>ajouter au panier</span></button>
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>ajouter au favoris</span></a>
                                                {{-- <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a> --}}
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->

                                        <div class="product-details-footer details-footer-col">
                                            <div class="product-cat">
                                                <span>Catégorie</span>
                                                <a href="#">{{$product->category->nom}}</a>,
                                            </div><!-- End .product-cat -->

                                            <div class="social-icons social-icons-sm">
                                                <span class="social-label">Share:</span>
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            </div>
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
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                                </li> --}}
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
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                                        <h3>Fabric & care</h3>
                                        <ul>
                                            <li>Faux suede fabric</li>
                                            <li>Gold tone metal hoop handles.</li>
                                            <li>RI branding</li>
                                            <li>Snake print trim interior </li>
                                            <li>Adjustable cross body strap</li>
                                            <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                        </ul>

                                        <h3>Size</h3>
                                        <p>one size</p>
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
                                            <a href="produit/{{$p->id}}">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist" title="Ajouer au favori"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart" title="ajout panier"><span>Ajouter au panier</span></a>
                                                <a  href="produit/{{$p->id}}" class="btn-product" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$p->category->nom}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="produit/{{$p->id}}">{{$p->nom}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                @if($p->reduction!=0)
                                                    <span class="new-price">{{$p->reduction}}</span>
                                                @endif
                                                <span class="old-price">{{$p->prix}}</span>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
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

    

    window.addEventListener('noLogged', event =>{
        iziToast.success({
        title: 'Panier',
        message: "Veuillez vous connecter d'abord",
        position: 'topRight'
        });
        
    });


  

</script>

@endsection