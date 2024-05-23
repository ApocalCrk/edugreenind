@extends('_public._slicing.main')

@section('title', 'Beranda')

@section('content')
<!-- ***** Features Small Start ***** -->
<section class="section home-feature mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($homeline as $row)
                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="../storage/{{$row->icon}}" alt=""></i>
                            </div>
                            <h5 class="features-title">{{$row->judul}}</h5>
                            <p>{{$row->deskripsi}}</p>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Small End ***** -->

@foreach($intro as $row)
@if($loop->iteration == 1)
<!-- ***** Features Big Item Start ***** -->
<section class="section padding-top-70 padding-bottom-0" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 40px over 0.8s after 0.2s">
                <img src="../storage/{{$row->gambar}}" class="rounded img-fluid d-block mx-auto" alt="App">
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                <div class="left-heading">
                    <h2 class="section-title text-center">
                        @if($row->link != null)
                            <a href="{{$row->link}}" style="color: #1e1e1e">{{$row->judul}}</a>
                        @else
                            {{$row->judul}}
                        @endif
                    </h2>
                </div>
                <div class="left-text text-justify">
                    <p>{{$row->deskripsi}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hr"></div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->
@else
<section class="section padding-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                <div class="left-heading">
                    <h2 class="section-title">
                    @if($row->link != null)
                        <a href="{{$row->link}}" style="color: #1e1e1e">{{$row->judul}}</a>
                    @else
                        {{$row->judul}}
                    @endif
                    </h2>
                </div>
                <div class="left-text text-justify">
                    <p>{{$row->deskripsi}}</p>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 40px over 0.8s after 0.2s">
                <img src="../storage/{{$row->gambar}}" class="rounded img-fluid d-block mx-auto" alt="App">
            </div>
        </div>
    </div>
</section>
@endif
@endforeach

<!-- ***** Home Parallax Start ***** -->
<section class="mini" id="work-process">
    <div class="mini-content">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="info">
                        <h1>Alur Kegiatan Edu Green Indonesia</h1>
                        <p>Alur Edu Green Indonesia dalam melakukan Camp / Kursus Bahasa Inggris</p>
                    </div>
                </div>
            </div>

            <!-- ***** Mini Box Start ***** -->
            <div class="row d-flex justify-content-center">
                @foreach($alur as $row)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <a class="mini-box">
                        <div class="number-circle">{{$loop->iteration}}</div>
                        <strong>{{$row->nama_proses}}</strong>
                        <span>{{$row->deskripsi_proses}}</span>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- ***** Mini Box End ***** -->
        </div>
    </div>
</section>
<!-- ***** Home Parallax End ***** -->

<!-- ***** Testimonials Start ***** -->
<section class="section" id="testimonials">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Apa yang mereka katakan?</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Kesan alumni Edu Green Indonesia selama menjalani Kursus / Camp Bahasa Inggris</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            @foreach($testimoni as $row)
            <!-- ***** Testimonials Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="team-item">
                    <div class="team-content">
                        <i><img src="ui_assets/images/testimonial-icon.png" alt=""></i>
                        <p>@if(strlen($row->isi) > 200) {{ substr($row->isi, 0, 165)}}... <a data-toggle="modal" data-target="#testimonialModal{{$loop->iteration}}" style="color: #1ABC9C">Selengkapnya</a> @else {{ $row->isi }} @endif</p>
                        <div class="user-image">
                            <img src="../storage/{{$row->foto}}" width="60" height="60" alt="">
                        </div>
                        <div class="team-info">
                            <h3 class="user-name">{{ $row->nama }}</h3>
                            <span>Alumni Edu Green</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Testimonials Item End ***** -->
            <!-- Modal Testimonial -->
            <div class="modal fade" id="testimonialModal{{$loop->iteration}}" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="testimonialModalLabel" style="color: #777;">Testimonial {{$row->nama}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="color: #777;">
                         <p>@php print_r($row->isi) @endphp</p>
                        </div>
                        <div class="modal-footer" style="justify-content: left!important;">
                            <div class="user-image">
                                <img src="../storage/{{$row->foto}}" class="rounded-circle" width="60" height="60" alt="">
                            </div>
                            <div class="team-info">
                                <h5 class="user-name">{{$row->nama}}</h5>
                                <span style="color: #1ABC9C">Alumni Edu Green</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Testimonial -->
            @endforeach
        </div>
    </div>
</section>
<!-- ***** Testimonials End ***** -->

<!-- ***** Pricing Plans Start ***** -->
@if($identitas->paket_kursus == 'Y')
<section class="section colored" id="pricing-plans">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Paket Kursus</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Pilih durasi, target dan biaya sesuai kebutuhan Anda di Edu Green Indonesia. Belajar dari DASAR sampai JAGO</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            @foreach($paket as $row)
            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <h3 class="pricing-title">{{$row->nama_paket}}</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">Rp. </span>
                            <span class="price">{{number_format($row->harga)}}</span>
                            <span class="period">{{$row->waktu_paket}}</span>
                        </div>
                        <ul class="list">
                            @php
                                $keunggulan = explode(',', $row->keunggulan_paket);
                                $keunggulan = array_filter($keunggulan);
                            @endphp
                            @foreach($keunggulan as $ke)
                                <li class="active">{{$ke}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="main-button">Purchase Now</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- ***** Pricing Plans End ***** -->

<!-- ***** Counter Parallax Start ***** -->
<section class="counter">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        <strong>{{ $identitas->alumni }}</strong>
                        <span>Alumni</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-top">
                        <strong>{{ $identitas->pendaftar }}</strong>
                        <span>Pendaftar</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        <strong>{{ $identitas->pengajar }}</strong>
                        <span>Pengajar</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item">
                        <strong>{{ $identitas->lokasi }}</strong>
                        <span>Lokasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Counter Parallax End ***** -->   

<!-- ***** Blog Start ***** -->
<section class="section" id="blog">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Informasi Terkini</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Berita dan Informasi Terkini Edu Green Indonesia</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            @foreach($headline as $row)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="../storage/{{ $row->gambar }}" alt="" width="370" height="220">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="/post/{{ $row->judul_seo }}">@if(strlen($row->judul) > 28) {{ substr($row->judul, 0, 28) }}... @else {{ $row->judul }} @endif</a>
                        </h3>
                        <div class="text">
                            @php print_r(substr($row->isi_post, 0, 180)) @endphp ...
                        </div>
                        <a href="/post/{{ $row->judul_seo }}" class="main-button">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

@endsection