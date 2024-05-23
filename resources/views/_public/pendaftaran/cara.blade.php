@extends('_public._slicing.main')

@section('title', 'Pendaftaran')

@section('content')
<section class="section" id="inner-page">
    <div class="container" id="container">
        <!-- ***** Section Title End ***** -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h3 class="text-center cara-text-title">
                    {{$cara->judul}}
                </h3>
                <h3 class="text-center"><small>{{$cara->sub_judul}}</small></h3>
                <br>
                <div class="new-content">
                    <div class="text-main">
                        @php print_r($cara->deskripsi) @endphp
                    </div>
                </div>
                <div class="row mt-2">
                    <ul class="social-share col-lg-8 col-md-12 col-sm-12">
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Facebook"><a href="http://www.facebook.com/sharer.php?u={{$identitas->alamat_website.'/cara-pendaftaran'}}&title={{$cara->judul}}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Twitter"><a href="https://twitter.com/intent/tweet?url={{$identitas->alamat_website.'/cara-pendaftaran'}}&text={{$cara->judul}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share WhatsApp"><a href="https://api.whatsapp.com/send?text={{$cara->judul}} {{$identitas->alamat_website.'/cara-pendaftaran'}}"><i class="fa fa-phone"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Copy Link"><span role="button" class="copy-link" data-clipboard-text="{{$identitas->alamat_website.'/cara-pendaftaran'}}"><i class="fa fa-link"></i></span></li>
                    </ul>
                </div>
                <hr>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 follow">
                <div id="follow">
                <h4>Cari <span class="green-light-main">Berita</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <form action="/search" method="get" class="form-search">
                    <div class="input-group">
                        <input type="text" name="q" id="q" class="form-control search_custom" placeholder="Search..." required>
                        <i role="button" onclick="$('#q').val('')" id="remove_search" class="fa fa-times icon position-absolute d-none"></i>
                        <i role="button" onclick="$('.form-search').submit()" id="run_search" class="fa fa-search icon position-absolute"></i>
                    </div>
                    <!-- <div class="form-group">
                        <p>Pencarian Filter <i class="fa fa-angle-right"></i></p>
                    </div> -->
                </form>
                <br>
                <h4>Cara <span class="green-light-main">Pendaftaran</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-sm-12">
                        <a href="/pendaftaran">
                            <div class="border-pdf text-center">
                                <small>PENDAFTARAN ONLINE</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-sm-12 mt-3">
                        <a href="/ask">
                            <div class="border-pdf text-center">
                                <small>PERTANYAAN YANG SERING DIAJUKAN</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-sm-12 mt-3">
                        <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif">
                            <div class="border-pdf-wa text-center">
                                <small>TANYA LEWAT WHATSAPP</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
if(window.innerWidth >= 1366){
    $(window).scroll(function() { 
        var height = document.getElementById('container').clientHeight;
        var height_follow = document.getElementById('follow').clientHeight;
        if(document.documentElement.scrollTop > 80){
            $('.follow').css('margin-top', 0);
            if(document.documentElement.scrollTop < height-height_follow){
                $('.follow').css('top', $(this).scrollTop());
            }
        }   
    })
}
</script>

@endsection