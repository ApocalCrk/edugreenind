@extends('_admin.slicing.main')

@section('title', 'Edit Agenda | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Agenda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Agenda</li>
            <li class="breadcrumb-item active">Edit Agenda</li>
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
        <h4>Edit Agenda</h4>
      </div>
        <div class="card-body">
            <form action="/admin/agenda/{{ $agenda->id }}" id="form-tambah" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="tema">Tema Acara</label>
                    <input type="text" name="tema" id="tema" placeholder="Masukkan Tema Acara" class="form-control @error('tema') is-invalid @enderror" value="{{ $agenda->tema }}">
                    @error('tema')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_agenda">Isi Agenda</label>
                    <textarea id="isi_agenda" name="isi_agenda" class="@error('isi_agenda') is-invalid @enderror">{{$agenda->isi_agenda}}</textarea>
                    @error('isi_agenda')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat">Tempat Acara</label>
                    <input type="text" name="tempat" id="tempat" placeholder="Masukkan Tempat Acara" class="form-control @error('tempat') is-invalid @enderror" value="{{ $agenda->tempat }}">
                    @error('tempat')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_mulai">Tgl. Mulai</label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai" placeholder="Masukkan tgl. Mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" value="{{ $agenda->tgl_mulai }}">
                    @error('tgl_mulai')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Tgl. Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" placeholder="Masukkan Tgl. Selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{ $agenda->tgl_selesai }}">
                    @error('tgl_selesai')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam">Pukul</label>
                    <input type="time" name="jam" id="jam" placeholder="Masukkan Pukul" class="form-control @error('jam') is-invalid @enderror" value="{{ $agenda->jam }}">
                    @error('jam')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" name="pengirim" id="pengirim" placeholder="Masukkan Pengirim" class="form-control @error('pengirim') is-invalid @enderror" value="{{ $agenda->pengirim }}">
                    @error('pengirim')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <img src="../storage/{{ $agenda->gambar }}" alt="" class="d-block mb-1" width="350">
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                    <p>*) Tipe gambar harus JPG (disarankan lebar gambar 350 px).</p>
                    @error('gambar')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a role="button" href="/admin/agenda" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <div class="float-right">
            <a class="btn btn-warning" onclick="$('#form-tambah').submit()"> <i class="fa fa-upload"></i> Edit</a>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
tinymce.init({
  selector: '#isi_agenda',
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
Swal.fire({
    'icon': 'info',
    'title': '{{ session("pesan") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

@endsection