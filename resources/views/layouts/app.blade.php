
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SMB</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce" name="keywords">
        <meta content="eCommerce" name="description">

        <!-- Favicon -->
        <link href="{{asset('assets/images/smb.png')}}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-4.css')}}">
    @livewireStyles
    </head>

    <body>
        <div class="page-wrapper">

            @include('themes.header')
            
            <main class="main">
                {{$slot}}    
            </main><!-- End .main -->
            @include('themes.footer')
        </div><!-- End .page-wrapper -->
        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <livewire:search-mobile />

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                     <ul wire:ignore.self class="menu-vertical sf-arrows">
                                @if(count($category) > 0)
                                    @foreach($category as $cat)
                                        <li class="item-lead">
                                            <a href="{{route('archiveProduct', ['slug' => $cat->slug, "id" => $cat->id])}}">{{$cat->nom}}</a>
                                            @if(count($cat->children) > 0)
                                                <ul wire:ignore.self style="left: 15%; top:100%; float:left;
                                                z-index: 1002;">
                                                    @foreach ($cat->children as $child)
                                                        <li><a class="item-lead" href="{{route('archiveProduct', ['slug' => $child->slug, "id" => $child->id])}}">{{$child->nom}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        
                                    @endforeach
                                @else
                                    <li>Aucune catégorie </li>
                                @endif
                            </ul><!-- End .menu-vertical -->
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li> --}}
            </ul>

            <div class="social-icons mt-2">
                <a href="https://wa.me/777283722" class="social-icon" target="_blank" title="Facebook"><i class="icon-whatsapp"></i></a>
                {{-- <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a> --}}
                
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

   

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{asset('assets/images/smb.png')}}" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">Obtenez <span>25<light>%</light></span> de réduction</h2>
                            <p>Souscrivez à notre boutique pour recevoir des mises à jour opportunes de vos produits préférés.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    {{-- <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required> 
                                    <div class="input-group-append text-center">
                                        <a href="{{route('login')}}" class="btn bt-sm btn-info" type="submit"><span>S'inscrire</span></a>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            {{-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox --> 
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        @foreach($menupubs as $key=>$p)
                            @if($key == 2)
                                <a href="produit/{{$p->product->id}}"><img src="{{asset('storage/images/'.$p->product->image)}}" class="newsletter-img" alt="newsletter"></a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/iziToast.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/demos/demo-4.js')}}"></script>
        @yield("js")
        
        @livewireScripts
    </body>
</html>
