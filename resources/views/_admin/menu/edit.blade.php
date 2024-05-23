@extends('_admin.slicing.main')

@section('title', 'Edit Menu | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Menu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Menu</li>
            <li class="breadcrumb-item active">Edit Menu</li>
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
                <form action="/admin/menu/{{ $menu->id }}" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" value="{{ $menu->nama_menu }}">
                        @error('nama_menu')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ $menu->link }}" list="data_link">
                        <datalist id="data_link">

                        </datalist>
                        @error('link')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="urutan_menu">Urutan Menu</label>
                        <input type="number" name="urutan_menu" id="urutan_menu" class="form-control @error('urutan_menu') is-invalid @enderror" value="{{ $menu->urutan_menu }}">
                        @error('urutan_menu')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select name="aktif" id="aktif" class="form-control @error('aktif') is-invalid @enderror">
                            <option value="{{ $menu->aktif }}">@if($menu->aktif == 'Y') Aktif @else Non-Aktif @endif</option>
                            <option value="Y">Aktif</option>
                            <option value="N">Non-Aktif</option>
                        </select>
                        @error('aktif')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/menu" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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