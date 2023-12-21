<div>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('assets/images/my_account.png')}}')">
            <div class="container">
                <h1 class="page-title">Mon compte<span>Boutique</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compte Client</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul wire:ignore.self class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Commandes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Detail Compte</a>
                                </li>
                                <livewire:deconnexion />
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div wire:ignore.self class="tab-content">
                                <div wire:ignore.self class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                    <p>Bienvenue <span class="font-weight-normal text-dark">{{Auth::user()->pseudo}}</span>
                                    <br>
                                    À partir du tableau de bord de votre compte, vous pouvez consulter vos <a href="#tab-orders" class="tab-trigger-link link-underline">commandes récentes</a>, <a href="#tab-account" class="tab-trigger-link">Modifier votre mot de passe et les details de votre compte</a>.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">{{Auth::user()->prenom}} {{Auth::user()->nom}}</h3><!-- End .card-title -->

                                                    <p>
                                                        {{Auth::user()->adresse}}<br>
                                                        {{Auth::user()->tel}}<br>
                                                        {{Auth::user()->email}}<br>
                                                    <a  href="#tab-account">Modifier <i class="icon-edit"></i></a></p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body m-auto">
                                                    <div class="d-flex justify-content-center">
                                                        @if ($photo)
                                                            <img src="{{$photo->temporaryUrl()}}" alt="Responsive image" style="height: 200px; width: 200px;">
                                                        @else
                                                            @if(Auth::user()->image)
                                                                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="Votre Image" style="height: 200px; width: 200px;">            
                                                            @else
                                                                <img src="{{asset('assets/images/client.png')}}" alt="Votre Image" style="height: 200px; width: 200px;">
                                                            @endif   
                                                        @endif 
                                                    </div> 
                                                    <div class="card-footer text-center mt-n4">
                                                        <div class="mb-3">
                                                            <div class=" mt-4">
                                                                <input wire:ignore.self class="form-control" wire:model="photo" type="file" id="example-file-input">
                                                                <div wire:loading wire:target="photo">Chargement...</div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-icon icon-left btn-success" wire:click.prevent="editProfil">Changer</button>
                                                    </div> 
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div wire:ignore.self class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                    @if($etat == "show")
                                        <button  wire:click.prevent="changeType('list')" class="btn btn-info">Retour</button>
                                        <button class="btn btn-sm btn-outline-success" onclick="return printDiv()" title="Facture"><i class="la la-print"></i> Imprimer</button>
                                        @include('livewire.admin.commande.facture')
                                    @else
                                    <p>Liste des commandés</p>
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Référence</th>
                                                <th>Livraison</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($userOrders as $o)
                                                    <tr>
                                                        <td style="width: 25%">{{$o->reference}}</td>
                                                        <td>{{$o->shipping}} F CFA</td>
                                                        <td class="price-col">{{$o->total_amount}} F CFA</td>
                                                        <td>
                                                            @if($o->statut == 0)
                                                                <span class="badge bg-info">En attente</span>
                                                            @elseif($o->statut == 1)
                                                            <button class="btn btn-sm btn-outline-info" wire:click="showFacture({{$o->id}})" title="Facture"><i class="la la-print"></i></button>
                                                            @else
                                                                <span class="badge bg-danger">Rejetée</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div><!-- .End .tab-pane -->

                                <div wire:ignore.self class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                    <form wire:ignore.self>
                                        <div class="row" wire:ignore.self>
                                            <div class="col-sm-6">
                                                <label for="">Prénom <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrer le prénom" class="form-control @error('form.prenom') is-invalid @enderror" wire:model="form.prenom">
                                                @error('form.prenom') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label for="">Nom <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrer le nom" class="form-control @error('form.nom') is-invalid @enderror" wire:model="form.nom">
                                                @error('form.nom') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div class="row" wire:ignore.self>
                                            <div class="col-sm-6">
                                                <label for="">Nom utilisateur (pseudo) <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrer le nom d'utilisateur" class="form-control @error('form.pseudo') is-invalid @enderror" wire:model="form.pseudo">
                                                @error('form.pseudo') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label for="">Adresse <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrer l'adresse" class="form-control @error('form.adresse') is-invalid @enderror" wire:model="form.adresse">
                                                @error('form.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <div class="row" wire:ignore.self>
                                            <div class="col-sm-6">
                                                <label for="">Numéro téléphone 1 <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Ex: 783828282" class="form-control @error('form.tel') is-invalid @enderror" wire:model="form.tel">
                                                @error('form.tel') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label for="">Numéro téléphone 2</label>
                                                <input type="text" placeholder="Ex: 783828282" class="form-control @error('form.tel2') is-invalid @enderror" wire:model="form.tel2">
                                                @error('form.tel2') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                        <div class="row" wire:ignore.self>
                                            <div class="col-sm-6">
                                                <label for="">Pays</label>
                                                <input type="text" placeholder="Entrer le pays" class="form-control @error('form.pays') is-invalid @enderror" wire:model="form.pays">
                                                @error('form.pays') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label for="">Nationalite</label>
                                                <input type="text" placeholder="Entrer la nationalité" class="form-control @error('form.nationalite') is-invalid @enderror" wire:model="form.nationalite">
                                                @error('form.nationalite') <span class="error text-danger">{{$message}}</span> @enderror
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <button wire:ignore.self wire:click.prevent="updateClient" type="submit" class="btn btn-outline-warning">
                                            <span>Modifier</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                    <div class="card mt-4">
                                        <form >
                                            <div class="card-header mt-2">
                                                <h4>Reinitialisation du mot de passe</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="">Mot de passe actuel<span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control @error('form.current_password') is-invalid @enderror" wire:model="form.current_password" placeholder="Le mot de passe actuel">
                                                        @error('form.current_password') <span class="error text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="">Noouveau mot de passe <span class="text-danger">*</span></label>
                                                        <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password') is-invalid @enderror" wire:model="form.password">
                                                        @error('form.password') <span class="error text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="">Mot de passe de confirmation <span class="text-danger">*</span></label>
                                                        <input type="password" placeholder="Entrer le mot de passe" class="form-control @error('form.password_confirmation') is-invalid @enderror" wire:model="form.password_confirmation">
                                                        @error('form.password_confirmation') <span class="error text-danger">{{$message}}</span> @enderror
                                                    </div><!-- End .col-sm-6 -->
                                                </div>
                                                <button wire:ignore.self wire:click.prevent="editPassword" type="submit" class="btn btn-outline-warning">
                                                    <span>Modifier</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </div>
                                        </form>
                                        
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</div>

@section('js')
<script>
    window.addEventListener('updateClient', event =>{
        iziToast.success({
        title: 'Client',
        message: 'Mis à jour avec succes',
        position: 'topRight'
        });
        location.reload();
    });

    window.addEventListener('profilEditSuccessful', event =>{
            iziToast.success({
            title: 'Image Profil',
            message: 'Mis à jour avec succes',
            position: 'topRight'
            });
            location.reload();
        });

    window.addEventListener('passwordNotFound', event =>{
        iziToast.error({
        title: 'Mot de passe actuel',
        message: 'Verifiez le mot de passe actuel',
        position: 'topRight'
        });
    });

    window.addEventListener('passwordEditSuccessful', event =>{
        iziToast.success({
        title: 'Mot de passe',
        message: 'Mis à jour avec succes',
        position: 'topRight'
        });
        location.reload();
    });

    function printDiv() {
        var printContents = document.getElementById('facture').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();
    }


</script>

@endsection
