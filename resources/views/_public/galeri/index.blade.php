@extends('_public._slicing.main')

@section('title', 'Galeri')

@section('content')
<link rel="stylesheet" href="ui_assets/owl/assets/owl.carousel.min.css">
<link rel="stylesheet" href="ui_assets/owl/assets/owl.theme.default.min.css">
<link href="ui_assets/venobox/venobox.css" rel="stylesheet">
<script src="ui_assets/owl/owl.carousel.min.js"></script>
<script src="ui_assets/venobox/venobox.min.js"></script>
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2 class="section-title">Galeri</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner-header-text">
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p> -->
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->
        <div class="owl-carousel owl-theme mb-2 mt-3" id="galeri-flters">
            <div data-filter="*" class="custom-btn filter-active item text-center">All</div>
            <div data-filter=".video" class="custom-btn item text-center">Video</div>
            @foreach($album as $row)
                <div data-filter=".{{$row->id}}" class="custom-btn item text-center">{{$row->nama_kategori}}</div>
            @endforeach
        </div>
        <div class="row galeri-container">
            @foreach($galeri as $row)
            <div class="col-lg-4 col-md-8 col-sm-12 portofolio-item {{$row->id_kat}} @if(substr($row->file,'0', '30') == 'https://www.youtube.com/embed/' or substr($row->file,'-3') == 'mp4') video @endif">
                <div class="news-post-thumb">
                    <div class="img galeri">
                        @if(substr($row->file,'0', '30') == 'https://www.youtube.com/embed/')
                            <iframe src="{{ $row->file }}" class="img-responsive galeri-img" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen frameborder="0" style="top:0!important"></iframe>
                            <div class="galeri-info" style="bottom: 71px">
                                <h4>{{ $row->judul_galeri }}</h4>
                                <p>{{ $row->keterangan }}</p>
                                <a href="{{ $row->file }}" class="venobox preview-link" data-gall="portfolioGallery" title="{{ $row->judul_galeri }}" data-vbtype="video"><i class="fa fa-eye"></i></a>
                            </div>
                        @elseif(substr($row->file,'-3') == 'jpg' || substr($row->file, -3) == 'png')
                            <img src="../storage/{{ $row->file }}" class="img-responsive galeri-img">
                            <div class="galeri-info">
                                <h4>{{ $row->judul_galeri }}</h4>
                                <p>{{ $row->keterangan }}</p>
                                <a href="../storage/{{ $row->file }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$row->judul_galeri}}"><i class="fa fa-eye"></i></a>
                            </div>
                        @elseif(substr($row->file,'-3') == 'mp4')
                            <video src="../storage/{{ $row->file }}" class="img-responsive galeri-img" controls></video>
                            <div class="galeri-info" style="bottom: 71px">
                                <h4>{{ $row->judul_galeri }}</h4>
                                <p>{{ $row->keterangan }}</p>
                                <a href="../storage/{{ $row->file }}" class="venobox preview-link" data-gall="portfolioGallery" title="{{ $row->judul_galeri }}" data-vbtype="iframe"><i class="fa fa-eye"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            {{ $galeri->links() }}
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<script>
  $(window).on('load', function() {
    var portfolioIsotope = $('.galeri-container').isotope({
      itemSelector: '.portofolio-item'
    });

    $('#galeri-flters .item').on('click', function() {
      $("#galeri-flters .item").removeClass('filter-active');
      $(this).addClass('filter-active');

      portfolioIsotope.isotope({
        filter: $(this).data('filter')
      });
    });
    $(document).ready(function() {
      $('.venobox').venobox({ 
        'share': ['facebook', 'twitter', 'download']
      });
    });
  });

$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection