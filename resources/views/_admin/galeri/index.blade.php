@extends('_admin.slicing.main')

@section('title', 'Galeri | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Galeri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Galeri</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Foto/Video </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataGaleri">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>File</th>
                        <th>Judul File</th>
                        <th>Album</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galeri as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if(substr($row->file, 0, 30) == 'https://www.youtube.com/embed/')
                                <iframe src="{{ $row->file }}" frameborder="0"></iframe>
                            @elseif(substr($row->file, -3) == 'jpg' || substr($row->file, -3) == 'png')
                                <img src="../storage/{{ $row->file }}" width="200" alt="image">
                            @elseif(substr($row->file, -3) == 'mp4')
                                <video src="../storage/{{ $row->file }}" controls width="300"></video>
                            @endif
                        </td>
                        <td>{{ $row->judul_galeri }}</td>
                        <td>{{ $row->album->nama_kategori }}</td>
                        <td>
                            <a href="/admin/galeri/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/galeri/{{ $row->id }}" method="post" class="d-inline form-delete{{ $row->id }}">
                                @csrf
                                @method('delete')
                                <a style="cursor:pointer;color: #fff" onclick="delete_function('{{ $row->id }}')" class="badge badge-danger"> <i class="fa fa-trash"></i> Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal Create -->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="TambahModalLabel">Tambah Foto/Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/galeri" method="post" id="form-tambah" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="judul_galeri">Judul Foto/Video</label>
                  <input type="text" name="judul_galeri" id="judul_galeri" placeholder="Masukkan Judul File" class="form-control @error('judul_galeri') is-invalid @enderror" value="{{ old('judul_galeri') }}">
                  @error('judul_galeri')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="id_kat">Album</label>
                  <select name="id_kat" id="id_kat" class="form-control @error('id_kat') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Album</option>
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
                  <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                  @error('keterangan')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="file">Foto/Video</label>
                <label class="radio-check">
                    <input type="radio" name="radio" id="link" value="youtube">
                    <span>Youtube</span>
                </label>
                <input type="text" name="youtube" id="youtube" placeholder="Masukkan Link Youtube" class="form-control @error('youtube') is-invalid @enderror d-none" value="{{ old('youtube') }}">
                <label class="radio-check">
                    <input type="radio" name="radio" id="foto" value="foto">
                    <span>Foto/Video</span>
                </label>
                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror d-none" value="{{ old('file') }}">
                  @error('file')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-dark dismiss" data-dismiss="modal"> <i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</button>
          </div>
      </form>
      </div>
  </div>
</div>
<!-- End Modal Create -->

<!-- Onclick Delete Function -->
<script>
    function delete_function(id){
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                $('.form-delete'+id).submit();
            }
        });
    }
</script>
<!-- End Delete Function -->

@if($errors->any())
  <script>
    $(document).ready(function() {
      $('#tambah').click();
    });
  </script>
@endif

@if(session('pesan'))
<script>
  Swal.fire({
    'icon': 'success',
    'title': '{{ session("pesan") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

@if(session('pesan_gagal'))
<script>
  Swal.fire({
    'icon': 'warning',
    'title': '{{ session("pesan_gagal") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

<script>
    $(function(){
        $('#dataGaleri').dataTable();
    });
    $(document).ready(function(){
        $("input[name='radio']").change(function() {
            if ($(this).val() == "youtube") {
                $("#youtube").removeClass('d-none');
                $("#youtube").prop('disabled', false);
            } else {
                $("#youtube").addClass('d-none');
                $("#youtube").attr('disable', 'true');
            }
            if($(this).val() == 'foto'){
                $("#file").removeClass('d-none');
                $("#file").attr('disable', 'true');
            } else {
                $("#file").addClass('d-none');
                $("#file").prop('disabled', false);
            }
        });
    });
</script>

@endsection