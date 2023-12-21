<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('storage/images/'.$shop->image)}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{$shop->sigle}}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('home')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @if(Auth()->user()->isSuperAdmin())
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Utilisateurs</div>
            </a>
            <ul>
                <li> <a href="{{route('client')}}"><i class="bx bx-right-arrow-alt"></i>Clients</a>
                </li>
                <li> <a href="{{route('admin')}}"><i class="bx bx-right-arrow-alt"></i>Admins</a>
                </li>
            </ul>
        </li>
        @endif
        <li>
            <a href="{{route('tag')}}">
                <div class="parent-icon"><i class="bx bx-tag"></i>
                </div>
                <div class="menu-title">Tags Produits</div>
            </a>
        </li>
        <li>
            <a href="{{route('category')}}">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
        </li>
        <li>
            <a href="{{route('product')}}">
                <div class="parent-icon"><i class="bx bx-shopping-bag"></i>
                </div>
                <div class="menu-title">Produits</div>
            </a>
        </li>
        <li>
            <a href="{{route('affiche')}}">
                <div class="parent-icon"><i class="bx bx-gift"></i>
                </div>
                <div class="menu-title">Publicités</div>
            </a>
        </li>
        <li>
            <a href="{{route('livraison')}}">
                <div class="parent-icon"><i class="bx bx-car"></i>
                </div>
                <div class="menu-title">Livraisons</div>
            </a>
        </li>
        <li>
            <a href="{{route('acheminement')}}">
                <div class="parent-icon"><i class="bx bx-car"></i>
                </div>
                <div class="menu-title">Mode Acheminement</div>
            </a>
        </li>
        <li>
            <a href="{{route('commentaire')}}">
                <div class="parent-icon"><i class="bx bx-comment"></i>
                </div>
                <div class="menu-title">Commentaires</div>
            </a>
        </li>
        <li>
            <a href="{{route('commande')}}">
                <div class="parent-icon"><i class="bx bx-cart"></i>
                </div>
                <div class="menu-title">Commandes</div>
            </a>
        </li>
        <li>
            <a href="{{route('partenaire')}}">
                <div class="parent-icon"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Partenaires</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Paramètres</div>
            </a>
            <ul>
                @if(Auth()->user()->isSuperAdmin())

                <li> <a href="{{route('general')}}"><i class="bx bx-right-arrow-alt"></i>Général</a>
                </li>
                @endif
                <li> <a href="{{route('profil')}}"><i class="bx bx-right-arrow-alt"></i>Profil</a>
                </li>
            </ul>
        </li>
        
        
    </ul>
</div>