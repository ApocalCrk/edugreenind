@extends('_admin.slicing.main')

@section('title', 'Edit User | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Manajemen User</li>
            <li class="breadcrumb-item active">Edit User</li>
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
                <form action="/admin/pengguna/{{ $pengguna->id }}" method="post" class="form_edit" id="edit" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $pengguna->name }}">
                        @error('name')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $pengguna->username }}">
                        @error('username')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $pengguna->email }}">
                        @error('email')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ $pengguna->telp }}">
                        @error('telp')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control @error('password') is-invalid @enderror">
                          <option value="{{$pengguna->level}}">{{$pengguna->level}}</option>
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
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Foto</label>
                        <div class="d-flex justify-content-center">
                          <img src="../storage/{{ $pengguna->foto }}" alt="" class="img-responsive d-block">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="foto">Ganti Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                        <p>
                          *) Kosongkan jika tidak ingin mengganti foto
                        </p>
                        @error('foto')
                        <div class="invalid-tooltip">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/pengguna" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
              <div class="float-right">
                <a class="btn btn-warning" onclick="$('#edit').submit()"> <i class="fa fa-edit"></i> Edit</a>
              </div>
            </div>
        </div>
    </div>
  </section>
  <!-- End Main Content -->
</div>

@endsection