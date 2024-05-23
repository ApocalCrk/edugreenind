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
                <form action="/admin/galeri/{{ $galeri->id }}" enctype="multipart/form-data" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="judul_galeri">Judul File</label>
                        <input type="text" name="judul_galeri" id="judul_galeri" placeholder="Masukkan Judul File" class="form-control @error('judul_galeri') is-invalid @enderror" value="{{ $galeri->judul_galeri }}">
                        @error('judul_galeri')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kat">Album</label>
                        <select name="id_kat" id="id_kat" class="form-control @error('id_kat') is-invalid @enderror">
                            <option value="{{ $galeri->id_kat }}" selected>{{ $galeri->album->nama_kategori }}</option>
                            @foreach($album as $row)
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
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ $galeri->keterangan }}">
                        @error('keterangan')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <label class="radio-check">
                            <input type="radio" name="radio" id="link" value="youtube" @if(substr($galeri->file,'0', '30') == 'https://www.youtube.com/embed/') checked @endif>
                            <span>Youtube</span>
                        </label>
                        @if(substr($galeri->file,'0', '30') == 'https://www.youtube.com/embed/')
                        <iframe src="{{ $galeri->file }}" frameborder="0" id="old_v" class="@if(substr($galeri->file,'0', '30') == 'https://www.youtube.com/embed/') show @else d-none @endif"></iframe>
                        <input type="text" name="youtube" id="youtube" placeholder="Masukkan Link Youtube" class="form-control @error('youtube') is-invalid @enderror @if(substr($galeri->file,'0', '30') == 'https://www.youtube.com/embed/') show @else d-none @endif" value="{{ $galeri->file }}">
                        @else
                        <input type="text" name="youtube" id="youtube" placeholder="Masukkan Link Youtube" class="form-control @error('youtube') is-invalid @enderror d-none" value="{{ old('youtube') }}">
                        @endif
                        <label class="radio-check">
                            <input type="radio" name="radio" id="foto" value="foto" @if(substr($galeri->file,'-3') == 'jpg' or substr($galeri->file,'-3') == 'png' or substr($galeri->file,'-3') == 'mp4') checked @endif>
                            <span>Foto/File</span>
                        </label>
                        @if(substr($galeri->file,'-3') == 'jpg' || substr($galeri->file, -3) == 'png')
                        <img src="../storage/{{ $galeri->file }}" alt="galeri" id="old_f" class="@if(substr($galeri->file,'-3') == 'jpg' || substr($galeri->file, -3) == 'png') show @else d-none @endif" width="300">
                        <br>
                        <label id="ganti" class="@if(substr($galeri->file,'-3') == 'jpg' || substr($galeri->file, -3) == 'png') show @else d-none @endif">Ganti File</label>
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror @if(substr($galeri->file,'-3') == 'jpg' || substr($galeri->file, -3) == 'png') show @else d-none @endif">
                        @elseif(substr($galeri->file,'-3') == 'mp4')
                        <video src="../storage/{{ $galeri->file }}" alt="galeri" id="old_f" class="@if(substr($galeri->file,'-3') == 'mp4') show @else d-none @endif" width="300" controls></video>
                        <br>
                        <label id="ganti" class="@if(substr($galeri->file,'-3') == 'mp4') show @else d-none @endif">Ganti File</label>
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror @if(substr($galeri->file,'-3') == 'mp4') show @else d-none @endif">
                        @else
                        <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror d-none">
                        @endif
                        @error('file')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/galeri" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
              <div class="float-right">
                <a class="btn btn-warning" onclick="$('#edit').submit()"> <i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
        </div>
    </div>
  </section>
  <!-- End Main Content -->
</div>

<script>
    $(document).ready(function(){
        $("input[name='radio']").change(function() {
            if ($(this).val() == "youtube") {
                $("#youtube").removeClass('d-none');
                $("#old_v").removeClass('d-none');
                $("#youtube").prop('disabled', false);
            } else {
                $("#youtube").addClass('d-none');
                $("#old_v").addClass('d-none');
                $("#youtube").prop('disable', true);
            }
            if($(this).val() == 'foto'){
                $("#file").removeClass('d-none');
                $("#old_f").removeClass('d-none');
                $("#ganti").removeClass('d-none');
                $("#file").prop('disable', true);
            } else {
                $("#file").addClass('d-none');
                $("#old_f").addClass('d-none');
                $("#ganti").addClass('d-none');
                $("#file").prop('disabled', false);
            }
        });
    });
</script>

@endsection