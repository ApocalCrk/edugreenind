@extends('_admin.slicing.main')

@section('title', 'Edit Alur | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Alur</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Alur</li>
            <li class="breadcrumb-item active">Edit alur</li>
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
                <form action="/admin/alur/{{ $alur->id }}" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="nama_proses">Nama Alur</label>
                        <input type="text" name="nama_proses" id="nama_proses" class="form-control @error('nama_proses') is-invalid @enderror" value="{{ $alur->nama_proses }}">
                        @error('nama_proses')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_proses">Deskripsi Alur</label>
                        <input type="text" name="deskripsi_proses" id="deskripsi_proses" class="form-control @error('deskripsi_proses') is-invalid @enderror" value="{{ $alur->deskripsi_proses }}">
                        @error('deskripsi_proses')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="urutan_proses">Urutan Alur</label>
                        <input type="number" name="urutan_proses" id="urutan_proses" max="6" class="form-control @error('urutan_proses') is-invalid @enderror" value="{{ $alur->urutan_proses }}">
                        @error('urutan_proses')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                            <option value="{{ $alur->aktif }}">@if($alur->aktif == 'Y') Aktif @else Non-Aktif @endif</option>
                            <option value="Y">Aktif</option>
                            <option value="N">Non-Aktif</option>
                        </select>
                        @error('aktif')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/alur" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
              <div class="float-right">
                <a class="btn btn-warning" onclick="$('#edit').submit()"> <i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
        </div>
    </div>
  </section>
  <!-- End Main Content -->
</div>

@if(session('pesan_alur'))
<script>
    Swal.fire({
        'title': "{{ session('pesan_alur') }}",
        'text': "Silahkan mematikan salah satu alur terlebih dahulu",
        'icon': 'info',
        'showConfirmButton': false,
        'timer': 1500
    });
</script>
@endif

@endsection