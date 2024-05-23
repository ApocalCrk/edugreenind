@extends('_admin.slicing.main')

@section('title', 'Pertanyaan Yang Sering DiAjukan | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pertanyaan Yang Sering DiAjukan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Pertanyaan Yang Sering DiAjukan</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Pertanyaan </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataPertanyaan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ask as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->pertanyaan }}</td>
                        <td>{{ $row->jawaban }}</td>
                        <td>
                            <a href="/admin/ask/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/ask/{{ $row->id }}" method="post" class="d-inline form-delete{{$row->id}}">
                                @csrf
                                @method('delete')
                                <a style="cursor:pointer;color: #fff" onclick="delete_function('{{$row->id}}')" class="badge badge-danger"> <i class="fa fa-trash"></i> Delete</a>
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
          <h5 class="modal-title" id="TambahModalLabel">Tambah Pertanyaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/ask" method="post" id="form-tambah">
              @csrf
              <div class="form-group">
                  <label for="pertanyaan">Pertanyaan</label>
                  <input type="text" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ old('pertanyaan') }}">
                  @error('pertanyaan')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="jawaban">Jawaban</label>
                  <textarea class="form-control @error('jawaban') is-invalid @enderror" name="jawaban" id="jawaban" placeholder="Masukkan Jawaban">{{old('jawaban')}}</textarea>
                  @error('jawaban')
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

<script>
    $(function(){
        $('#dataPertanyaan').dataTable();
    });
</script>

@endsection