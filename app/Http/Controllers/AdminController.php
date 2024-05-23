<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\CaraPendaftaran;
use App\Identitas;
use App\Kunjungan;
use App\Pendaftaran;
use App\Post;
use App\ProfilPimpinan;
use App\Slider;
Use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $kunjungan = Kunjungan::count();
        $post = Post::count();
        $agenda = Agenda::count();
        $record = Kunjungan::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        $data = [];
        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);

        $record_month = Kunjungan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get();
        $data_month = [];
        foreach($record_month as $row) {
            $data_month['label'][] = $row->month_name;
            $data_month['data'][] = (int) $row->count;
        }
        $data_month['month_data'] = json_encode($data_month);
        
        return view('_admin.dashboard', compact('kunjungan', 'post', 'agenda', 'data_month'), $data);
    }

    public function pengaturan(){
        return view('_admin.pengaturan.index');
    }

    public function perbarui_pengaturan(Request $request){
        $identitas = Identitas::where('id', 1)->FirstorFail();
        if($request->type_form == 'pengaturan_umum'){
            $request->validate([
                'nama_web' => 'required',
                'alamat_website' => 'required',
                'alamat' => 'required',
                'meta_deskripsi' => 'required',
                'meta_keyword' => 'required',
                'nama_instansi' => 'required',
                'email' => 'required|email',
                'telp1' => 'required|numeric',
                'telp2' => 'numeric',
            ]);
            if($request->slider == 'Y'){
                if(Slider::count() > 0){
                    Identitas::find(1)->update($request->all());
                    return redirect('/admin/pengaturan')->with('pesan', 'Data berhasil di ubah');
                }else{
                    return redirect('/admin/pengaturan')->with('pesan_slider', 'Slider wajib di upload terlebih dahulu');
                }
            }elseif($request->slider == 'N'){
                if(!isset($request->non_slider)){
                    if($identitas->non_slider != null){
                        Identitas::find(1)->update($request->all());
                        return redirect('/admin/pengaturan')->with('pesan', 'Data berhasil di ubah');
                    }else{
                        return redirect('/admin/pengaturan')->with('pesan_gagal', 'Gambar slider wajib di isi');
                    }
                }else{
                    $request->validate([
                        'non_slider' => 'image'
                    ]);
                    $data = $request->all();
                    unlink(storage_path('app/public/'.$identitas->non_slider));
                    $data['non_slider'] = $request->file('non_slider')->store('asset/non_slider', 'public');
                    Identitas::find(1)->update($data);
                    return redirect('/admin/pengaturan')->with('pesan', 'Data berhasil di ubah');
                }
            }
        }elseif($request->type_form == 'logo'){
            $request->validate([
                'logo' => 'required|image|dimensions:max_width=218,min_height=34'
            ]);
            $data = $request->all();
            $data['logo'] = $request->file('logo')->store('asset/logo', 'public');
            unlink(storage_path('app/public/'.$identitas->logo));
            Identitas::find(1)->update($data);
            return redirect('/admin/pengaturan')->with('pesan', 'Logo berhasil di ubah');
        }elseif($request->type_form == 'favicon'){
            $request->validate([
                'favicon' => 'required|image|dimensions:max_width=50,min_height=50'
            ]);
            $data = $request->all();
            $data['favicon'] = $request->file('favicon')->store('asset/favicon', 'public');
            unlink(storage_path('app/public/'.$identitas->favicon));
            Identitas::find(1)->update($data);
            return redirect('/admin/pengaturan')->with('pesan', 'Favicon berhasil di ubah');
        }else{
            return redirect('/admin/pengaturan');
        }
    }

    public function cara_pendaftaran(){
        $cara = CaraPendaftaran::find(1)->FirstorFail();
        return view('_admin.pendaftar.cara', compact('cara'));
    }

    public function edit_cara_pendaftaran(Request $request){
        $request->validate([
            'judul' => 'required',
            'sub_judul' => 'required',
            'deskripsi' => 'required',
        ]);
        CaraPendaftaran::find(1)->update($request->all());
        return redirect('/admin/cara_pendaftaran')->with('pesan', 'Cara Pendaftaran berhasil di edit');
    }

    public function data_pendaftar(){
        $pendaftar = Pendaftaran::where('status', 'Menunggu Konfirmasi')->get();
        return view('_admin.pendaftar.index', compact('pendaftar'));
    }

    public function data_pendaftarkonfirmasi(){
        $pendaftar = Pendaftaran::where('status', 'Data Terkonfirmasi')->get();
        return view('_admin.pendaftar.data_konfirmasi', compact('pendaftar'));
    }

    public function konfirmasi_data_pendaftar($id){
        Pendaftaran::where('id', $id)->update(['status' => 'Data Terkonfirmasi']);
        return redirect('/admin/data_pendaftarkonfirmasi')->with('pesan', 'Data Berhasil Di Konfirmasi');
    }

    public function detail_data_pendaftar($unique){
        $pendaftar = Pendaftaran::where('unique_id', $unique)->FirstorFail();
        return view('_admin.pendaftar.detail_data', compact('pendaftar'));
    }

    public function ajax_data_pendaftar($unique){
        $pendaftar = Pendaftaran::where('unique_id', $unique)->FirstorFail();
        return $pendaftar;
    }
    
    public function hapus_semua_data_pendaftar(){
        Pendaftaran::truncate();
        return redirect('/admin/data_pendaftarkonfirmasi')->with('pesan', 'Semua Data Berhasil Di Hapus');
    }

    public function profil_pimpinan(){
        $profil = ProfilPimpinan::find(1)->FirstorFail();
        return view('_admin.profil.index', compact('profil'));
    }

    public function update_profil_pimpinan(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image',
            'aktif' => 'required'
        ]);
        $data = $request->all();
        $profil = ProfilPimpinan::find(1)->FirstorFail();
        if(!isset($data['foto'])){
            ProfilPimpinan::find($profil->id)->update($data);
        }else{
            if($profil->foto != 'asset/profil_pimpinan/default.jpg'){
                unlink(storage_path('app/public/'.$profil->foto));
                $data['foto'] = $request->file('foto')->store('asset/profil_pimpinan', 'public');
                ProfilPimpinan::find($profil->id)->update($data);
            }else{
                $data['foto'] = $request->file('foto')->store('asset/profil_pimpinan', 'public');
                ProfilPimpinan::find($profil->id)->update($data);
            }
        }
        return redirect('/admin/profil_pimpinan')->with('pesan', 'Profil Pimpinan berhasil di edit');
    }
}
