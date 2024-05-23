@extends('_public._slicing.main')

@section('title', 'Pendaftaran')

@section('content')
<section class="section" id="inner-page">
    <div class="container" id="container">
        <!-- ***** Section Title End ***** -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h3 class="title text-center">FAQ</h3>
                @foreach($ask as $row)
                <div class="faq">
                    <div class="card mt-4 main-per" onclick="show_jawaban('{{$row->id}}')">
                        <div class="card-body p-3">
                            <div class="float-left">
                                <h5>{{$row->pertanyaan}}</h5>
                            </div>
                            <div class="float-right">
                                <i class="fa fa-plus plus{{$row->id}}" style="font-size: 18pt"></i>
                                <i class="fa fa-minus minus{{$row->id}}" style="font-size: 18pt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="jawaban jawaban{{$row->id}}">
                        <p>{{$row->jawaban}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 follow" style="margin-top: 20px!important">
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
                        <a href="/cara-pendaftaran">
                            <div class="border-pdf text-center">
                                <small>PROSEDUR PENDAFTARAN ONLINE</small>
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
        if(document.documentElement.scrollTop > 0){
            $('.follow').css('margin-top', 0);
            if(document.documentElement.scrollTop < height-height_follow){
                $('.follow').css('top', $(this).scrollTop());
            }
        }   
    })
}

$('.fa-minus').hide();
function show_jawaban(id){
    if($('.jawaban'+id).css('display') == 'none'){
        $('.jawaban'+id).fadeIn(500);
        $('.plus'+id).hide();
        $('.minus'+id).show();
        $('.jawaban').css('margin-top', '0px');
    }else{
        $('.jawaban'+id).css('display', 'none');
        $('.plus'+id).show();
        $('.minus'+id).hide();
        $('.jawaban'+id).css('margin-top', '-50px');
    }
}
</script>

@endsection