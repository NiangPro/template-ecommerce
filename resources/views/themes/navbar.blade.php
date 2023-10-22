<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                NiangEtsFamille@gmail.com
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                +221 78 312 36 57
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route("home")}}" class="nav-item nav-link active">Accueil</a>
                    <a href="{{route("archiveProduct")}}" class="nav-item nav-link">Produits</a>
                    <a href="{{route("singleProduct")}}" class="nav-item nav-link">Detail Produit</a>
                    <a href="{{route("cart")}}" class="nav-item nav-link">Panier</a>
                    <a href="{{route("checkout")}}" class="nav-item nav-link">Suivre ma commande</a>
                    <a href="{{route("account")}}" class="nav-item nav-link">Mon Compte</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Autres</a>
                        <div class="dropdown-menu">
                            <a href="{{route("wishlist")}}" class="dropdown-item">Souhaits</a>
                            <a href="{{route("login")}}" class="dropdown-item">Connexion</a>
                            <a href="{{route("contactus")}}" class="dropdown-item">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Compte</a>
                        <div class="dropdown-menu">
                            <a href="{{route("login")}}" class="dropdown-item">Connexion</a>
                            <a href="{{route("home")}}" class="dropdown-item">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->      

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{route("home")}}">
                        <img src="assets/img/logo.png" style="width: 200px" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="{{route("wishlist")}}" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="{{route("cart")}}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(0)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End --> 