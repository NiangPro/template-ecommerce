    
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
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
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
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Bienvenue <span class="font-weight-normal text-dark">{{Auth::user()->pseudo}}</span>
                                <br>
                                À partir du tableau de bord de votre compte, vous pouvez consulter vos <a href="#tab-orders" class="tab-trigger-link link-underline">commandes récentes</a>, <a href="#tab-account" class="tab-trigger-link">Modifier votre mot de passe et les details de votre compte</a>.</p>
                                <p>The following addresses will be used on the checkout page by default.</p>

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
                                                @if(Auth::user()->image)
                                                    <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="Votre Image" style="height: 200px; width: 200px;">            
                                                @else
                                                    <img src="{{asset('assets/images/client.png')}}" alt="Votre Image" style="height: 200px; width: 200px;">
                                                @endif   
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>Commandes</p>
								<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Produit</th>
											<th>Prix</th>
											<th>Quantité</th>
											<th>Total</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
                                        @foreach($produits as $p)
                                            <tr>
                                                <td class="product-col" style="width: 40%">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="storage/images/{{ $p->image}}" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="#">{{$p->nom}}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">{{$p->prix}} Fcfa</td>
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity">
                                                        <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                    </div><!-- End .cart-product-quantity -->
                                                </td>
                                                <td class="total-col">{{$p->prix}} Fcfa</td>
                                                <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                            </tr>
                                        @endforeach
									</tbody>
								</table><!-- End .table table-wishlist -->
                                {{-- <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a> --}}
                                <div class="summary summary-cart">
	                				<h3 class="summary-title">Montant Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Sous total:</td>
	                							<td>150000 FCFA</td>
	                						</tr><!-- End .summary-subtotal -->
	                						{{-- <tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr> --}}

	                						{{-- <tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$0.00</td>
	                						</tr><!-- End .summary-shipping-row --> --}}

	                						{{-- <tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Standart:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>150000 FCFA</td>
	                						</tr><!-- End .summary-shipping-row --> --}}

	                						{{-- <tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Express:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$20.00</td>
	                						</tr><!-- End .summary-shipping-row --> --}}

	                						{{-- <tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate --> --}}

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>150000 FCFA</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">Paiement</a>
	                			</div><!-- End .summary -->
                            
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Display Name *</label>
                                    <input type="text" class="form-control" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required>

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->