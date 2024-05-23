@extends('_public._slicing.main')

@section('title', 'Pendaftaran')

@section('content')
<section class="section" id="inner-page">
    <div class="container" id="container">
        <!-- ***** Section Title End ***** -->
        <div class="row">
            <form action="/daftardata" method="post" id="form-formulir" class="col-lg-8 col-md-12 col-sm-12">
                @csrf
                <div class="text-center">
                        <h2 class="section-title">Formulir Pendaftaran</h2>
                        <img src="../storage/{{$identitas->logo}}" alt="">
                </div>
                <br>
                <input type="hidden" name="unique_id" value="{{uniqid()}}">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan Nomor Hp" id="no_hp" value="{{old('no_hp')}}" required>
                    @error('no_hp')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">No WA</label>
                    <input type="number" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Masukkan Nomor WhatsApp" id="whatsapp" value="{{old('whatsapp')}}" required>
                    @error('whatsapp')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email Aktif</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Aktif" id="email" value="{{old('email')}}" required>
                    @error('email')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Paket Kursus</label>
                    <select name="paket_kursus" id="paket_kursus" class="form-control @error('paket_kursus') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Paket Kursus</option>
                        @foreach($paket as $row)
                        <option value="{{$row->id}}">{{$row->nama_paket}}</option>
                        @endforeach
                    </select>
                    @error('paket_kursus')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Periode</label>
                    <select name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" required>
                        <option value="" disable selected>Pilih Periode</option>
                        <option value="01 Januari"> 01 Januari </option>
                        <option value="15 Januari"> 15 Januari </option>
                        <option value="01 Februari"> 01 Februari </option>
                        <option value="15 Februari"> 15 Februari </option>
                        <option value="01 Maret"> 01 Maret </option>
                        <option value="15 Maret"> 15 Maret </option>
                        <option value="01 April"> 01 April </option>
                        <option value="15 April"> 15 April </option>
                        <option value="01 Mei"> 01 Mei </option>
                        <option value="15 Mei"> 15 Mei </option>
                        <option value="01 Juni"> 01 Juni </option>
                        <option value="15 Juni"> 15 Juni </option>
                        <option value="01 Juli"> 01 Juli </option>
                        <option value="15 Juli"> 15 Juli </option>
                        <option value="01 Agustus"> 01 Agustus </option>
                        <option value="15 Agustus"> 15 Agustus </option>
                        <option value="01 September"> 01 September </option>
                        <option value="15 September"> 15 September </option>
                        <option value="01 Oktober"> 01 Oktober </option>
                        <option value="15 Oktober"> 15 Oktober </option>
                        <option value="01 November"> 01 November </option>
                        <option value="15 November"> 15 November </option>
                        <option value="01 Desember"> 01 Desember </option>
                        <option value="15 Desember"> 15 Desember </option>
                    </select>
                    @error('periode')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tanggal Kedatangan / Check in Asrama</label>
                    <input type="text" name="tgl_datang" placeholder="Contoh tanggal 14 Juni" id="tgl_datang" class="form-control @error('tgl_datang') is-invalid @enderror" value="{{old('tgl_datang')}}">
                    <small>*Tanggal Kedatangan / Check in Asrama minimal H-1 sebelum periode belajar di mulai.</small>
                    @error('tgl_datang')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jumlah Peserta</label>
                    <input type="number" min="1" name="jumlah_peserta" placeholder="Masukkan Jumlah Peserta" id="jumlah_peserta" class="form-control @error('jumlah_peserta') is-invalid @enderror" value="{{old('jumlah_peserta')}}">
                    @error('jumlah_peserta')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                    <small>*Jika peserta lebih dari 1/rombongan cukup mengisi satu form saja/penanggung jawab.</small>
                </div>
                <div class="form-group">
                    <label for="">Ukuran Kaos</label>
                    <select name="ukuran_kaos" id="ukuran_kaos" class="form-control @error('ukuran_kaos') is-invalid @enderror" required>
                        <option value="" selected disabled>Pilih Ukuran Kaos</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                    @error('ukuran_kaos')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>  
                    @enderror
                </div>
                <span data-toggle="modal" data-target="#exampleModal" class="btn btn-primary col-lg-12"> <div class="fa fa-paper-plane"></div> Proses Data</span>
            </form>
            <div class="col-lg-4 col-md-12 col-sm-12 follow">
                <div id="follow">
                <h4>Cari <span class="green-light-main">Berita</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <form action="/search" method="get" class="form-search">
                    <div class="input-group">
                        <input type="text" name="q" id="q" class="form-control search_custom" placeholder="Search..." required>
                        <i role="button" onclick="$('#q').val('')" id="remove_search" class="fa fa-times icon position-absolute d-none"></i>
                        <i role="button" onclick="$('.form-search').submit()" id="run_search" class="fa fa-search icon position-absolute"></i>
                    </div>
                    <!-- <div class="form-group">
                        <p>Pencarian Filter <i class="fa fa-angle-right"></i></p>
                    </div> -->
                </form>
                <br>
                <h4>Cara <span class="green-light-main">Pendaftaran</span></h4>
                <hr class="custom-hr">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <hr class="custom-hr-point">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-sm-12">
                        <a href="/cara-pendaftaran">
                            <div class="border-pdf text-center">
                                <small>PROSEDUR PENDAFTARAN ONLINE</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-sm-12 mt-3">
                        <a href="/ask">
                            <div class="border-pdf text-center">
                                <small>PERTANYAAN YANG SERING DIAJUKAN</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-sm-12 mt-3">
                        <a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif">
                            <div class="border-pdf-wa text-center">
                                <small>TANYA LEWAT WHATSAPP</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Apakah data yang anda isi sudah benar, jika belum silahkan mengecek kembali data yang diisikan.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="button" onclick="$('#form-formulir').submit()" class="btn btn-primary">Proses Data</button>
      </div>
    </div>
  </div>
</div>

<script>
if(window.innerWidth >= 1366){
    $(window).scroll(function() { 
        var height = document.getElementById('container').clientHeight;
        var height_follow = document.getElementById('follow').clientHeight;
        if(document.documentElement.scrollTop > 80){
            $('.follow').css('margin-top', 0);
            if(document.documentElement.scrollTop < height-height_follow){
                $('.follow').css('top', $(this).scrollTop());
            }
        }   
    })
}
</script>

@endsection