<div>
    {{-- Slider accueil --}}
    <div class="intro-slider-container mb-5" style="background-color: rgb(255, 255, 255)!important">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
            data-owl-options='{
                "dots": true,
                "nav": false, 
                "responsive": {
                    "1200": {
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            @foreach ($produitSlider as $p)
                <div  class="intro-slide" style="background-image: url(storage/images/{{$p->image}}); align-items: center; background-size: contain; background-position: left; background-repeat: no-repeat;">
                    <div class="container intro-content">
                        <div class="row justify-content-end">
                            <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                <h3 class="intro-subtitle text-third">Offre et promotion</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">{{$p->nom}}</h1>
                                {{-- <h1 class="intro-title">Dre Studio 3</h1><!-- End .intro-title --> --}}

                                <div class="intro-price">
                                    @if($p->reduction)
                                        <sup class="intro-old-price">{{$p->prix}} Fcfa</sup>
                                        <span class="text-third">
                                            {{$p->reduction}} Fcfa
                                        </span>
                                    @else
                                        <span class="text-black">
                                            {{$p->prix}} Fcfa
                                        </span>
                                    @endif
                                    
                                </div><!-- End .intro-price -->

                                <a href="{{route('singleProduct', ["id" => $p->id])}}" class="btn btn-primary btn-round">
                                    <span>Voir Plus</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-lg-11 offset-lg-1 -->
                        </div><!-- End .row -->
                    </div><!-- End .intro-content -->
                </div><!-- End .intro-slide -->
            @endforeach
            
            {{-- <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-2.png);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Apple iPad Pro <br>12.9 Inch, 64GB </h1><!-- End .intro-title -->

                            <div class="intro-price">
                                <sup>Today:</sup>
                                <span class="text-primary">
                                    $999<sup>.99</sup>
                                </span>
                            </div><!-- End .intro-price -->

                            <a href="category.html" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-md-6 offset-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide --> --}}
        </div><!-- End .intro-slider owl-carousel owl-simple -->
 
        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->
    {{-- Slider accueil --}}

    {{-- categories populaire --}}
        <div class="container">
            <h2 class="title text-center mb-4">Explorer Nos catégories populaires</h2><!-- End .title text-center -->
            
            <div class="cat-blocks-container">
                <div class="row">
                    @foreach($categories as $c)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="{{route('archiveProduct', ['slug' => $c->slug, "id" => $c->id])}}" class="cat-block">
                                <figure>
                                    <span>
                                        @if($c->image)
                                            <img src="{{asset('storage/images/'.$c->image)}}" alt="Category image">
                                        @else
                                            <img src="assets/images/demos/demo-4/cats/3.png" alt="Category image">
                                            <input type="d">
                                        @endif
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$c->nom}}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .cat-blocks-container -->
        </div>
    {{-- categories populaire --}}
    <div class="mb-4"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="assets/images/demos/demo-4/banners/banner-1.png" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Offre Intelligente</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="#">Economisez de l'argent sur <strong>le Samsung <br>Galaxy Note9</strong></a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Acheter maintenant<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="assets/images/demos/demo-4/banners/banner-2.jpg" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Offre de temps</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="#"><strong>casque bluethoof</strong> <br>Réduction de Temps -30%</a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Acheter maintenant<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="assets/images/demos/demo-4/banners/banner-3.png" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="#">Autorisation</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong> <br>Economisez de l'argent</a></h3><!-- End .banner-title -->
                        <a href="#" class="banner-link">Acheter maintenant<i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-5 -->

    <div class="container">
        <h2 class="title text-center mb-4">Nouvel arrivage</h2><!-- End .title text-center -->
        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1200": {
                        "items":4,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            @foreach ($produitSlider as $p)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @foreach($p->tags as $t)
                            <span class="product-label label-new">{{$t->nom}}</span>
                        @endforeach
                        <a href="product.html">
                            <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favori</span></a>
                            <a href="produit/{{$p->id}}" class="btn-product-icon btn-quickview" title="Voir plus"><span>Voir plus</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart"><span>Ajouter au panier</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{$p->category->nom}}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="produit/{{$p->id}}">{{$p->nom}}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            {{$p->nom}}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            @endforeach
            
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
            <img src="assets/images/demos/demo-4/camera.png" alt="camera" class="cta-img">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>Achetez les offres du jour <br><strong>géniales en toute simplicité. HERO7 Black</strong></p>
                        </div><!-- End .cta-text -->
                        <a href="#" class="btn btn-primary btn-round"><span>Acheter maintenant</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .cta-content -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title">Offres et points de vente</h2><!-- End .title -->
            <p class="title-desc">L'offre d'aujourd'hui et plus encore</p><!-- End .title-desc -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('assets/images/demos/demo-4/deal/bg-1.jpg');">
                    <div class="deal-top">
                        <h2>Deal of the Day.</h2>
                        <h4>Limited quantities. </h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="produit/{{$p->id}}">Home Smart Speaker with  Google Assistant</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$129.00</span>
                            <span class="old-price">Was $150.99</span>
                        </div><!-- End .product-price -->

                        <a href="produit/{{$p->id}}" class="btn btn-link"><span>Shop Now</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('assets/images/demos/demo-4/deal/bg-2.jpg');">
                    <div class="deal-top">
                        <h2>Your Exclusive Offers.</h2>
                        <h4>Sign in to see amazing deals.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="produit/{{$p->id}}">Certified Wireless Charging  Pad for iPhone / Android</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">$29.99</span>
                        </div><!-- End .product-price -->

                        <a href="login.html" class="btn btn-link"><span>Sign In and Save money</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="more-container text-center mt-1 mb-5">
            <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Shop more Outlet deals</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->

    <div class="container">
        <hr class="mb-0">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": false,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "420": {
                        "items":3
                    },
                    "600": {
                        "items":4
                    },
                    "900": {
                        "items":5
                    },
                    "1024": {
                        "items":6
                    }
                }
            }'>
            <a href="#" class="brand">
                <img src="assets/images/brands/1.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/2.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/3.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/4.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/5.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="assets/images/brands/6.png" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    {{-- tendances --}}
        <div wire:ignore.self class="bg-light pt-5 pb-6">
            <div wire:ignore.self class="container trending-products">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Tendances</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div wire:ignore.self class="heading-right">
                        <ul wire:ignore.self class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a wire:ignore.self class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">LES MIEUX NOTÉS</a>
                            </li>
                            <li class="nav-item">
                                <a wire:ignore.self class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">MEILLEURES VENTES</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="trending-sale-link" data-toggle="tab" href="#trending-sale-tab" role="tab" aria-controls="trending-sale-tab" aria-selected="false">On Sale</a>
                            </li> --}}
                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="row" wire:ignore.self>
                    <div class="col-xl-5col d-none d-xl-block">
                        <div class="banner">
                            <a href="#">
                                <img src="assets/images/demos/demo-4/banners/banner-4.jpg" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-xl-5col -->

                    <div class="col-xl-4-5col">
                        <div wire:ignore.self class="tab-content tab-content-carousel just-action-icons-sm">
                            <div wire:ignore wire:ignore.self class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                                <div wire:ignore.self class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach ($produits as $p)
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                @foreach($p->tags as $t)
                                                    <span class="product-label label-circle label-top">{{$t->nom}}</span>
                                                @endforeach
                                                <a href="produit/{{$p->id}}">
                                                    <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart" title="Ajout panier"><span>Ajouter au panier</span></a>
                                                    <a  href="produit/{{$p->id}}" class="btn-product" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{$p->category->nom}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="produit/{{$p->id}}">{{$p->nom}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{$p->prix}}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 4 vues )</span>
                                                </div><!-- End .rating-container -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div  wire:ignore.self class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel" aria-labelledby="trending-best-link">
                                <div wire:ignore.self class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                    @foreach ($produits as $p)
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                @foreach($p->tags as $t)
                                                    <span class="product-label label-circle label-top">{{$t->nom}}</span>
                                                @endforeach
                                                <a href="produit/{{$p->id}}">
                                                    <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#"  wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart" title="Ajout panier"><span>Ajouter au panier</span></a>
                                                    <a  href="produit/{{$p->id}}" class="btn-product" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{$p->category->nom}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="produit/{{$p->id}}">{{$p->nom}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{$p->prix}}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 4 vues )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- fin tendances --}}
    <div class="mb-5"></div><!-- End .mb-5 -->

    <div class="container for-you">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Recommendation pour vous</h2><!-- End .title -->
            </div><!-- End .heading-left -->

           {{-- <div class="heading-right">
                <a href="#" class="title-link">Voir toutes les recommandations<i class="icon-long-arrow-right"></i></a>
           </div><!-- End .heading-right --> --}}
        </div><!-- End .heading -->

        <div class="products">
            <div class="row justify-content-center">
                @foreach ($produitsRec as $p)
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
                                    <span class="new-price">{{$p->reduction}}</span>
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

    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->

    <div class="icon-boxes-container bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Livraison gratuite</h3><!-- End .icon-box-title -->
                            <p>Commandes de 100000fcfa ou plus</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Retours sans frais</h3><!-- End .icon-box-title -->
                            <p>Dans les plus bref delai</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Obtenez de réduction sur nos produits</h3><!-- End .icon-box-title -->
                            <p>quand tu t'inscris</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Nous soutenons Des services incroyables</h3><!-- End .icon-box-title -->
                            <p>24h/24 et 7j/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->
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
