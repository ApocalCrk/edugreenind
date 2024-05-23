@extends('_admin.slicing.main')

@section('title', 'Slider | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Slider</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Slider</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Slider </a>
            <div class="float-right">
              <a data-toggle="modal" data-target="#infoModal" role="button">
                <i class="fa fa-info-circle"></i>
              </a>
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataSlider">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Slider</th>
                        <th>Judul Slider</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slider as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="../storage/{{ $row->foto }}" width="200" alt="image">
                        </td>
                        <td>{{ $row->judul_slider }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <a href="/admin/slider/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/slider/{{ $row->id }}" method="post" class="d-inline form-delete">
                                @csrf
                                @method('delete')
                                <a style="cursor:pointer;color: #fff" onclick="delete_function()" class="badge badge-danger"> <i class="fa fa-trash"></i> Delete</a>
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
          <h5 class="modal-title" id="TambahModalLabel">Tambah Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/slider" method="post" id="form-tambah" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="judul_slider">Judul Slider</label>
                  <input type="text" name="judul_slider" id="judul_slider" placeholder="Masukkan Judul Slider" class="form-control @error('judul_slider') is-invalid @enderror" value="{{ old('judul_slider') }}">
                  @error('judul_slider')
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
                  <label for="foto">Gambar Slider</label>
                  <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                  <p>*) Dimensi slider di rekomendasikan 1920 x 1080 pixel</p>
                  @error('foto')
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

<!-- modal info -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModal">Info Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Wajib mengisikan slider jika menu slider di aktifkan!
      </div>
    </div>
  </div>
</div>
<!-- end modal info -->

<!-- Onclick Delete Function -->
<script>
    function delete_function(){
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

@if(session('pesan_slider'))
<script>
  Swal.fire({
    'icon': 'info',
    'title': '{{ session("pesan_slider") }}',
    'showConfirmButton': false,
    'timer': 1500
  });
</script>
@endif

<script>
    $(function(){
        $('#dataSlider').dataTable();
    });
</script>
@endsection