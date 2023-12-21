<div id="facture" class="">
    <div class="row">
        <div class="col-md-8">
            <img src="{{asset('storage/images/'.$shop->image)}}" alt="{{$shop->nom}}" width="100" height="100"><br>
            <strong>{{$shop->nom}}</strong> <br>
           <strong>Adresse:</strong>  {{$shop->adresse}}<br>
            <strong>Email:</strong> {{$shop->email}}<br>
            <strong>N° Téléphone:</strong> {{$shop->tel}}
        </div>
        <div class="col-md-4">
            <strong>Date:</strong>{{date("d/m/Y", strtotime($com->created_at))}}<br>
            <strong>Ref:</strong>{{$com->reference}}

            <p class="mt-5">
                <strong>Nom du client:</strong> {{$com->user->prenom}} {{$com->user->nom}}<br>
                <strong>Adresse:</strong> {{$com->user->adresse}}<br>
                <strong>N° de téléphone:</strong> {{$com->user->tel}}<br>
                <strong>E-mail:</strong> {{$com->user->email}}<br>
            </p>
        </div>
    </div>
    <div class="mt-5">
        <h5><u>Objet:</u></h5>
        <table id="example" class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Categorie</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($com->products as $p)
                <tr>
                    <td class="text-center">{{$p->nom}}</td>
                    <td><img src="storage/images/{{$p->image}}" width="50" height="50" alt="product img"></td>
                    <td class="text-center">{{$p->category->nom}}</td>
                    <td class="text-center">{{$p->pivot->quantity}}</td>
                    <td class="text-center">{{$p->pivot->price}} F CFA</td>
                    <td class="text-center">{{$p->pivot->price * $p->pivot->quantity}} F CFA</td>
                    
                </tr>
                @endforeach
             
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <table class="table table-bordered">
                    <tr>
                        <td>Montant Total Ht</td>
                        @if($com->prix_acheminement > 0)
                        <td class="text-center">{{$com->total_amount - ($com->shipping +$com->prix_acheminement*$com->products[0]->poids * $com->products[0]->pivot->quantity)}} F CFA</td>
                        @else
                        <td class="text-center">{{$com->total_amount - ($com->shipping )}} F CFA</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Montant Livraison</td>
                        <td class="text-center">{{$com->shipping}} F CFA</td>
                    </tr>
                    @if($com->prix_acheminement > 0)
                    <tr>
                        <td>Montant Acheminement</td>
                        <td class="text-center">{{$com->prix_acheminement * $com->products[0]->poids * $com->products[0]->pivot->quantity}} F CFA</td>
                    </tr>
                    @endif
                    <tr>
                        <td>Montant Total</td>
                        <td class="h5 text-success text-center">{{$com->total_amount}} F CFA</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>