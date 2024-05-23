@extends('_admin.slicing.main')

@section('title', 'Pengaturan Web | Edu Green')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengaturan Web</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
            <li class="breadcrumb-item active">Pengaturan Web</li>
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
            <form action="/admin/perbarui_pengaturan" enctype="multipart/form-data" method="post" class="form-identitas" id="identitas">
              @csrf
              @method('PATCH')
              <input type="hidden" name="type_form" value="pengaturan_umum">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Pengaturan Umum</h4>
                        <hr>
                        <div class="form-group">
                            <label for="nama_web">Nama Website</label>
                            <input type="text" name="nama_web" id="nama_web" value="{{ $identitas->nama_web }}" class="form-control @error('nama_web') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('nama_web') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat_website">Alamat Website</label>
                            <input type="text" name="alamat_website" id="alamat_website" value="{{ $identitas->alamat_website }}" class="form-control @error('alamat_website') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('alamat_website') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_deskripsi">Meta Deskripsi</label>
                            <textarea name="meta_deskripsi" id="meta_deskripsi" rows="5" class="form-control @error('meta_deskripsi') is-invalid @enderror" >{{$identitas->meta_deskripsi}}</textarea>
                            <div class="invalid-tooltip">
                                @error('meta_deskripsi') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" id="meta_keyword" rows="3" class="form-control @error('meta_keyword') is-invalid @enderror" >{{$identitas->meta_keyword}}</textarea>
                            <div class="invalid-tooltip">
                                @error('meta_keyword') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alumni">Jumlah Alumni</label>
                            <input type="number" name="alumni" id="alumni" rows="3" class="form-control @error('alumni') is-invalid @enderror" value="{{$identitas->alumni}}">
                            <div class="invalid-tooltip">
                                @error('alumni') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pendaftar">Jumlah Pendaftar</label>
                            <input type="number" name="pendaftar" id="pendaftar" rows="3" class="form-control @error('pendaftar') is-invalid @enderror" value="{{$identitas->pendaftar}}">
                            <div class="invalid-tooltip">
                                @error('pendaftar') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengajar">Jumlah Pengajar</label>
                            <input type="number" name="pengajar" id="pengajar" rows="3" class="form-control @error('pengajar') is-invalid @enderror" value="{{$identitas->pengajar}}">
                            <div class="invalid-tooltip">
                                @error('pengajar') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Jumlah Lokasi</label>
                            <input type="number" name="lokasi" id="lokasi" rows="3" class="form-control @error('lokasi') is-invalid @enderror" value="{{$identitas->lokasi}}">
                            <div class="invalid-tooltip">
                                @error('lokasi') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file">Slider</label>
                            <div class="row">
                            <label class="radio-check">
                                @if($identitas->slider == 'Y')
                                    <input type="radio" name="slider" id="active" value="Y" checked>
                                @else
                                    <input type="radio" name="slider" id="active" value="Y">
                                @endif
                                <span>Aktif</span>
                            </label>
                            <label class="radio-check">
                                @if($identitas->slider == 'N')
                                    <input type="radio" name="slider" id="none" value="N" checked>
                                @else
                                    <input type="radio" name="slider" id="none" value="N">
                                @endif
                                <span>Non-Aktif</span>
                            </label>
                            </div>
                            <label id="label_non" class="@if($identitas->slider == 'N') d-block @else d-none @endif">Gambar Non-Slider</label>
                            @if($identitas->non_slider != null)
                                <img src="../storage/{{ $identitas->non_slider }}" alt="" class="gambar_slide @if($identitas->slider == 'N') d-block @else d-none @endif mb-1" width="350">
                            @endif
                            <input type="file" name="non_slider" id="non_slider" class="form-control @error('non_slider') is-invalid @enderror @if($identitas->slider == 'N') d-block @else d-none @endif" value="{{ old('non_slider') }}">
                            @error('non_slider')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">Paket Kursus</label>
                            <div class="row">
                            <label class="radio-check">
                                @if($identitas->paket_kursus == 'Y')
                                    <input type="radio" name="paket_kursus" id="active" value="Y" checked>
                                @else
                                    <input type="radio" name="paket_kursus" id="active" value="Y">
                                @endif
                                <span>Aktif</span>
                            </label>
                            <label class="radio-check">
                                @if($identitas->paket_kursus == 'N')
                                    <input type="radio" name="paket_kursus" id="none" value="N" checked>
                                @else
                                    <input type="radio" name="paket_kursus" id="none" value="N">
                                @endif
                                <span>Non-Aktif</span>
                            </label>
                            </div>
                            @error('non_slider')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4>Lembaga / Instansi</h4>
                        <hr>
                        <div class="form-group">
                            <label for="nama_instansi">Nama Lembaga/Instansi</label>
                            <input type="text" name="nama_instansi" id="nama_instansi" value="{{ $identitas->nama_instansi }}" class="form-control @error('nama_instansi') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('nama_instansi') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Utama</label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" >{{ $identitas->alamat }}</textarea>
                            <div class="invalid-tooltip">
                                @error('alamat') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $identitas->email }}" class="form-control @error('email') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telp1">Telepon</label>
                            <input type="number" name="telp1" id="telp1" value="{{ $identitas->telp1 }}" class="form-control @error('telp1') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('telp1') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telp2">WhatsApp</label>
                            <input type="number" name="telp2" id="telp2" value="{{ $identitas->telp2 }}" class="form-control @error('telp2') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('telp2') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" value="{{ $identitas->facebook }}" class="form-control @error('facebook') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('facebook') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" id="twitter" value="{{ $identitas->twitter }}" class="form-control @error('twitter') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('twitter') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" id="instagram" value="{{ $identitas->instagram }}" class="form-control @error('instagram') is-invalid @enderror" >
                            <div class="invalid-tooltip">
                                @error('instagram') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="googlemap">Google Map</label>
                            <textarea name="googlemap" rows="4" id="googlemap" class="form-control @error('googlemap') is-invalid @enderror">{{$identitas->googlemap}}</textarea>
                            <div class="invalid-tooltip">
                                @error('googlemap') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button role="button" onclick="$('#identitas').submit()" class="btn btn-success col-lg-12">Submit</button>
            </form>
            <br>
            <div class="row">
                <form action="/admin/perbarui_pengaturan" method="POST" class="form-logo col-lg-6" id="logo-form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="type_form" value="logo">
                    <h4>Gambar Logo</h4>
                    <hr>
                    <div class="form-group">
						<label for="" class="control-label">Gambar Logo</label>
						<div class="col-sm-9">
							<img src="../storage/{{ $identitas->logo }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="logo" class="control-label">Ganti Logo</label>
                        <label for="choose-file" class="custom-file-upload text-center p-1" style="border: 1px solid #ccc;width: 100%" id="choose-file-label">
                            <i class="fa fa-cloud-upload-alt"></i>
                            Pilih Gambar
                        </label>
                        <input name="logo" type="file" class="@error('logo') is-invalid @enderror" id="choose-file" style="display: none;" />
                        <p class="text-dark">
                            *) Logo wajib berukuran <b>218 x 34 Pixel</b>
                        </p>
                        <div class="invalid-tooltip">
                            @error('logo') {{ $message }} @enderror
                        </div>
					</div>
                    <button role="button" onclick="$('#logo-form').submit()" class="btn btn-success col-lg-12">Upload</button>
                </form>
                <br>
                <form action="/admin/perbarui_pengaturan" method="POST" class="form-favicon col-lg-6" id="favicon-form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="type_form" value="favicon">
                    <h4>Gambar Favicon</h4>
                    <hr>
                    <div class="form-group">
						<label for="" class="control-label">Gambar Favicon</label>
						<div class="col-sm-9">
							<img src="../storage/{{ $identitas->favicon }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="favicon" class="control-label">Ganti Favicon</label>
                        <label for="choose-file" class="custom-file-upload text-center p-1" style="border: 1px solid #ccc;width: 100%" id="choose-file-label">
                            <i class="fa fa-cloud-upload-alt"></i>
                            Pilih Gambar
                        </label>
                        <input name="favicon" type="file" class="@error('favicon') is-invalid @enderror" id="choose-file" style="display: none;" />
                        <p class="text-dark">
                            *) Favicon wajib berukuran <b>50 x 50 Pixel</b>
                        </p>
                        <div class="invalid-tooltip">
                            @error('favicon') {{ $message }} @enderror
                        </div>
					</div>
                    <button role="button" onclick="$('#favicon-form').submit()" class="btn btn-success col-lg-12">Upload</button>
                </form>
            </div>
          </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>

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
        'icon': 'warning',
        'title': '{{ session("pesan_slider") }}',
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
$(document).ready(function () {
    $('#choose-file').change(function () {
        var i = $(this).prev('label').clone();
        var file = $('#choose-file')[0].files[0].name;
        $(this).prev('label').text(file);
    }); 
});
</script>

<script>
    $(function(){
        $('#dataGaleri').dataTable();
    });
    $(document).ready(function(){
        $("input[name='slider']").change(function() {
            if($(this).val() == 'N'){
                $("#non_slider").removeClass('d-none');
                $("#label_non").removeClass('d-none');
                $(".gambar_slide").removeClass('d-none');
                $(".gambar_slide").addClass('d-block');
                $("#non_slider").attr('disable', 'true');
            } else {
                $("#non_slider").addClass('d-none');
                $("#non_slider").removeClass('d-block');
                $(".gambar_slide").removeClass('d-block');
                $(".gambar_slide").addClass('d-none');
                $("#label_non").addClass('d-none');
                $("#label_non").removeClass('d-block');
                $("#non_slider").prop('disabled', false);
            }
        });
    });
</script>

@endsection