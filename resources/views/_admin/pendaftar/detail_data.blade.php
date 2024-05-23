@extends('_admin.slicing.main')

@section('title', 'Detail Pendaftar | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pendaftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item">Data Pendaftar</li>
            <li class="breadcrumb-item active">Detail Pendaftar</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <h5 class="card-header">No Pendaftaran : <b>{{$pendaftar->unique_id}}</b></h5>
        <div class="card-body">
          <table class="table">
            <tr>
                <td style="border: none">Nama Lengkap</td>
                <td style="border: none">{{$pendaftar->nama_lengkap}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{$pendaftar->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>{{$pendaftar->no_hp}}</td>
            </tr>
            <tr>
                <td>WhatsApp</td>
                <td><a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif">{{$pendaftar->whatsapp}}</a></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><a href="mailto:{{$pendaftar->email}}">{{$pendaftar->email}}</a></td>
            </tr>
            <tr>
                <td>Paket Kursus</td>
                <td>{{$pendaftar->paket->nama_paket}}</td>
            </tr>
            <tr>
                <td>Periode</td>
                <td>{{$pendaftar->periode}}</td>
            </tr>
            <tr>
                <td>Tanggal Kedatangan / Check in Asrama</td>
                <td>{{$pendaftar->tgl_datang}}</td>
            </tr>
            <tr>
                <td>Jumlah Peserta</td>
                <td>{{$pendaftar->jumlah_peserta}}</td>
            </tr>
            <tr>
                <td>Ukuran Kaos</td>
                <td>{{$pendaftar->ukuran_kaos}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$pendaftar->status}}</td>
            </tr>
          </table>
        </div>
        <div class="card-footer no-print">
            <div class="float-left">
                <a onclick="history.back()" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            </div>
            <div class="float-right">
                <a onclick="window.print()" class="btn btn-warning"> <i class="fa fa-print"></i> Cetak Data</a>
                <a href="mailto:{{$pendaftar->email}}" class="btn btn-primary"> <i class="fa fa-envelope"></i> Email</a>
                <a href="https://api.whatsapp.com/send?phone=@if(substr($pendaftar->whatsapp, 0, 2) == '08')+62{{substr($pendaftar->whatsapp, 1)}}@else{{$pendaftar->whatsapp}}@endif" class="btn btn-success"> <i class="fa fa-phone" style="transform: rotate(80deg)"></i> WhatsApp</a>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

@if(session('pesan'))
<script>
  Swal.fire({
    'icon': 'success',
    'title': '{{ session("pesan") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

<script>
    $(function(){
        $('#dataPendaftar').dataTable();
    });
</script>

@endsection