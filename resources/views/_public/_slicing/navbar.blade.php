@if($identitas->slider == 'Y')
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky fixed-top noprint">
    <div class="row">
        <div class="col-12">
            <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="/" class="logo">
                    <img src="../storage/{{ $identitas->logo }}" alt="Edu Green Indonesia"/>
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                    @foreach($menu as $row)
                    <li><a href="{{ $row->link }}" class="@if($_SERVER['REQUEST_URI'] == $row->link) {{ __('active') }} @endif">{{ $row->nama_menu }}</a></li>
                    @endforeach
                    <li class="search__home" onclick="scrollspotlight()">
                        <a class="search_link d-none d-lg-block">
                        <svg class="site-nav__search-icon site-nav__search-icon--open" width="26" viewBox="0 0 23 22">
                            <g stroke="currentColor" stroke-width="1.5" fill="none">
                                <circle cx="9.20757329" cy="8.99160695" r="8.50646589"></circle>
                                <path d="M14.8522097,14.6362434 L20.7140392,20.4980728"></path>
                            </g>
                        </svg>
                        </a>
                    </li>
                    <li class="d-lg-none d-md-block d-sm-block">
                        <a id="google_translate_element"></a>
                    </li>
                    <style>
                        .goog-te-banner-frame.skiptranslate {
                            display: none !important;
                        } body { top: 0px !important; }
                        .goog-tooltip {
                            display: none !important;
                        }
                        .goog-tooltip:hover {
                            display: none !important;
                        }
                        .goog-text-highlight {
                            background-color: transparent !important;
                            border: none !important; 
                            box-shadow: none !important;
                        }
                        #google_translate_element .goog-te-combo {
                            border: none;
                            width: 100%;
                            text-align: center !important;
                            color: #3B566E !important;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            font-size: 13px !important;
                            margin-top: -4px!important;
                            text-align-last:center;
                            font-family: "Raleway", sans-serif;
                            font-weight: 500;
                            background-color:inherit !important;
                            letter-spacing:1;
                        }
                    </style>
                    <!-- <li class="d-sm-block d-lg-none">
                        <a href="/search?q=null">Search</a>
                    </li> -->
                    <li class="search__close">
                        <a class="close_sc">
                        <svg class="site-nav__search-icon site-nav__search-icon--close" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path fill="none" stroke="currentColor" stroke-width="1.5" d="M1 1L17 17M1 17L17 1"></path>
                        </svg>
                        </a>
                    </li>
                </ul>
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
            </nav>
        </div>
    </div>
</header>

<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $('.header-area').css('top', '20px');
            $('.header-area').addClass('container');
        } else {
            $('.header-area').css('top', '-80px');
            $('.header-area').removeClass('container');
            $('.header-area').css('top', '0px');
        }
    }
</script>
<!-- ***** Header Area End ***** -->
@else
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky noprint">
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a href="/" class="logo">
                    <img src="../storage/{{ $identitas->logo }}" alt="Edu Green Indonesia"/>
                </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                    @foreach($menu as $row)
                    <li><a href="{{ $row->link }}" class="@if($_SERVER['REQUEST_URI'] == $row->link) {{ __('active') }} @endif">{{ $row->nama_menu }}</a></li>
                    @endforeach
                    <li class="search__home" onclick="scrollspotlight()">
                        <a class="search_link d-none d-lg-block">
                            <svg class="site-nav__search-icon site-nav__search-icon--open" width="26" viewBox="0 0 23 22">
                                <g stroke="currentColor" stroke-width="1.5" fill="none">
                                    <circle cx="9.20757329" cy="8.99160695" r="8.50646589"></circle>
                                    <path d="M14.8522097,14.6362434 L20.7140392,20.4980728"></path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none d-md-block d-sm-block">
                        <a id="google_translate_element"></a>
                    </li>
                    <style>
                        .goog-te-banner-frame.skiptranslate {
                            display: none !important;
                        } body { top: 0px !important; }
                        .goog-tooltip {
                            display: none !important;
                        }
                        .goog-tooltip:hover {
                            display: none !important;
                        }
                        .goog-text-highlight {
                            background-color: transparent !important;
                            border: none !important; 
                            box-shadow: none !important;
                        }
                        #google_translate_element .goog-te-combo {
                            border: none;
                            width: 100%;
                            text-align: center !important;
                            color: #3B566E !important;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            font-size: 13px !important;
                            margin-top: -4px!important;
                        }
                    </style>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <!-- <li class="d-sm-block d-lg-none">
                        <a href="/search?q=null">Search</a>
                    </li> -->
                    <li class="search__close">
                        <a class="close_sc">
                        <svg class="site-nav__search-icon site-nav__search-icon--close" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path fill="none" stroke="currentColor" stroke-width="1.5" d="M1 1L17 17M1 17L17 1"></path>
                        </svg>
                        </a>
                    </li>
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
<!-- ***** Header Area End ***** -->
@endif
<script>
function scrollspotlight(){
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>