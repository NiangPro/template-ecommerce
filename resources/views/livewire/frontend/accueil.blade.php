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
            @if(count($produitSlider)>0)
                @foreach ($produitSlider as $p)
                    <div  class="intro-slide" style="background-image: url(storage/images/{{$p->image}}); align-items: center; background-size: contain; background-position: left; background-repeat: no-repeat;">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third" style="color: #27c965;">Offre et promotion</h3><!-- End .h3 intro-subtitle -->
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

                                    <a href="{{route('singleProduct', ["id" => $p->id])}}" class="btn btn-round" style="background-color:#faad2b;">
                                        <span>Voir Plus</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                @endforeach
            @else
                <div class="text-center" style="color: #27c965;">
                    <h2>Aucun produit disponible sur votre boutique; </h2>
                    <h2>Pour pouvoir ajouter un produit au panier, il faut impérativement avoir un compte</h2>
                </div>
            @endif
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
            @foreach($minipubs as $key=>$p)
                @if($key == 0)
                    <div class="col-md-6 col-lg-4">
                        <div class="deal" style="min-height: 250px; background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url('{{asset('storage/images/'.$p->product->image)}}');">
                            <div class="deal-top">
                                <h2 style="color: #27c965">Offre Intelligente.</h2>
                            </div><!-- End .deal-top -->

                            <div class="deal-content mt-n5">
                                <h4 class="product-title" style="color: #f9ad2c;"><a href="produit/{{$p->product->id}}">Economisez de l'argent sur.<strong style="color: white;">{{$p->product->nom}}</strong></a> </h4>

                                <div class="product-price ">
                                    @if($p->reduction!=0)
                                        <span class="new-price">{{$p->reduction}}</span>F CFA
                                        <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                    @else
                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                    @endif
                                </div><!-- End .product-price -->

                                <a href="produit/{{$p->product->id}}" class="btn btn-link"><span>Achetez maintenant</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .deal-content -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-md-4 -->
                @endif
                @if($key == 1)
                    <div class="col-md-6 col-lg-4">
                        <div class="deal" style="min-height: 250px; background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url('{{asset('storage/images/'.$p->product->image)}}');">
                            <div class="deal-top">
                                <h2 style="color: #27c965">Offre de temps.</h2>
                            </div><!-- End .deal-top -->

                            <div class="deal-content mt-n5">
                                <h4 class="product-title" style="color: #f9ad2c;"><a href="produit/{{$p->product->id}}"><strong style="color: white;">{{$p->product->nom}}</strong><br>Réduction de Temps -30%</a> </h4>

                                <div class="product-price ">
                                    @if($p->reduction!=0)
                                        <span class="new-price">{{$p->reduction}}</span>F CFA
                                        <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                    @else
                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                    @endif
                                </div><!-- End .product-price -->

                                <a href="produit/{{$p->product->id}}" class="btn btn-link"><span>Achetez maintenant</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .deal-content -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-md-4 -->
                @endif
                @if($key == 2)
                    <div class="col-md-6 col-lg-4">
                        <div class="deal" style="min-height: 250px; background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url('{{asset('storage/images/'.$p->product->image)}}');">
                            <div class="deal-top">
                                <h2 style="color: #27c965">Autorisation.</h2>
                            </div><!-- End .deal-top -->

                            <div class="deal-content mt-n5">
                                <h4 class="product-title" style="color: #f9ad2c;"><a href="produit/{{$p->product->id}}"><strong style="color: white;">{{$p->product->nom}}</strong><br>Economisez de l'argent</a> </h4>

                                <div class="product-price ">
                                    @if($p->reduction!=0)
                                        <span class="new-price">{{$p->reduction}}</span>F CFA
                                        <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                    @else
                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                    @endif
                                </div><!-- End .product-price -->

                                <a href="produit/{{$p->product->id}}" class="btn btn-link"><span>Achetez maintenant</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .deal-content -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-4 -->
                @endif
            @endforeach
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
                        <a href="{{route('singleProduct', ["id" => $p->id])}}">
                            <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favori</span></a>
                            <a  href="{{route('singleProduct', ["id" => $p->id])}}" class="btn-product-icon" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>
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
                            @if($p->reduction!=0)
                                <span class="new-price">{{$p->reduction}}</span>F CFA
                                <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                            @else
                                <span class="new-price">{{$p->prix}}</span>F CFA
                            @endif
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            {{-- <span class="ratings-text">( 2 Reviews )</span> --}}
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            @endforeach
            
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-1.jpg);">
            @if($banner)<img  src="storage/images/{{$banner->product->image}}"  width="300px" height="250px" alt="camera" class="cta-img">@endif
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>Achetez les offres du jour <br>géniales en toute simplicité. @if($banner)<strong> {{$banner->product->nom}} </strong>@endif </p>
                        </div><!-- End .cta-text -->
                        @if($banner)<a href="produit/{{$banner->product->id}}" class="btn btn-round" style="background-color: #f9ad2c"><span>Acheter maintenant</span><i class="icon-long-arrow-right"></i></a>@endif
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
            @foreach($offreproduits as $key=>$p)
                @if($key == 0)
                    <div class="col-lg-6 deal-col">
                        <div class="deal banner-overlay" style="min-height: 380px; background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url('{{asset('storage/images/'.$p->image)}}'); max-height:350px!important; min-width:350px!important;">
                            <div class="deal-top">
                                <h2>L'affaire du jour.</h2>
                                <h4 class="text-white">Quantités limitées. </h4>
                            </div><!-- End .deal-top -->

                            <div class="deal-content">
                                <h3 class="product-title text-white"><a href="produit/{{$p->id}}">{{str($p->description)->limit(50)}}</a></h3><!-- End .product-title -->

                                <div class="product-price">
                                    @if($p->reduction!=0)
                                        <span class="new-price">{{$p->reduction}} F CFA</span>
                                        <span class="old-price">Etait à {{$p->prix}} F CFA</span>
                                    @else
                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                    @endif
                                    
                                </div><!-- End .product-price -->

                                <a href="produit/{{$p->id}}" class="btn btn-link"><span>Achetez maintenant</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .deal-content -->

                            <div class="deal-bottom">
                                <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-bottom -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-6 -->
                @endif

                @if($key == 1)
                    <div class="col-lg-6 deal-col">
                        <div class="deal" style="min-height: 380px; background-image: linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url('{{asset('storage/images/'.$p->image)}}');max-height:350px!important; min-width:350px!important;">
                            <div class="deal-top">
                                <h2>Vos offres exclusives.</h2>
                                <h4 class="text-white">Connectez-vous pour voir des offres incroyables.</h4>
                            </div><!-- End .deal-top -->

                            <div class="deal-content">
                                <h3 class="product-title text-white"><a href="produit/{{$p->id}}">{{str($p->description)->limit(50)}}</a></h3><!-- End .product-title -->

                                <div class="product-price">
                                    @if($p->reduction!=0)
                                        <span class="new-price">{{$p->reduction}}</span>F CFA
                                        <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                    @else
                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                    @endif
                                </div><!-- End .product-price -->

                                <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn btn-link"><span>Ajouter au panier</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .deal-content -->

                            <div class="deal-bottom">
                                <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-bottom -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-6 -->
                @endif
             @endforeach
        </div><!-- End .row -->

        {{-- <div class="more-container text-center mt-1 mb-5">
            <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Shop more Outlet deals</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container --> --}}
    </div><!-- End .container -->
    @if(count($parteners) > 0)
    <div class="container">
        <hr class="mb-0">
        <h2 class=" mt-3 title text-center mb-4">Mes Partenaires</h2><!-- End .title text-center -->
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

            @foreach ($parteners as $p)
                <a href="#" class="brand">
                    <img src="storage/images/{{$p->image}}" style="height: 90px; width:200px!important;box-shadow:2px 2px 2px #ccc, -2px -2px 2px #ccc; border-radius:10px;"  alt="{{$p->nom}}">
                </a>
            @endforeach
            
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
    @endif
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
                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="row" wire:ignore.self>
                    <div class="col-xl-5col d-none d-xl-block">
                        @foreach($minipubs as $key=>$p)
                            @if($key == 2)
                                <div class="banner">
                                    @foreach($p->product->tags as $t)
                                        <span style="background-color: #f9ad2c" class="product-label label-circle label-top">{{$t->nom}}</span>
                                    @endforeach
                                    <h3 class="mt-4">{{$p->product->nom}}</h3>
                                    <a href="produit/{{$p->product->id}}">
                                        <img style="height: 260px!important;" src="storage/images/{{$p->product->image}}" alt="banner">
                                    </a>
                                </div><!-- End .banner -->
                            @endif
                        @endforeach
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
                                                    <span style="background-color: #f9ad2c;" class="product-label label-circle label-top">{{$t->nom}}</span>
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
                                                    @if($p->reduction!=0)
                                                        <span class="new-price">{{$p->reduction}}</span>F CFA
                                                        <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                                    @else
                                                        <span class="new-price">{{$p->prix}}</span>F CFA
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    {{-- <span class="ratings-text">( 4 vues )</span> --}}
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
                                    @if(count($produits) > 0)
                                        @foreach ($produits as $p)
                                            <div class="product product-2">
                                                <figure class="product-media">
                                                    @foreach($p->tags as $t)
                                                        <span style="background-color: #f9ad2c;" class="product-label label-circle label-top">{{$t->nom}}</span>
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
                                                        @if($p->reduction!=0)
                                                            <span class="new-price">{{$p->reduction}}</span>F CFA
                                                            <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                                        @else
                                                            <span class="new-price">{{$p->prix}}</span>F CFA
                                                        @endif
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        {{-- <span class="ratings-text">( 4 vues )</span> --}}
                                                    </div><!-- End .rating-container -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        @endforeach
                                    @else
                                        <h3>Aucun produit disponible ! veuillez vou connecter pour en r'ajouter</h3>
                                    @endif
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
        </div><!-- End .heading -->

        <div class="products">
            <div class="row justify-content-center">
                @if(count($produitsRec) > 0)
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
                                        @if($p->reduction!=0)
                                            <span class="new-price">{{$p->reduction}}</span>F CFA
                                            <span class="old-price ml-2">{{$p->prix}}</span>F CFA
                                        @else
                                            <span class="new-price">{{$p->prix}}</span>F CFA
                                        @endif
                                        
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        {{-- <span class="ratings-text">( 4 Reviews )</span> --}}
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                @else
                    <h3>Aucun produit disponible ! veuillez vou connecter pour en r'ajouter</h3>           
                @endif

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

    window.addEventListener('noLoggedFavori', event =>{
            iziToast.error({
            title: 'Favori',
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
