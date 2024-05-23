@extends('_admin.slicing.main')

@section('title', 'Edit Halaman Statis | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Halaman Statis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Halaman Statis</li>
            <li class="breadcrumb-item active">Edit Halaman</li>
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
        <h4>Edit Halaman</h4>
      </div>
        <div class="card-body">
            <form action="/admin/halamanstatis/{{ $halamanstati->id }}" method="post" id="form-tambah" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Halaman" class="form-control @error('judul') is-invalid @enderror" value="{{ $halamanstati->judul }}">
                    @error('judul')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_halaman">Isi Halaman</label>
                    <textarea id="isi_halaman" name="isi_halaman" class="@error('isi_halaman') is-invalid @enderror">{{$halamanstati->isi_halaman}}</textarea>
                    @error('isi_halaman')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <img src="../storage/{{$halamanstati->gambar}}" alt="" class="d-block mb-1" width="350">
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                    <p>*) Tipe gambar harus JPG/JPEG/PNG (disarankan lebar gambar 350 px).</p>
                    @error('gambar')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a role="button" href="/admin/halamanstatis" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <div class="float-right">
            <a class="btn btn-warning" onclick="$('#form-tambah').submit()"> <i class="fa fa-upload"></i> Upload</a>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
tinymce.init({
  selector: '#isi_halaman',
  height: 500,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullpage | ' +
    'forecolor backcolor emoticons | help',
  menu: {
    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
  },
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
$(document).ready(function(){
    $(".mul-select").select2({
        placeholder: "Pilih Tag / Label", //placeholder
        tags: true,
        tokenSeparators: ['/',',',';'," "] 
    });
})
</script>

@endsection