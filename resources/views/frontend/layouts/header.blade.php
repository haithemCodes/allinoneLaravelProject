<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{route('home')}}" class="logo">
                            <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{route('home')}}"
                                    class="{{Request::path() == '/' ? 'active' : ''}}">Accueille</a></li>
                            <li class="scroll-to-section"><a href="{{route('product-grids')}}"
                                    class="@if(Request::path() == 'product-grids' || Request::path() == 'product-lists')  active  @endif">Produits</a>
                            </li>
                            {{Helper::getHeaderCategory()}}
                            <li class="scroll-to-section"><a href="{{route('blog')}}"
                                    class="{{Request::path() == 'blog' ? 'active' : ''}}">Blogs</a></li>
                            <li class="scroll-to-section"><a href="{{route('about-us')}}"
                                    class="{{Request::path() == 'about-us' ? 'active' : ''}}">À propos</a></li>
                            <li class="scroll-to-section"><a href="{{route('contact')}}"
                                    class="{{Request::path() == 'contact' ? 'active' : ''}}">Contactez-nous</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>