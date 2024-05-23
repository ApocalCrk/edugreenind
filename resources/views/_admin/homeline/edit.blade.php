@extends('_admin.slicing.main')

@section('title', 'Edit Fitur Beranda | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Fitur Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Fitur Beranda</li>
            <li class="breadcrumb-item active">Edit Fitur Beranda</li>
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
                <form action="/admin/homeline/{{ $homeline->id }}" method="post" class="form_edit" id="edit" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $homeline->judul }}">
                        @error('judul')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ $homeline->deskripsi }}">
                        @error('deskripsi')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if($homeline->icon != null)
                        <img src="../storage/{{$homeline->icon}}" alt="" width="100">
                    @endif
                    <div class="form-group">
                        <label for="icon">Ganti Icon</label>
                        <input type="file" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror">
                        @error('icon')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                            <option value="{{ $homeline->aktif }}">@if($homeline->aktif == 'Y') Aktif @else Non-Aktif @endif</option>
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
              <a role="button" href="/admin/homeline" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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