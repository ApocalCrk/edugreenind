@extends('_admin.slicing.main')

@section('title', 'Edit Fitur Intro | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Fitur Intro</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Fitur Intro</li>
            <li class="breadcrumb-item active">Edit Fitur Intro</li>
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
                <form action="/admin/intro/{{ $intro->id }}" method="post" class="form_edit" id="edit" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $intro->judul }}">
                        @error('judul')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{$intro->deskripsi}}</textarea>
                        @error('deskripsi')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ $intro->link }}">
                        <p>*) Kosongkan jika tidak menggunakan link</p>
                        @error('link')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if($intro->gambar != null)
                        <img src="../storage/{{$intro->gambar}}" alt="" width="350">
                    @endif
                    <div class="form-group">
                        <label for="gambar">Ganti Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                            <option value="{{ $intro->aktif }}">@if($intro->aktif == 'Y') Aktif @else Non-Aktif @endif</option>
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
              <a role="button" href="/admin/intro" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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