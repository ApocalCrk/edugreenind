@extends('_admin.slicing.main')

@section('title', 'Edit Pertanyaan Yang Sering DiAjukan | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Pertanyaan Yang Sering DiAjukan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Pertanyaan Yang Sering DiAjukan</li>
            <li class="breadcrumb-item active">Edit Pertanyaan</li>
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
                <form action="/admin/ask/{{ $ask->id }}" method="post" class="form_edit" id="edit">
                  @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $ask->pertanyaan }}">
                        @error('pertanyaan')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <textarea name="jawaban" id="jawaban" class="form-control @error('jawaban') is-invalid @enderror">{{$ask->jawaban}}</textarea>
                        @error('jawaban')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
              <a role="button" href="/admin/ask" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
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