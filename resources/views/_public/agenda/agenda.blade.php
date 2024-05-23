@extends('_public._slicing.main')

@section('title', 'Agenda '.$agenda_page->tema)

@section('content')
<!-- ***** Inner Page Start ***** -->
<section class="section" id="inner-page">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">{{ $agenda_page->tema }}</h2>
            </div>
            <div class="col-lg-6">
                <div class="inner-header-text">
                    <p> <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::create($agenda_page->updated_at->toDateTimeString())->format('d F Y H:i:s') }} | Written by {{ $agenda_page->pengirim }}</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="new-post-thumb big">
                    <div class="img">
                        <img src="../storage/{{ $agenda_page->gambar }}" alt="">
                    </div>
                    <div class="new-content">
                        <div class="text-main">
                            <table class="table">
                                <tr style="font-weight: bold">
                                    <td style="border: none">Kegiatan : </td><td style="border: none">{{$agenda_page->tema}}</td>
                                </tr>
                                <tr style="font-weight: bold">
                                    <td style="border: none">Tempat : </td><td style="border: none">{{$agenda_page->tempat}}</td>
                                </tr>
                                <tr style="font-weight: bold">
                                    <td style="border: none">Tanggal Mulai : </td><td style="border: none">{{\Carbon\Carbon::create($agenda_page->tgl_mulai)->format
                                    ('d F Y')}}</td>
                                </tr>
                                <tr style="font-weight: bold">
                                    <td style="border: none">Tanggal Selesai : </td><td style="border: none">{{\Carbon\Carbon::create($agenda_page->tgl_mulai)->format
                                    ('d F Y')}}</td>
                                </tr>
                                <tr style="font-weight: bold">
                                    <td style="border: none">Pukul : </td><td style="border: none">{{$agenda_page->jam}}</td>
                                </tr>
                            </table>
                            <b>Deskripsi Kegiatan</b>
                            @php
                            print_r($agenda_page->isi_agenda);
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="row">
                    <ul class="social-share col-lg-8 col-md-12 col-sm-12">
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Facebook"><a href="https://www.facebook.com/sharer.php?u={{$identitas->alamat_website.'post/'.$agenda_page->judul_seo}}" _target="blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share Twitter"><a href="https://twitter.com/intent/tweet?url={{$identitas->alamat_website.'post/'.$agenda_page->judul_seo}}&text={{$agenda_page->judul}}"><i class="fa fa-twitter"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Share WhatsApp"><a href="https://api.whatsapp.com/send?text={{$agenda_page->tema}} {{$identitas->alamat_website.'agenda/'.$agenda_page->tema}}"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="d-inline-block" data-toggle="tooltip" data-placement="top" title="Copy Link"><span role="button" class="copy-link" data-clipboard-text="{{$identitas->alamat_website.'post/'.$agenda_page->judul_seo}}"><i class="fa fa-link"></i></span></li>
                    </ul>
                </div>
                <hr>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <h3>Agenda Terbaru</h3>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="new-post-thumb">
                    <div class="img">
                        <img src="../storage/{{ $agenda_baru->gambar }}" class="row col-lg-12 col-md-12 col-sm-12" alt="">
                    </div>
                    <div class="new-content">
                        <h3>
                            <a href="{{ $agenda_baru->judul_seo }}">{{ $agenda_baru->tema }}</a>
                        </h3>
                        <div class="text">
                            @php
                                print_r(substr($agenda_baru->isi_agenda, 0, 170))
                            @endphp
                            ...
                        </div>
                        <a href="/post/{{ $agenda_baru->judul_seo }}" class="main-button col-lg-8 col-md-12 col-sm-12 text-center">Baca Selengkapnya</a>
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