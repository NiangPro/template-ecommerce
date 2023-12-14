<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Tel: +221 77 728 37 29</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            
                            <li>
                                <a href="#" ><i class="icon-envelope"></i>makhfuzmar@gmail.com</a>
                                
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container mt-n5">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="{{route('accueil')}}" class="logo">
                    <img src="{{asset('assets/images/smb.png')}}" alt="Molla Logo" width="105" height="25">
                    {{-- <span class="display-4">Makhfuz</span> --}}
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Rechercher un produit ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="dropdown compare-dropdown"> 
                    <a href="{{route('login')}}" class="dropdown-toggle" role="button" title="Mon compte" aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>@if (Auth::user()) {{Auth::user()->pseudo}} @else Connexion @endif</p>
                    </a>

                </div><!-- End .compare-dropdown --> 

                <div class="wishlist">
                    <a href="{{route('wishlist')}}" title="Favori">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            @if(Auth()->user()) @if($favoris !=null)<span class="wishlist-count badge">{{count($favoris)}}</span>@endif @endif
                        </div>
                        <p>Favori</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="{{route('cart')}}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                           @if(Auth()->user()) <span class="cart-count">{{ count($prodsCart)}}</span> @endif
                        </div>
                        <p>Panier</p>
                    </a>

                    @if(Auth()->user())
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach($prodsCart as $c)
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="{{route('singleProduct', ["id" => $c->product->id])}}">{{$c->product->nom}}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{$c->qte}}</span>
                                        x {{$c->product->prix}} FCFA
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="{{route('singleProduct', ["id" => $c->product->id])}}" class="product-image">
                                        <img src="{{asset('storage/images/'.$c->product->image)}}" alt="product">
                                    </a>
                                </figure>
                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">{{$total}} FCFA</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{route('cart')}}" class="btn btn-primary">Voir Panier</a>
                            <a href="{{route("checkout")}}" class="btn btn-outline-primary-2"><span>Commander</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                    @endif
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdwn-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Parcourir les catégories <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul wire:ignore.self class="menu-vertical sf-arrows">
                                {{-- <li class="item-lead"><a href="#">Daily offers</a></li>
                                <li class="item-lead"><a href="#">Gift Ideas</a></li> --}}
                                {{-- {{dd($category)}} --}}
                                @foreach($category as $cat)
                                    <li class="item-lead">
                                        <a href="{{route('archiveProduct', ['slug' => $cat->slug, "id" => $cat->id])}}">{{$cat->nom}}</a>
                                        @if(count($cat->children) > 0)
                                            <ul wire:ignore.self>
                                                @foreach ($cat->children as $child)
                                                    <li><a class="item-lead" href="{{route('archiveProduct', ['slug' => $child->slug, "id" => $child->id])}}">{{$child->nom}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    
                                @endforeach
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{route('accueil')}}" >Accueil</a>
                        </li>
                        <li>
                            <a href="category.html" class="sf-with-ul">Boutique</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="menu-title">Catégorie de produit</div><!-- End .menu-title -->
                                                    <ul>
                                                        @foreach($category as $cat)
                                                            <li><a href="{{route('archiveProduct', ['slug' => $cat->slug, "id" => $cat->id])}}">{{$cat->nom}}</a>
                                                                @if(count($cat->children) > 0)
                                                                    <ul wire:ignore.self>
                                                                        @foreach ($cat->children as $child)
                                                                            <li><a href="{{route('archiveProduct', ['slug' => $child->slug, "id" => $child->id])}}">{{$child->nom}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="menu-title">Page de la boutique</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="{{route('cart')}}">Panier</a></li>
                                                        <li><a href="{{route('wishlist')}}">Favoris</a></li>
                                                        {{-- <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="dashboard.html">My Account</a></li>
                                                        <li><a href="#">Lookbook</a></li> --}}
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="banner banner-overlay">
                                            <a href="category.html" class="banner banner-menu">
                                                <img src="{{asset('assets/images/menu/banner-1.jpg')}}" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner banner-overlay -->
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">Quelques produits</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Produits ciblés</div><!-- End .menu-title -->
                                            <ul>
                                                @foreach($product as $p)
                                                    <li><a href="{{route('singleProduct', ["id" => $p->id])}}">{{$p->nom}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="{{asset('assets/images/menu/banner-2.jpg')}}" alt="Banner">

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-sm -->
                        </li>
                       
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Soldes<span class="highlight"> jusqu'à 30% de réduction</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
