<div class="page-content">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-9">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            Showing <span>9 of 56</span> Products
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Most Rated</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                        <div class="toolbox-layout">
                            <a href="category-list.html" class="btn-layout">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="10" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="10" height="4" />
                                </svg>
                            </a>

                            <a href="category-2cols.html" class="btn-layout">
                                <svg width="10" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                </svg>
                            </a>

                            {{-- <a href="category.html" class="btn-layout">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="12" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                    <rect x="12" y="6" width="4" height="4" />
                                </svg>
                            </a>

                            <a href="category-4cols.html" class="btn-layout active">
                                <svg width="22" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="4" height="4" />
                                    <rect x="12" y="0" width="4" height="4" />
                                    <rect x="18" y="0" width="4" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="4" height="4" />
                                    <rect x="12" y="6" width="4" height="4" />
                                    <rect x="18" y="6" width="4" height="4" />
                                </svg>
                            </a> --}}
                        </div><!-- End .toolbox-layout -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">
                        @foreach($produits as $p)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">Nouveauté</span>
                                        <a href="produit/{{$p->id}}">
                                            <img src="{{asset('storage/images/'.$p->image)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span> Ajouter au favori</span></a>
                                            <a  href="{{route('singleProduct', ["id" => $p->id])}}" class="btn-product-icon btn-quickview" title="Quick view"><span>voir</span></a>
                                            {{-- <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Comparer</span></a> --}}
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" wire:click.prevent="addToCart({{$p->id}})" class="btn-product btn-cart btn"><span>Ajouter au panier</span></a>
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Tel</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="produit/{{$p->id}}">{{ $p->nom}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $p->prix}} Fcfa
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 vue )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="product desc">
                                            </a>

                                            <a href="#">
                                                <img src="{{asset('storage/images/'.$p->image)}}" alt="product desc">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach

                    </div><!-- End .row -->
                </div><!-- End .products -->


                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item-total">of 6</li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
                <div class="sidebar sidebar-shop">
                    <div class="widget widget-clean">
                        <label>Filters:</label>
                        <a href="#" class="sidebar-filter-clear">Clean All</a>
                    </div><!-- End .widget widget-clean -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                Categories
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    @foreach($category as $c)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-{{$c->id}}">
                                                <label class="custom-control-label" for="cat-{{$c->id}}">{{$c->nom}}</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->
                                    @endforeach


                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->

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

</script>

@endsection
