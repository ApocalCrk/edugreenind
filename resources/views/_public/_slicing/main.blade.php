<!DOCTYPE html>
<html lang="id">

  <head>
    <base href="{{ $identitas->alamat_website }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $identitas->meta_deskripsi }}">
    <meta name="keywords" content="{{ $identitas->meta_keywords }}">
    <meta name="author" content="{{ $identitas->nama_instansi }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>@yield('title') | {{ $identitas->nama_web }}</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="ui_assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="ui_assets/css/font-awesome.css">
    @if($identitas->slider == 'Y')
    <link rel="stylesheet" href="ui_assets/css/slider_custom.css">
    @else
    <style>
        .welcome-area {
            background: linear-gradient(
            rgba(0, 0, 0, .60), 
            rgba(0, 0, 0, .60)
            ), url('../storage/{{ $identitas->non_slider }}');
        }
    </style>
    <link rel="stylesheet" href="ui_assets/css/main.css">
    @endif

    <link rel="shortcut icon" href="../storage/{{ $identitas->favicon }}" type="image/x-icon">
    
    <!-- jQuery -->
    <script src="ui_assets/js/jquery-2.1.0.min.js"></script>
    
    <!-- Isotope -->
    <script src="ui_assets/js/isotope.min.js"></script>

    <!-- clipboard -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    
    <script type="text/javascript">
        var width = $(window).width();
        if(width < 990){
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.FloatPosition.TOP_BOTTOM, multilanguagePage: true, autoDisplay: false}, 'google_translate_element');
            }
        }else{
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT, multilanguagePage: true, autoDisplay: false}, 'google_translate_element_desktop');
            }
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </head>
    
    <body onselectstart="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    @include('_public._slicing.navbar')
    
    @if($_SERVER['REQUEST_URI'] == '/')
        @include('_public._slicing.header')
    @endif
    
    <div id="content">
        @yield('content')
    </div>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700);
    </style>
    <!-- ***** Contact Us Start ***** -->
    <section class="section colored footer-big noprint" id="contact-us">
        <div class="container">
            <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="footer-widget">
            <div class="widget-about">
                <div class="tgnh-img">
              <img src="../storage/{{$identitas->logo}}" alt="" class="img-fluid">
                </div>
              <p class="text-center">Situs Resmi {{$identitas->nama_instansi}}<br><small>{{$identitas->alamat}}</small></p>
              <ul class="contact-details d-md-block d-none">
                <li>
                  <span class="icon-earphones"></span> <i class="fa fa-envelope"></i>
                  <a href="mail:{{$identitas->email}}" class="notranslate"> &nbsp;{{$identitas->nama_instansi}}</a>
                </li>
                <li>
                  <span class="icon-earphones"></span> <i class="fa fa-phone"></i>&nbsp;&nbsp;
                  <a href="telp:{{$identitas->telp}}"> {{$identitas->telp1}}</a>
                </li>
                <li>
                  <span class="icon-earphones"></span> <i class="fa fa-whatsapp"></i>&nbsp;&nbsp;
                  <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif"> {{$identitas->telp2}}</a>
                </li>
              </ul>
                  <style>
                    .goog-logo-link {
                      display: none;
                    }
                    #google_translate_element_desktop .skiptranslate span::after{
                      content: 'Google'
                    }
                  </style>
                <li class="d-lg-block d-md-none d-sm-none"> 
                  <a id="google_translate_element_desktop"></a>
                </li>
            </div>
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-md-4 -->
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="footer-widget">
            <div class="footer-menu footer-menu--1">
              <h4 class="footer-widget-title" style="font-weight: 300;font-family:Rubik, sans-serif">Informasi</h4>
              <ul>
                @foreach($kategori as $row)
                <li>
                  <a href="{{$row->kategori_seo}}">{{$row->nama_kategori}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- end /.footer-menu -->
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-md-3 -->

        <div class="col-lg-3 col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu">
              <h4 class="footer-widget-title" style="font-weight: 300;font-family:Rubik, sans-serif">Program Belajar</h4>
              <ul>
                @foreach($paket as $row)
                <li>
                  <a href="/paket/{{$row->paket_seo}}">{{$row->nama_paket}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- end /.footer-menu -->
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-lg-3 -->

        <div class="col-lg-3 col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title" style="font-weight: 300;font-family:Rubik, sans-serif">Pendaftaran</h4>
              <ul>
                <li>
                  <a href="/pendaftaran">Pendaftaran Online</a>
                </li>
                <li>
                  <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif">Tanya Via WhatsApp</a>
                </li>
                <li>
                  <a href="/cara-pendaftaran">Cara Pendaftaran</a>
                </li>
                <li>
                  <a href="/ask">FAQ</a>
                </li>
              </ul>
            </div>
            <!-- end /.footer-menu -->
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- Ends: .col-lg-3 -->

      </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
    
    <!-- ***** Footer Start ***** -->
    @include('_public._slicing.footer')

    <!-- Search -->
    @include('_public._slicing.search')

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Bootstrap -->
    <script src="ui_assets/js/popper.js"></script>
    <script src="ui_assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="ui_assets/js/scrollreveal.min.js"></script>
    <script src="ui_assets/js/waypoints.min.js"></script>
    <script src="ui_assets/js/jquery.counterup.min.js"></script>
    <script src="ui_assets/js/imgfix.min.js"></script> 

    <!-- Search -->
    <script src="ui_assets/js/livesearch.js"></script>
    
    <!-- Global Init -->
    <script src="ui_assets/js/custom.js"></script>
  </body>
</html>