@extends('_public._slicing.main')

@section('title', 'Data Pendaftar '.$data->unique_id)

@section('content')
<section class="section" id="inner-page">
    <div class="container" id="container">
        <h3 class="title text-center">Data Anda Berhasil Di Kirim <br> <small>Silahkan menunggu konfirmasi operator</small></h3>
        <div class="col-lg-12 col-md-12 col-sm-12 card-success mt-3">
            <div class="card">
                <div class="card-body table-responsive" id="data-id">
                    <table class="table">
                        <tr>
                            <td style="border:none">No Pendaftaran / ID Pendaftaran</td>
                            <td style="border:none">{{$data->unique_id}}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>{{$data->nama_lengkap}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{$data->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>{{$data->no_hp}}</td>
                        </tr>
                        <tr>
                            <td>WhatsApp</td>
                            <td>{{$data->whatsapp}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <td>Paket Kursus</td>
                            <td>{{$data->paket->nama_paket}}</td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>{{$data->paket_kursus}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Kedatangan / Check in Asrama</td>
                            <td>{{$data->tgl_datang}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Peserta</td>
                            <td>{{$data->jumlah_peserta}}</td>
                        </tr>
                        <tr>
                            <td>Ukuran Kaos</td>
                            <td>{{$data->ukuran_kaos}}</td>
                        </tr>
                        <tr>
                            <td>Status Pendaftaran</td>
                            <td>{{$data->status}}</td>
                        </tr>
                    </table>
                    <p class="text-center noprint">Silahkan menunggu konfirmasi email dari operator INTERNATIONAL ENGLISH COMMUNITY EDU GREEN INDONESIA atau anda juga bisa menghubungi operator pada tombol WhatsApp dibawah dan melampirkan data diatas.
                        <br>
                        <a onclick="window.print()" style="color: #fff" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data</a>
                        <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif" class="btn btn-success"> <i class="fa fa-phone"></i> WhatsApp</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection