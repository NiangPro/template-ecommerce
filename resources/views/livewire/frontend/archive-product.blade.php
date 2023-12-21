<div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <span>{{count($produits)}}</span>Produit(s)
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                       
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($produits as $p)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            @foreach($p->tags as $t)
                                                <span class="product-label label-new">{{$t->nom}}</span>
                                            @endforeach
                                            <a href="{{route('singleProduct', ["id" => $p->id])}}">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                @if($this->isFavori($p->id))
                                                    <a href="#" wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-fav btn-wish btn-expandable"><i class="icon-heart"></i><span>ajouter au favori</span></a>    
                                                @else
                                                    <a href="#" wire:click.prevent="addToWishlist({{$p->id}})" class="btn-product-icon btn-wishlist btn-fav btn-expandable" title="Ajouer au favori"><span>ajouter au favori</span></a>
                                                @endif
                                                <a  href="{{route('singleProduct', ["id" => $p->id])}}" class="btn-product-icon" title="voir plus"><i class="la la-eye"></i><span>Voir plus</span></a>
                                                {{-- <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Comparer</span></a> --}}
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <button wire:click.prevent="addToCart({{$p->id}})" class="btn btn-product btn-cart btn"><span>Ajouter au panier</span></button>
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

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="d-flex justify-content-center">
                        {{ $produits->links() }}
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
                                    Categories
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <form>
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @foreach($category as $c)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" wire:model="filters.categories.{{ $c->id }}" class="custom-control-input" id="cat-{{$c->id}}">
                                                        <label class="custom-control-label" for="cat-{{$c->id}}">{{$c->nom}}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{count($c->produits)}}</span>
                                                </div><!-- End .filter-item -->
                                            @endforeach


                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </form>
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>
@section('js')
    <script>
        window.addEventListener('productAdded', event =>{
            iziToast.success({
            title: 'Produit',
            message: 'Produit ajouté avec succès',
            position: 'topRight'
            });

        });

        window.addEventListener('noLogged', event =>{
            iziToast.error({
            title: 'Panier',
            message: 'Veuillez d\'abord se connecter',
            position: 'topRight'
            });
        });

        window.addEventListener('existProduct', event =>{
            iziToast.error({
            title: 'Panier',
            message: 'Ce produit existe déja dans le panier',
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

        });

        window.addEventListener('existFavori', event =>{
            iziToast.error({
            title: 'Favori',
            message: 'Ce favori existe déja dans la liste',
            position: 'topRight'
            });

        });

    </script>
@endsection
