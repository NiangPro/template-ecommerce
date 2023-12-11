<footer class="footer">
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Obtenez les dernières offres</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white"> et recevez  <span class="font-weight-normal">un coupon </span> pour votre premier achat</p><!-- End .cta-desc -->
                    </div><!-- End .text-center -->
        
                    <form action="#">
                        <div class="input-group input-group-round">
                            <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><span>Soumettre</span><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about mt-n5">
                        <img src="{{asset('assets/images/smb.png')}}" class="footer-logo" alt="Footer Logo" width="200" height="25">
                    </div><!-- End .widget about-widget -->
                    <p class="mt-n5 ml-5">La solution facile. </p>

                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                       
                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Vous avez des questions ? Appelez-nous 24h/24 et 7j/7
                            <a href="tel:#">+221 77 728 37 22</a>         
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Liens utiles</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            @foreach($category as $cat)
                                <li class="item-lead">
                                    <a href="{{route('archiveProduct', ['slug' => $cat->slug, "id" => $cat->id])}}">{{$cat->nom}}</a>
                                </li> 
                            @endforeach
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Mon compte</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="#signin-modal" data-toggle="modal">S'inscrire</a></li>
                            <li><a href="{{route('cart')}}">Voir panier</a></li>
                            <li><a href="{{route('wishlist')}}">Mes favoris</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2023. Tout droits réservés.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer>