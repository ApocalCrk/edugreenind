@extends('_admin.slicing.main')

@section('title', 'Data Pendaftar Terkonfirmasi | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pendaftar Terkonfirmasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Data Pendaftar Terkonfirmasi</li>
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
        <div class="card-header">
            <a data-target="#hapus_semuadata" data-toggle="modal" class="btn btn-danger">
                <i class="fa fa-trash"></i>
                Hapus Semua Data
            </a>
        </div>
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
                            <a class="badge badge-danger"> <i class="fa fa-lock"></i> Data Terkonfirmasi</a>
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

<div class="modal fade" id="hapus_semuadata" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Apakah anda yakin ingin menghapus semua data pendaftar!
      </div>
      <div class="modal-footer" style="display: block">
        <div class="float-left">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="float-right">
          <form action="/admin/hapus_semua_datapendaftar"id="form_update">
            <button type="submit" class="btn btn-danger">Ya, Hapus Semua Data</button>
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
    $(function(){
        $('#dataPendaftar').dataTable();
    });
</script>

@endsection