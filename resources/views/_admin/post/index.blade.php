@extends('_admin.slicing.main')

@section('title', 'Post | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Post</li>
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
            <a href="/admin/post/create" id="tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Post </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataPost">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tgl. Posting</th>
                        <th>Publish</th>
                        <th>Dibaca</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->publish }}</td>
                        <td>{{ $row->dibaca }}</td>
                        <td>{{ $row->username }}</td>
                        <td>
                            <a href="/admin/post/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                            <form action="/admin/post/{{ $row->id }}" method="post" class="d-inline form-delete{{ $row->id }}">
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
        $('#dataPost').dataTable();
    });
</script>

@endsection