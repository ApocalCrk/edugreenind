@extends('_public._slicing.main')

@section('title', 'Halaman '.$statis->judul)

@section('content')
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">{{ $statis->judul }}</h2>
            </div>
            <div class="col-lg-6">
                <div class="inner-header-text">
                    <p style="font-size: 14px"> <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::create($statis->updated_at->toDateTimeString())->format('d F Y H:i:s') }} | <i class="fa fa-edit"></i> Written by Admin</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="new-post-thumb big">
                    <div class="img">
                        <img src="../storage/{{ $statis->gambar }}" alt="">
                    </div>
                    <div class="new-content">
                        <div class="text-main">
                            @php
                            print_r($statis->isi_halaman);
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="row">
                    <ul class="social-share col-lg-8 col-md-12 col-sm-12">
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Facebook"><a href="https://www.facebook.com/sharer.php?u={{$identitas->alamat_website.''.$statis->judul_seo}}" _target="blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Twitter"><a href="https://twitter.com/intent/tweet?url={{$identitas->alamat_website.''.$statis->judul_seo}}&text={{$statis->judul}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share WhatsApp"><a href="https://api.whatsapp.com/send?text={{$statis->judul}} {{$identitas->alamat_website.''.$statis->judul_seo}}"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Copy Link"><span role="button" class="copy-link" data-clipboard-text="{{$identitas->alamat_website.''.$statis->judul_seo}}"><i class="fa fa-link"></i></span></li>
                    </ul>
                </div>
                <hr>
            </div>
            @if($statis->judul_seo != 'profil')
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h3>Post Terbaru</h3>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="new-post-thumb">
                        <div class="img">
                            <img src="../storage/{{ $post_terbaru->gambar }}" class="row col-lg-12 col-md-12 col-sm-12" alt="">
                        </div>
                        <div class="new-content">
                            <h3>
                                <a href="{{ $post_terbaru->judul_seo }}">{{ $post_terbaru->judul }}</a>
                            </h3>
                            <div class="text">
                                @php
                                    print_r(substr($post_terbaru->isi_post, 0, 170))
                                @endphp
                                ...
                            </div>
                            <a href="/post/{{ $post_terbaru->judul_seo }}" class="main-button col-lg-8 col-md-12 col-sm-12 text-center">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @elseif($profil->aktif == 'Y')
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h3>Profil Pimpinan</h3>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="new-post-thumb">
                        <div class="img">
                            <img src="../storage/{{$profil->foto}}" class="row col-lg-12 col-md-12 col-sm-12" alt="">
                        </div>
                        <div class="new-content">
                            <h4 class="text-center mb-3">
                                {{$profil->judul}}
                            </h4>
                            <div class="text-main text-justify">
                                @php print_r($profil->deskripsi) @endphp
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-lg-4 col-md-12 col-sm-12">
                    <h3>Post Terbaru</h3>
                    <hr class="custom-hr">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <hr class="custom-hr-point">
                    <div class="new-post-thumb">
                        <div class="img">
                            <img src="../storage/{{ $post_terbaru->gambar }}" class="row col-lg-12 col-md-12 col-sm-12" alt="">
                        </div>
                        <div class="new-content">
                            <h3>
                                <a href="{{ $post_terbaru->judul_seo }}">{{ $post_terbaru->judul }}</a>
                            </h3>
                            <div class="text">
                                @php
                                    print_r(substr($post_terbaru->isi_post, 0, 170))
                                @endphp
                                ...
                            </div>
                            <a href="/post/{{ $post_terbaru->judul_seo }}" class="main-button col-lg-8 col-md-12 col-sm-12 text-center">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<script>
    new ClipboardJS('.copy-link');
</script>
@endsection