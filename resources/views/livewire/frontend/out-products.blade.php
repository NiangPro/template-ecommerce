<div class="page-content">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            <span></span>Produit(s)
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->
                   
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">
                        @foreach($acheminements as $out)
                            @foreach($out->produits as $p)
                            
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            @foreach($p->tags as $t)
                                                <span class="product-label label-new">{{$t->nom}}</span>
                                            @endforeach
                                            <a href="{{route('singleProduct', ["id" => $p->id])}}">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action">
                                                <a href="{{route('singleProduct', ["id" => $p->id])}}" class="btn btn-product btn-cart btn"><span>Voir produit</span></a>
                                            </div>
                                        </figure>

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$p->category->nom}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{route('singleProduct', ["id" => $p->id])}}">{{ $p->nom}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                @if($p->reduction!=0)
                                                    <span class="new-price">{{$p->reduction}}F CFA</span>
                                                    <span class="old-price ml-2">{{$p->prix}}F CFA</span>
                                                @else
                                                    <span class="new-price">{{$p->prix}}F CFA</span>
                                                @endif
                                            </div><!-- End .product-price -->
                                            <div class="product-nav product-nav-thumbs">
                                                @if($p->images)
                                                    @foreach($p->images as $img)
                                                        <a href="produit/{{$p->id}}">
                                                            <img src="{{asset('storage/images/'.$img->nom)}}" alt="image galerie">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div><!-- End .product-nav -->
                                        </div>
                                    </div>
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->
                <div class="d-flex justify-content-center">
                    {{-- {{ $outproducts->produits->links() }} --}}
                </div>
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-clean">
                        <label>Filtrer:</label>
                        <a href="{{URL::Current()}}" class="sidebar-filter-clear">Annuler filtre</a>
                    </div><!-- End .widget widget-clean -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                Pays
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <form>
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($outproducts  as $out)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" wire:model="filters.pays.{{ $out->pays }}" class="custom-control-input" id="cat-{{$out->id}}">
                                                    <label class="custom-control-label" for="cat-{{$out->id}}">{{$out->pays}}</label>
                                                </div>
                                                {{-- <span class="item-count">{{count($c->produits)}}</span> --}}
                                            </div><!-- End .filter-item -->
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </form>
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div>
        <div class="mb-5"></div><!-- End .mb-5 -->
        <hr>
        <div class="container for-you">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Produit(s) acheminé(s)</h2><!-- End .title -->
                </div><!-- End .heading-left -->
            </div><!-- End .heading -->
    
            <div class="products">
                <div class="row justify-content-center">
                    @foreach($outproducts as $out)
                        @if(isset($out->produits))
                            @foreach($out->produits as $p)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            @foreach($p->tags as $t)
                                                <span style="background-color: #f9ad2c" class="product-label label-circle label-sale">{{$t->nom}}</span>
                                            @endforeach
                                            <a href="produit/{{$p->id}}">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                            </a>
        
                                            {{-- <div class="product-action-vertical">
                                                @if($this->isFavori($p->id))
                                                    <a wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-fav btn-wish" title="Ajouer au favori"><i class="icon-heart"></i></a>
                                                @else
                                                    <a wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist btn-fav" title="Ajouer au favori"></a>
                                                @endif 
                                            </div><!-- End .product-action -->--}}
        
                                            <div class="product-action">
                                                {{-- <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart" title="ajout panier"><span>Ajouter au panier</span></a> --}}
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
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach
                        @else
                            <h3>Aucun produit disponible ! veuillez vou connecter pour en r'ajouter</h3>           
                        @endif
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->
    
        
    </div><!-- End .container -->
</div><!-- End .page-content -->