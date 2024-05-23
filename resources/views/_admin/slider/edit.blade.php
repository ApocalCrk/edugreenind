@extends('_admin.slicing.main')

@section('title', 'Edit Galeri | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Galeri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Galeri</li>
            <li class="breadcrumb-item active">Edit menu</li>
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
                <form action="/admin/slider/{{ $slider->id }}" enctype="multipart/form-data" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="judul_slider">Judul Slider</label>
                        <input type="text" name="judul_slider" id="judul_slider" placeholder="Masukkan Judul Slider" class="form-control @error('judul_slider') is-invalid @enderror" value="{{ $slider->judul_slider }}">
                        @error('judul_slider')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ $slider->keterangan }}">
                        @error('keterangan')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tampilkan_keterangan">Tampilkan Keterangan</label>
                        <div class="row ml-1">
                            <label class="radio-check">
                                @if($slider->tampilkan_keterangan == 'Y')
                                <input type="radio" name="tampilkan_keterangan" class="@error('tampilkan_keterangan') is-invalid @enderror" value="Y" checked>
                                @else
                                <input type="radio" name="tampilkan_keterangan" class="@error('tampilkan_keterangan') is-invalid @enderror" value="Y">
                                @endif
                                <span>Y</span>
                            </label>
                            <label class="radio-check">
                                @if($slider->tampilkan_keterangan == 'N')
                                <input type="radio" name="tampilkan_keterangan" class="@error('tampilkan_keterangan') is-invalid @enderror" value="N" checked>
                                @else
                                <input type="radio" name="tampilkan_keterangan" class="@error('tampilkan_keterangan') is-invalid @enderror" value="N">
                                @endif
                                <span>N</span>
                            </label>
                        </div>
                        @error('tampilkan_keterangan')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Gambar Slider</label>
                        <img src="../storage/{{ $slider->foto }}" alt="" class="d-block mb-1" width="350">
                        <label for="">Ganti Slider</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $slider->foto }}">
                        @error('foto')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/slider" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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