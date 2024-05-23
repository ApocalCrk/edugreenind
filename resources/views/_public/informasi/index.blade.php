@extends('_public._slicing.main')

@section('title', 'Informasi')

@section('content')
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2 class="section-title">Informasi</h2>
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
                <div class="new-post-thumb big mb-3">
                    <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @foreach($headline as $row)
                                @if($loop->iteration == 1)
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->iteration - 1 }}"></li>
                                @endif
                            @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($headline as $row)
                                <a href="/post/{{$row->judul_seo}}" class="carousel-item c-inf @if($loop->iteration == 1){{__('active')}}@endif">
                                    <img src="../storage/{{ $row->gambar }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption custom-caption-inf">
                                        <h5>@if(strlen($row->judul) > 28) {{ substr($row->judul, 0, 28) }}... @else {{ $row->judul }} @endif</h5>
                                        <h6 class="d-none d-md-block">@php echo substr($row->isi_post, 0, 80) @endphp...</h6>
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
                <img src="ui_assets/images/IMG-20210625-WA0001.png" class="col-lg-12 col-md-12 col-sm-12 p-0">
                <h4 class="text-center title-keu mt-3">Keunggulan Edu Green Indonesia</h4>
                <div class="row justify-content-center d-flex mt-2 card-keu-d">
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-map-marker"></i>
                        <h6 class="text-center desktop-mov-title">Support English Area</h6>
                        <small class="text-center desktop-mov-desk">Edu Green Indonesia adalah komunitas berbahasa inggris.</small>
                    </div>
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-book"></i>
                        <h6 class="text-center desktop-mov-title">Learning Methods</h6>
                        <small class="text-center desktop-mov-desk">Teknik pengajaran fun, menarik, mudah dan efektif. Fokus kepada praktek dan penerapan.</small>
                    </div>
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-user"></i>
                        <h6 class="text-center desktop-mov-title">Professional Teachers/Coaches</h6>
                        <small class="text-center desktop-mov-desk">Memiliki team pengajar yang professional.</small>
                    </div>
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-home"></i>
                        <h6 class="text-center desktop-mov-title">Feel like homey</h6>
                        <small class="text-center desktop-mov-desk">Kedekatan dan keakraban antara peserta sangat kuat terasa seperti keluarga baru.</small>
                    </div>
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-bed"></i>
                        <h6 class="text-center desktop-mov-title">Available Full Facility</h6>
                        <small class="text-center desktop-mov-desk">Fasilitas full untuk semua kebutuhan peserta selama di Edu Green Indonesia.</small>
                    </div>
                    <div class="col-md-4 col-sm-12 card card-mobile p-3">
                        <i class="justify-content-center d-flex fa fa-check"></i>
                        <h6 class="text-center desktop-mov-title">Trusted English Course</h6>
                        <small class="text-center desktop-mov-desk">Edu Green Indonesia memiliki legalitas sebagai penyelenggara kursus bahasa inggris.</small>
                    </div>
                </div>
                <h4 class="mt-3">Berita Terbaru</h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @foreach($all_berita as $row)
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="news-post-thumb">
                            <div class="img informasi-img">
                                <a href="/post/{{$row->judul_seo}}"><img src="../storage/{{ $row->gambar }}" alt="" class="img-responsive news-img"></a>
                                <div class="text">
                                    <h5 style="text-overflow: ellipsis;overflow: hidden"><a href="/post/{{$row->judul_seo}}" class="text-light" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->judul }}</a></h5>
                                    <a href="/kategori/{{$row->kategori->kategori_seo}}" class="text-light"><i class="fa fa-list-alt"></i> {{ $row->kategori->nama_kategori }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{{ $all_berita->links() }}</div>
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
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<script>
$('#q').keyup(function() {
    $('#remove_search').removeClass('d-none');
    if($('#q').val() == ''){
        $('#remove_search').addClass('d-none');
    }
});
if ($(window).width() < 768) {
    $('.card-mobile').attr("data-scroll-reveal", "enter top move 50px over 0.6s after 0.4s");
    $('.title-keu').attr("data-scroll-reveal", "enter top move 20px over 0.5s after 0.3s");
}else{
    $('.title-keu').attr("data-scroll-reveal", "enter top move 20px over 0.5s after 0.2s");
    $('.desktop-mov-title').attr("data-scroll-reveal", "enter top move 20px over 0.5s after 0.3s")
    $('.desktop-mov-desk').attr("data-scroll-reveal", "enter top move 20px over 0.5s after 0.4s")
}
</script>

@endsection