@extends('_public._slicing.main')

@section('title', 'Pencarian Agenda')

@section('content')
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2 class="section-title">Pencarian Agenda</h2>
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
                <h4>Pencarian : <strong>{{ $pencarian }}</strong></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @if(count($agenda) > 0)
                    @foreach($agenda as $row)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="news-post-thumb">
                            <div class="img informasi-img">
                                <a href="/agenda/{{$row->tema_seo}}"><img src="../storage/{{ $row->gambar }}" alt="" class="img-responsive news-img"></a>
                                <div class="text">
                                    <h4 style="text-overflow: ellipsis;overflow: hidden"><a href="/agenda/{{$row->tema_seo}}" class="text-light" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->tema }}</a></h4>
                                    <a href="" class="text-light"><i class="fa fa-list-alt"></i> {{ $row->tgl_mulai }} &nbsp; <i class="fa fa-clock-o"></i> {{$row->jam}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mb-5">
                        <h3>Pencarian tidak ditemukan</h3>
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center">{{ $agenda->links() }}</div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h4>Cari <span class="green-light-main">Agenda</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <form action="/search_agenda" method="get" class="form-search">
                    <div class="input-group">
                        <input type="text" name="q" id="q" class="form-control search_custom" placeholder="Search...">
                        <i role="button" onclick="$('#q').val('')" id="remove_search" class="fa fa-times icon position-absolute d-none" ></i>
                        <i role="button" onclick="$('.form-search').submit()" class="fa fa-search icon position-absolute" id="run_search"></i>
                    </div>
                </form>
                <br>
                <h4>Agenda <span class="green-light-main">Terbaru</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    @foreach($agenda_baru as $row)
                    <div class="news-post-thumb col-lg-12 col-md-6 col-sm-12">
                        <a href="/agenda/{{$row->tema_seo}}"><img src="../storage/{{$row->gambar}}" alt="" class="img-responsive populer-img"></a>
                        <div class="text-populer">
                            <h4 style="text-overflow: ellipsis;overflow: hidden"><a href="/agenda/{{$row->tema_seo}}" class="text-light" style="width: 70px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{ $row->tema }}</a></h4>
                            <a href="/agenda/{{$row->tema_seo}}" class="text-light"><i class="fa fa-list-alt"></i> {{ $row->tgl_mulai }} &nbsp; <i class="fa fa-clock-o"></i> {{$row->jam}} </a>
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
// if ($(window).width() < 960) {
//    alert('Less than 960');
// }
// else {
//    alert('More than 960');
// }
</script>

@endsection