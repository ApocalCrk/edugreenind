@extends('_admin.slicing.main')

@section('title', 'Tambah Paket | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Paket</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Paket</li>
            <li class="breadcrumb-item active">Tambah Paket</li>
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
        <h4>Tambah Paket</h4>
      </div>
        <div class="card-body">
            <form action="/admin/paket" id="form-tambah" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" name="nama_paket" id="nama_paket" placeholder="Masukkan Nama Paket Kursus" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ old('nama_paket') }}">
                    @error('nama_paket')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu_paket">Periode Paket</label>
                    <input type="text" name="waktu_paket" id="waktu_paket" placeholder="Masukkan Periode Paket Kursus" class="form-control @error('waktu_paket') is-invalid @enderror" value="{{ old('waktu_paket') }}">
                    @error('waktu_paket')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga Paket</label>
                    <input type="number" min="1" name="harga" step="any" id="harga" placeholder="Masukkan Harga Paket Kursus" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                    @error('harga')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_paket">Deskripsi Paket</label>
                    <textarea id="deskripsi_paket" name="deskripsi_paket" class="@error('deskripsi_paket') is-invalid @enderror">{{old('deskripsi_paket')}}</textarea>
                    @error('deskripsi_paket')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                    @error('gambar')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keunggulan_p">Keunggulan Paket</label> &nbsp; <i onclick="add_column()" class="fa fa-plus"></i>
                    <div class="row" id="keunggulan">
                        <input type="text" name="keunggulan_p[]" id="keunggulan_p" placeholder="Masukkan Keunggulan Paket Kursus" class="form-control @error('keunggulan_p') is-invalid @enderror" value="{{ old('keunggulan_p') }}">
                    </div>
                    @error('keunggulan_p')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a role="button" href="/admin/paket" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <div class="float-right">
            <a class="btn btn-warning" onclick="$('#form-tambah').submit()"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
  tinymce.init({
    selector: '#deskripsi_paket',
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
    function add_column(){
        var input = '<input type="text" name="keunggulan_p[]" id="keunggulan_p" placeholder="Masukkan Keunggulan Paket Kursus" class="form-control @error("keunggulan_p") is-invalid @enderror mt-2 mb-2" value="{{ old("keunggulan_p") }}">';

        document.getElementById('keunggulan').innerHTML += input;
    }
</script>

@endsection