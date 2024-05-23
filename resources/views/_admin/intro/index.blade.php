@extends('_admin.slicing.main')

@section('title', 'Fitur Intro Beranda | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fitur Intro Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Fitur Intro Beranda</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Intro </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataMenu">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($intro as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->deskripsi }}</td>
                        <td>
                            <a href="/admin/intro/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/intro/{{ $row->id }}" method="post" class="d-inline form-delete{{ $row->id }}">
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
          <h5 class="modal-title" id="TambahModalLabel">Tambah Fitur Intro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/intro" method="post" id="form-tambah" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" name="judul" id="judul" placeholder="Masukkan Judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                  @error('judul')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}"></textarea>
                  @error('deskripsi')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" name="link" id="link" placeholder="Masukkan Link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}">
                  <p>*) Kosongkan jika tidak menggunakan link</p>
                  @error('link')
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
                $('.form-delete').submit();
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

@if(session('pesan_limit'))
<script>
  Swal.fire({
    'icon': 'warning',
    'title': '{{ session("pesan_limit") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

<script>
    $(function(){
        $('#dataMenu').dataTable();
    });
</script>

@endsection