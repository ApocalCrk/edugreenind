@extends('_admin.slicing.main')

@section('title', 'Tambah Post | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Post</li>
            <li class="breadcrumb-item active">Tambah Post</li>
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
        <h4>Tambah Post</h4>
      </div>
        <div class="card-body">
            <form action="/admin/post" id="form-tambah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Post" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                    @error('judul')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_kat">Kategori</label>
                    <select name="id_kat" id="id_kat" class="form-control @error('id_kat') is-invalid @enderror">
                        <option value="" selected disabled>Pilih Kategori Post</option>
                        @foreach($kategori as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kat')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="headline">Headline</label>
                    <div class="row ml-1">
                        <label class="radio-check">
                            @if(old('headline') == 'Y')
                            <input type="radio" name="headline" id="headline" class="@error('headline') is-invalid @enderror" value="Y" checked>
                            @else
                            <input type="radio" name="headline" id="headline" class="@error('headline') is-invalid @enderror" value="Y">
                            @endif
                            <span>Y</span>
                        </label>
                        <label class="radio-check">
                            @if(old('publish') == 'Y')
                            <input type="radio" name="headline" id="headline" class="@error('headline') is-invalid @enderror" value="N" checked>
                            @else
                            <input type="radio" name="headline" id="headline" class="@error('headline') is-invalid @enderror" value="N">
                            @endif
                            <span>N</span>
                        </label>
                    </div>
                    <p class="ml-1">*) Apabila post akan dijadikan Headline, pilih Y (disarankan post headline disertai gambar)
                    @error('headline')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    </p>
                </div>
                <div class="form-group">
                    <label for="publish">Publish</label>
                    <div class="row ml-1">
                        <label class="radio-check">
                            @if(old('publish') == 'Y')
                            <input type="radio" name="publish" class="@error('publish') is-invalid @enderror" value="Y" checked>
                            @else
                            <input type="radio" name="publish" class="@error('publish') is-invalid @enderror" value="Y">
                            @endif
                            <span>Y</span>
                        </label>
                        <label class="radio-check">
                            @if(old('publish') == 'N')
                            <input type="radio" name="publish" class="@error('publish') is-invalid @enderror" value="N" checked>
                            @else
                            <input type="radio" name="publish" class="@error('publish') is-invalid @enderror" value="N">
                            @endif
                            <span>N</span>
                        </label>
                    </div>
                    @error('publish')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_post">Isi Post</label>
                    <textarea id="isi_post" name="isi_post" class="@error('isi_post') is-invalid @enderror">{{old('isi_post')}}</textarea>
                    @error('isi_post')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                    <p>*) Tipe gambar harus JPG (disarankan lebar gambar 350 px).</p>
                    @error('gambar')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag">Tag / Label</label>
                    <style>
                        .select2-container--default .select2-selection--multiple .select2-selection__choice {
                            color: #000!important;
                        }
                    </style>
                    <select class="mul-select form-control" name="tag[]" multiple="true">
                        @foreach($tag as $row)
                        <option value="{{ $row->nama_tag }}" style="color: #000">{{ $row->nama_tag }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a role="button" href="/admin/post" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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
  selector: '#isi_post',
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

@if(session('pesan_headline'))
<script>
Swal.fire({
    'icon': 'warning',
    'title': "{{session('pesan_headline')}}",
    'showConfirmButton': false,
    'timer': 1500,
})
</script>
@endif

@endsection