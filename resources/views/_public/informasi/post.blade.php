@extends('_public._slicing.main')

@section('title', $post->judul)

@section('content')
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">{{ $post->judul }}</h2>
            </div>
            <div class="col-lg-6">
                <div class="inner-header-text">
                    <p> <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::create($post->updated_at->toDateTimeString())->format('d F Y H:i:s') }} | Written by {{ $post->username }}</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="new-post-thumb big">
                    <div class="img">
                        <img src="../storage/{{ $post->gambar }}" alt="">
                    </div>
                    <div class="new-content">
                        <div class="text-main">
                            @php
                            print_r($post->isi_post);
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        Tags :
                        <ul class="d-inline">
                            @php 
                                $tag = explode(',', $post->tag);
                            @endphp
                            @foreach($tag as $row)
                            <a href="/tag/{{$row}}" class="custom-btn-post">#{{ $row }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <ul class="social-share col-lg-8 col-md-12 col-sm-12">
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Facebook"><a href="http://www.facebook.com/sharer.php?u={{$identitas->alamat_website.'post/'.$post->judul_seo}}&title={{$post->judul}}" onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Twitter"><a href="https://twitter.com/intent/tweet?url={{$identitas->alamat_website.'post/'.$post->judul_seo}}&text={{$post->judul}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share WhatsApp"><a href="https://api.whatsapp.com/send?text={{$post->judul}} {{$identitas->alamat_website.'post/'.$post->judul_seo}}"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Copy Link"><span role="button" class="copy-link" data-clipboard-text="{{$identitas->alamat_website.'post/'.$post->judul_seo}}"><i class="fa fa-link"></i></span></li>
                    </ul>
                </div>
                <hr>
            </div>
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
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<script>
    new ClipboardJS('.copy-link');
</script>
@endsection