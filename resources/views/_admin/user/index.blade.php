@extends('_admin.slicing.main')

@section('title', 'Manajemen User | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manajemen User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Manajemen User</li>
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
            <a data-toggle="modal" id="tambah" data-target="#TambahModal" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Pengguna </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataPengguna">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->telp }}</td>
                        <td>
                            <a href="/admin/pengguna/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/pengguna/{{ $row->id }}" method="post" class="d-inline form-delete">
                                @csrf
                                @method('delete')
                                <a style="cursor:pointer;color: #fff" onclick="delete_function()" class="badge badge-danger"> <i class="fa fa-trash"></i> Delete</a>
                            </form>
                            @if($row->id == Auth::user()->id)
                            <span class="badge badge-success"> <i class="fa fa-circle"></i> Online</span>
                            @endif
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
          <h5 class="modal-title" id="TambahModalLabel">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/admin/pengguna" method="post" enctype="multipart/form-data" id="form-tambah">
              @csrf
              <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="name" id="name" placeholder="Masukkan Nama" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                  @error('name')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                  @error('username')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="telp">No Telp</label>
                  <input type="number" name="telp" id="telp" placeholder="Masukkan No Telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}">
                  @error('telp')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                  <p>*) Kosongkan jika tidak ingin mengupload foto</p>
                  @error('foto')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror">
                  @error('password')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="level">Konfirmasi Password</label>
                  <input type="password" name="password_confirmation" id="password-confirm" placeholder="Masukkan Konfirmasi Password" class="form-control @error('password') is-invalid @enderror">
                  @error('password_confirmation')
                  <div class="invalid-tooltip">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="level">Level</label>
                  <select name="level" id="level" class="form-control @error('password') is-invalid @enderror">
                    <option value="" selected disabled>Pilih User Level</option>
                    <option value="Admin">Admin</option>
                    <option value="Publishing">Publishing</option>
                  </select>
                  @error('level')
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
        $('#dataPengguna').dataTable();
    });
</script>

@endsection