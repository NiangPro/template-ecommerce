 <div>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Bienvenue dans " Makhfuz" veuillez vous connecter ou vous inscrire</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                {{-- <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Login</li>
                                </ul> --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-4 col-md-4">
                    <div class="account_form">
                        <h3>Connexion</h3>
                        <form wire:submit.prevent="connecter">
                            <div class="default-form-box">
                                <label>Email <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Mots de passe <span>*</span></label>
                                <input type="password">
                            </div>
                            <div class="login_submit mb-4">
                                <button class="btn btn-md btn-black-default-hover mb-4 float-right" type="submit" >Se connecter</button>
                                <button style="background-color: #ff365d; color: white" class="btn btn-md mb-4 float-left" type="reset">Annuler</button>  
                                <label class="checkbox-default mb-4" for="offer">
                                    {{-- <input type="checkbox" id="offer">
                                    <span>Remember me</span> --}}
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-8 col-md-8">
                    <div class="account_form register">
                        <h3>Inscription</h3>
                        <form wire.igore wire:submit.prevent="store">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Prenom <span class="text-danger">*</span></label>
                                        <input type="text" class="@error('form1.prenom') is-invalid
                                        @enderror" placeholder="Prénom" wire:model="form1.prenom">
                                        @error('form1.prenom') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Nom <span class="text-danger">*</span></label>
                                        <input type="text" class="@error('form1.nom') is-invalid
                                        @enderror" placeholder="Nom" wire:model="form1.nom">
                                        @error('form1.nom') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Nationnalité <span class="text-danger">*</span></label>
                                        <input type="text" class="@error('form1.nationalite') is-invalid
                                        @enderror" placeholder="nationalite" wire:model="form1.nationalite">
                                        @error('form1.nationalite') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Pays <span class="text-danger">*</span></label>
                                        <input type="text" class="@error('form1.pays') is-invalid
                                        @enderror" placeholder="Pays" wire:model="form1.pays">
                                        @error('form1.pays') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Pseudo</label>
                                        <input type="text" class="@error('form1.pseudo') is-invalid
                                        @enderror" placeholder="Pseudo" wire:model="form1.pseudo">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Adresse </label>
                                        <input type="text" class="@error('form1.adresse') is-invalid
                                        @enderror" placeholder="Adresse" wire:model="form1.adresse">
                                        @error('form1.adresse') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label> Téléphone 1<span class="text-danger">*</span></label>
                                        <input type="text" class="@error('form1.tel') is-invalid
                                        @enderror" placeholder="Télephone 1" wire:model="form1.tel">
                                        @error('form1.tel') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Téléphone 2 </label>
                                        <input type="text" class="@error('form1.tel2') is-invalid
                                        @enderror" placeholder="Téléphone 2" wire:model="form1.tel2">
                                        @error('form1.tel2') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="@error('form1.email') is-invalid
                                        @enderror" placeholder="Email" wire:model="form1.email">
                                        @error('form1.email') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="default-form-box">
                                        <label>Mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" class="@error('form1.password') is-invalid
                                        @enderror" placeholder="Mot de passe" wire:model="form1.password">
                                        @error('form1.password') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>  
                                </div>
                                <div>
                                    <button style="background-color: #ff365d; color: white" class="btn btn-md mb-4 float-left" type="reset">Annuler</button>  
                                    <button class="btn btn-md btn-black-default-hover mb-4 float-right" type="submit" wire:click.prevent="store()">S'inscrire</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

</div>
