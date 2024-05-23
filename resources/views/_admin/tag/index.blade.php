@extends('_admin.slicing.main')

@section('title', 'Tag / Label | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tag / Label</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Tag / Label</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Kategori </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataTag">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tag/Label</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tag as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_tag }}</td>
                        <td>
                            <a href="/admin/tag/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/tag/{{ $row->id }}" method="post" class="d-inline form-delete">
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
          <h5 class="modal-title" id="TambahModalLabel">Tambah Tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/tag" method="post" id="form-tambah">
              @csrf
              <div class="form-group">
                  <label for="nama_tag">Nama Tag / Label</label>
                  <input type="text" name="nama_tag" id="nama_tag" placeholder="Masukkan Nama Tag/Label" class="form-control @error('nama_tag') is-invalid @enderror" value="{{ old('nama_tag') }}">
                  @error('nama_tag')
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

<script>
    $(function(){
        $('#dataTag').dataTable();
    });
</script>

@endsection