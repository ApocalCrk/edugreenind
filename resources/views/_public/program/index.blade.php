@extends('_public._slicing.main')

@section('title', 'Paket Kursus')

@section('content')
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2 class="section-title">Informasi Program</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner-header-text">
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p> -->
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->
        <div class="row mt-3">
            <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="new-post-thumb big">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                @foreach($paket_headline as $row)
                                    @if($loop->iteration == 1)
                                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    @else
                                        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->iteration - 1 }}"></li>
                                    @endif
                                @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($paket_headline as $row)
                                    <a href="/paket/{{$row->judul_seo}}" class="carousel-item c-inf @if($loop->iteration == 1){{__('active')}}@endif">
                                        <img src="../storage/{{ $row->gambar }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption custom-caption-inf">
                                            <h5>{{ $row->nama_paket }}</h5>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <h4>Program <span class="green-light-main">Belajar</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @foreach($paket_all as $row)
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="news-post-thumb">
                            <div class="img informasi-img">
                                <a href="/paket/{{$row->paket_seo}}"><img src="../storage/{{ $row->gambar }}" alt="" class="img-responsive news-img"></a>
                                <div class="text">
                                    <h5 style="text-overflow: ellipsis;overflow: hidden"><a href="/paket/{{$row->paket_seo}}" class="text-light" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->nama_paket }}</a></h5>
                                    <a class="text-light"><i class="fa fa-money"></i> Rp. {{ number_format($row->harga) }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{{ $paket_all->links() }}</div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
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
                <h4>Berita <span class="green-light-main">Populer</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @foreach($populer as $row)
                    <div class="populer-thumb col-lg-12 col-md-6 col-sm-12">
                        <a href="/post/{{$row->judul_seo}}"><img src="../storage/{{$row->gambar}}" alt="" class="img-responsive populer-img"></a>
                        <div class="text-populer">
                            <h5 style="text-overflow: ellipsis;overflow: hidden"><a href="/post/{{$row->judul_seo}}" class="text-light" style="width: 70px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->judul }}</a></h5>
                            <a href="/kategori/{{$row->kategori->kategori_seo}}" class="text-light"><i class="fa fa-list-alt"></i> {{ $row->kategori->nama_kategori }} </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h4>Artikel Program <span class="green-light-main">Belajar</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @foreach($kategori_paket as $row)
                    <div class="populer-thumb col-lg-12 col-md-6 col-sm-12">
                        <a href="/post/{{$row->judul_seo}}"><img src="../storage/{{$row->gambar}}" alt="" class="img-responsive populer-img"></a>
                        <div class="text-populer">
                            <h5 style="text-overflow: ellipsis;overflow: hidden"><a href="/post/{{$row->judul_seo}}" class="text-light" style="width: 70px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->judul }}</a></h5>
                            <a href="/kategori/{{$row->kategori->kategori_seo}}" class="text-light"><i class="fa fa-list-alt"></i> {{ $row->kategori->nama_kategori }} </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection