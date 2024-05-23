@if($identitas->slider == 'Y')
 <!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">
<!-- ***** Header Text Start ***** -->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel carousel-home slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach($slider as $row)
        @if($loop->iteration == 1)
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        @else
            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->iteration - 1 }}"></li>
        @endif
      @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($slider as $row)
            <div class="carousel-item @if($loop->iteration == 1){{__('active')}}@endif">
                <img src="../storage/{{ $row->foto }}" class="d-block w-100" style="height: 250px">
                @if($row->tampilkan_keterangan == 'Y')
                <div class="carousel-caption custom-carousel-caption">
                    <h1>{{ $row->judul_slider }}</h1>
                    <p class="d-none d-md-block">{{ $row->keterangan }}</p>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" data-target="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" data-target="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->
@else
<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">
    
    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                    <h1>Selamat Datang Di <br> <strong>Edu Green Indonesia</strong></h1>
                    <p>EDU-GREEN INDONESIA is an International English Speaking Community for the millennial generation to hone their ability to speak English.</p>
                    <a href="/pendaftaran" class="main-button-slider">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->
@endif