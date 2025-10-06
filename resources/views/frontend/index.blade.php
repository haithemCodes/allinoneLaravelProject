<!DOCTYPE html>
<html lang="fr">

<head>
@include('frontend.layouts.head')
</head>


<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('frontend.layouts.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->

    <div class="main-banner" id="top">
        <div>
            @if(count($banners) > 0)
                <section id="Gslider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($banners as $key => $banner)
                            <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key == 0) ? 'active' : '')}}"></li>
                        @endforeach

                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($banners as $key => $banner)
                            <div class="carousel-item {{(($key == 0) ? 'active' : '')}}">
                                <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block text-left">
                                    <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                                    <p>{!! html_entity_decode($banner->description) !!}</p>
                                    <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{route('product-grids')}}"
                                        role="button">Découvrir<i class="far fa-arrow-alt-circle-right"></i></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev text-secondary" href="#Gslider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-secondary" href="#Gslider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </section>
            @endif
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Statistics Section Start ***** -->
    <section class="section statistics-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2>Notre Impact</h2>
                        <span>Découvrez les chiffres qui représentent notre engagement envers l'excellence</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="stat-number">10,000+</div>
                        <div class="stat-label">Produits Vendus</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Clients Satisfaits</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="stat-number">4.8</div>
                        <div class="stat-label">Note Moyenne</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Pays Servis</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Statistics Section End ***** -->

    <!-- ***** Product Ranges Section Start ***** -->
    <section class="section" id="product-ranges">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2>Nos Gammes de Produits</h2>
                        <span>Découvrez notre sélection complète de gammes de produits</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($product_ranges) > 0)
                    @foreach ($product_ranges as $range)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="product-range-item">
                                <div class="range-image">
                                    <a href="{{ route('product-grids', ['range' => $range->slug]) }}">
                                        @if($range->photo)
                                            <img src="{{ $range->photo }}" alt="{{ $range->title }}">
                                        @else
                                            <img src="{{ asset('frontend/images/default-product-range.jpg') }}"
                                                alt="{{ $range->title }}">
                                        @endif
                                        <div class="range-overlay">
                                            <div class="range-overlay-content">
                                                <h3>{{ $range->title }}</h3>
                                                <p>{!! $range->summary !!}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="range-content">
                                    <div class="range-button">
                                        <a href="{{ route('product-grids', ['range' => $range->slug]) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i> Voir la collection
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ***** Product Ranges Section End ***** -->

    <!-- ***** Men Area Starts ***** -->
    @php
        $allCategories = Helper::getCategoriesList();
    @endphp
    @foreach ($allCategories as $cat)
        <section class="section" id="men">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>{{ $cat->title }}</h2>
                            <span> {!! $cat->summary !!} </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="men-item-carousel">
                            <div class="owl-men-item owl-carousel">
                                @php
                                    $topProducts = Helper::getTopProductsByCategory($cat->id);  
                                @endphp
                                @foreach ($topProducts as $prod)
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="{{ $prod->photo }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>{{ $prod->title }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>En vous abonnant à notre newsletter, vous pouvez obtenir 30% de réduction</h2>
                        <span>L'attention aux détails est ce qui rend Hexashop différent des autres thèmes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Votre Nom" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Votre Adresse E-mail" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button"><i
                                            class="fa fa-paper-plane"></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Emplacement du magasin:<br><span>Sunny Isles Beach, FL 33160, États-Unis</span></li>
                                <li>Téléphone:<br><span>010-020-0340</span></li>
                                <li>Emplacement du bureau:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Heures de travail:<br><span>07:30 - 21:30 Tous les jours</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Réseaux sociaux:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a
                                            href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="frontend/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, États-Unis</a></li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Shopping Homme</a></li>
                        <li><a href="#">Shopping Femme</a></li>
                        <li><a href="#">Shopping Enfant</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Liens Utiles</h4>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">À Propos</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Contactez-nous</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Livraison</a></li>
                        <li><a href="#">ID de Suivi</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. Tous droits réservés.

                            <br>Design: <a href="https://templatemo.com" target="_parent"
                                title="modèles css gratuits">TemplateMo</a>
                        </p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('frontend/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/accordions.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/lightbox.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <script>

        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>

</body>

</html>