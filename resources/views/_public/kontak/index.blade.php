@extends('_public._slicing.main')

@section('title', 'Kontak')

@section('content')
<section class="section" id="inner-page">
    <div class="container" id="container">
        <!-- ***** Section Title End ***** -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h3 class="text-center title">Informasi <span class="green-light-main">Kontak</span></h3>
                <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                    <p>Silahkan menghubungi kami, kami siap memberi pelayanan terbaik untuk anda.</p>
                    <h4>Kontak <span class="green-light-main">Kami</span></h4>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="card border-eff">
                        <div class="card-body kontak-us">
                            <table class="table">
                                <tr>
                                    <td style="border: none;"> <i class="fa fa-phone"></i></td>
                                    <td style="border: none;"> {{$identitas->telp1}}</td>
                                </tr>
                                <tr>
                                    <td> <i class="fa fa-whatsapp"></i></td>
                                    <td> <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif"> {{$identitas->telp2}}</a></td>
                                </tr>
                                <tr>
                                    <td> <i class="fa fa-envelope"></i></td>
                                    <td> <a href="mailto:{{$identitas->email}}">{{$identitas->email}}</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <h4 class="mt-3">Hubungi <span class="green-light-main">WhatsApp</span></h4>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="card text-center p-2 border-wa" style="background: #1ABC9C;">
                        <a href="#" class="kontak-wa" style="color: #fff"> <i class="fa fa-whatsapp"></i> Chat Via WhatsApp</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                    <h4>Kirim <span class="green-light-main">Pesan</span></h4>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <form action="/mailto" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Alamat Email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pesan</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Pesan Anda" required></textarea>
                        </div>
                        <button class="btn btn-primary col-lg-12 col-md-12 col-sm-12"> <i class="fa fa-paper-plane"></i> Kirim Pesan</button>
                    </form>
                    <br>
                    <h4>Kantor <span class="green-light-main">Kami</span></h4>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-map-marker"></i> {{$identitas->nama_instansi}}
                        </div>
                        <div class="card-body">
                            <p> <i class="fa fa-road"></i> {{$identitas->alamat}}</p>
                            <iframe src="{{ $identitas->googlemap }}" frameborder="0" width="100%" height="200"></iframe>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a href="/cara-pendaftaran">
                            <div class="border-pdf text-center">
                                <small>PROSEDUR PENDAFTARAN ONLINE</small>
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