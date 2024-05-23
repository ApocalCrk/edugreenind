@extends('_admin.slicing.main')

@section('title', 'Profil Pimpinan | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Pimpinan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Profil Pimpinan</li>
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
        <h4>Profil Pimpinan</h4>
      </div>
        <div class="card-body">
            <form action="/admin/update_profil_pimpinan" id="form-edit" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Profil Pimpinan" class="form-control @error('judul') is-invalid @enderror" value="{{ $profil->judul }}">
                    @error('judul')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="@error('deskripsi') is-invalid @enderror">{{$profil->deskripsi}}</textarea>
                    @error('deskripsi')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <img src="../storage/{{$profil->foto}}" width="350" class="img-responsive d-block">
                    <small>*) Foto Sebelumnya</small>
                    <label for="foto" class="d-block">Ganti Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="aktif">Aktif</label>
                    <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                        <option value="{{$profil->aktif}}" selected>@if($profil->aktif == 'Y') Aktif @else Non-AKtif @endif</option>
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
            <a role="button" onclick="history.back()" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <div class="float-right">
            <a class="btn btn-warning" onclick="$('#form-edit').submit()"> <i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
tinymce.init({
  selector: '#deskripsi',
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

@if(session('pesan'))
<script>
    swal.fire({
        'icon': 'success',
        'title': '{{session("pesan")}}',
        'showConfirmButton': false,
        'timer': 1500
    });
</script>
@endif

@endsection