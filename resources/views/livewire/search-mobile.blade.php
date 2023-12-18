<div>
    <form action="#" method="get" class="mobile-search">
        <label for="mobile-search" class="sr-only">Recherche</label>
        <input type="search" class="form-control" name="mobile-search"  wire:model="nom" wire:input="rechercher" id="mobile-search" placeholder="Rechercher..." required>
        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
    </form>
    @if ($nom)
    <div id="searchProduct" style="position: absolute;
    /* margin: auto; */
    top: 100px;
    left:0px;
    width: 100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    background: #F1AB34;border-radius: 15px;
    padding:20px;z-index:100;transition:2s ease-in">
            @if(count($products)<1)
            <h4 class="text-center text-white"><strong class="text-success">({{$nom}}):</strong> Aucun produit pour le moment </h4>
            @else
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class=""><h5>Liste des produits de la recheche ({{$nom}})</h5></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $c)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{route('singleProduct', ["id" => $c->id])}}">
                                        <img src="{{asset('storage/images/'.$c["image"])}}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="{{route('singleProduct', ["id" => $c->id])}}">{{$c["nom"]}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
    </div>
@endif
</div>
