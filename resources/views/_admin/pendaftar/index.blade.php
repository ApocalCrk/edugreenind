@extends('_admin.slicing.main')

@section('title', 'Data Pendaftar | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pendaftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Data Pendaftar</li>
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
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataPendaftar">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>Paket Kursus</th>
                        <th>Jumlah Peserta</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftar as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_lengkap }}</td>
                        <td>{{ $row->paket->nama_paket }}</td>
                        <td>{{ $row->jumlah_peserta }}</td>
                        <td>
                            <a href="/admin/detail_data_pendaftar/{{$row->unique_id}}" class="badge badge-primary"> <i class="fa fa-eye"></i> Detail</a>
                            <a class="badge badge-warning" style="cursor: pointer" data-toggle="modal" data-target="#verifModal" data-pendaftar-id="{{$row->unique_id}}"> <i class="fa fa-paper-plane"></i> Konfirmasi Pendaftar</a>
                            <a class="badge badge-success" style="cursor: pointer" data-toggle="modal" data-target="#confirmModal" data-pendaftar-id="{{$row->unique_id}}"> <i class="fa fa-check"></i> Konfirmasi Data</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="verifModal" tabindex="-1" aria-labelledby="verifModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifModalLabel">Konfirmasi Pendaftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Silahkan memilih menu konfirmasi pendaftar di bawah
      </div>
      <div class="modal-footer" style="display: block">
        <div class="float-left">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="float-right">
        <a id="email" class="btn btn-primary"> <i class="fa fa-envelope"></i> Email</a>
        <a id="whatsapp" class="btn btn-success"> <i class="fa fa-phone" style="transform: rotate(80deg)"></i> WhatsApp</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Apakah anda yakin ingin mengkonfirmasi data pendaftar
      </div>
      <div class="modal-footer" style="display: block">
        <div class="float-left">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="float-right">
          <form method="POST" id="form_update">
            @csrf
            @method('patch')
            <button type="submit" class="btn btn-primary">Konfirmasi Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
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
    $('#verifModal').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var uniqid = $(e.relatedTarget).data('pendaftar-id');
      $.get('/admin/ajax_data_pendaftar/'+uniqid, function (data) {
          document.getElementById('email').href = 'mailto:'+data.email;
          var whatsapp = data.whatsapp;
          if(whatsapp.substring(0,2) == 08){
            var whatsapp = '+62'+whatsapp.substring(1);
          }else{
            var whatsapp = data.whatsapp;
          }
          document.getElementById('email').href = "mailto:"+data.email;
          document.getElementById('whatsapp').href = "https://api.whatsapp.com/send?phone="+whatsapp;
      })
    });
    $('#confirmModal').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var uniqid = $(e.relatedTarget).data('pendaftar-id');
      $.get('/admin/ajax_data_pendaftar/'+uniqid, function (data) {
          document.getElementById('form_update').action = "/admin/konfirmasi_data_pendaftar/"+data.id;
      })
    });
    $(function(){
        $('#dataPendaftar').dataTable();
    });
</script>

@endsection