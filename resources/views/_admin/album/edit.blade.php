@extends('_admin.slicing.main')

@section('title', 'Edit Album | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Album</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Album</li>
            <li class="breadcrumb-item active">Edit album</li>
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
                <form action="/admin/album/{{ $album->id }}" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="nama_kategori">Nama Album</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ $album->nama_kategori }}">
                        @error('nama_kategori')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                            <option value="{{ $album->aktif }}">@if($album->aktif == 'Y') Aktif @else Non-Aktif @endif</option>
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
              <a role="button" href="/admin/album" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
              <div class="float-right">
                <a class="btn btn-warning" onclick="$('#edit').submit()"> <i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
        </div>
    </div>
  </section>
  <!-- End Main Content -->
</div>

@endsection