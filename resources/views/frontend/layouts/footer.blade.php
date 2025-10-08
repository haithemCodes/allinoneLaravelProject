<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <img src="{{ asset('backend/img/logo2.png') }}" alt="Eurocos 501 logo">
                    </div>
                    @php
                        $settings = DB::table('settings')->get();
                    @endphp
                    <ul>
                        <li><a href="#">@foreach($settings as $data) {{$data->address}} @endforeach</a></li>
                        <li><a href="#">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
                        <li><a href="#">@foreach($settings as $data) {{$data->phone}} @endforeach</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                @php
                    $menu = App\Models\Category::getAllParentWithChild();
                @endphp
                <h4>Shopping &amp; Categories</h4>
                <ul>
                    @foreach($menu as $cat_info)
                            <li><a href="{{ route('product-grids', ['category' => $cat_info->slug]) }}">{{$cat_info->title}}</a>
                            </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Liens Utiles</h4>
                <ul>
                    <li><a href="{{route('home')}}">Accueil</a></li>
                    <li><a href="{{route('about-us')}}">À Propos</a></li>
                    <li><a href="{{route('blog')}}">blogs</a></li>
                    <li><a href="{{route('contact')}}">Contactez-nous</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Help &amp; Information</h4>
                <ul>
                    <li><a href="#">Aide</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">ID de Suivi</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2025 Eurocos . Tous droits réservés.
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