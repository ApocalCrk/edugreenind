<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Alur;
use App\Ask;
use App\CaraPendaftaran;
use App\Galeri;
use App\HalamanStatis;
use App\Identitas;
use App\Kategori;
use App\KategoriGaleri;
use App\Menu;
use App\Post;
use App\Slider;
use App\Tag;
use App\Testimoni;
use App\HomeLine;
use App\Intro;
use App\Paket;
use App\Pendaftaran;
use App\ProfilPimpinan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicController extends Controller
{
    public function index(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $headline = Post::where('headline', 'Y')->where('publish', 'Y')->orderBy('created_at', 'asc')->get();
        $testimoni = Testimoni::where('aktif', 'Y')->get();
        $alur = Alur::where('aktif', 'Y')->orderBy('urutan_proses', 'asc')->get();
        $homeline = Homeline::where('aktif', 'Y')->get();
        $intro = Intro::where('aktif', 'Y')->get();
        $identitas = Identitas::where('id', 1)->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        if($identitas->slider == 'Y'){
            $slider = Slider::all();
            return view('_public.home', compact('menu', 'headline', 'testimoni', 'alur', 'slider', 'intro', 'homeline', 'paket', 'kategori'));
        }else{
            return view('_public.home', compact('menu', 'headline', 'testimoni', 'alur', 'intro', 'homeline', 'paket', 'kategori'));
        }
    }

    public function page($page){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $statis = HalamanStatis::where('judul_seo', $page)->FirstorFail();
        $post_terbaru = Post::limit(1)->orderBy('created_at', 'asc')->FirstorFail();
        $profil = ProfilPimpinan::find(1)->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.statis.statis', compact('statis', 'menu', 'post_terbaru', 'profil', 'kategori', 'paket'));
    }

    public function informasi(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $headline = Post::where('headline', 'Y')->where('publish', 'Y')->orderBy('created_at', 'asc')->get();
        $all_berita = Post::where('publish', 'Y')->paginate(4);
        $populer = Post::limit(2)->orderBy('dibaca', 'desc')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.informasi.index', compact('menu', 'all_berita', 'headline', 'populer', 'kategori', 'paket'));
    }

    public function post($post){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $post_terbaru = Post::limit(1)->orderBy('created_at', 'desc')->FirstorFail();
        $post = Post::where('judul_seo', $post)->limit(1)->FirstorFail();
        Post::find($post->id)->update(['dibaca' => $post->dibaca+=1]);
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.informasi.post', compact('menu','post','post_terbaru', 'kategori', 'paket'));
    }

    public function galeri(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $galeri = Galeri::paginate(6);
        $album = KategoriGaleri::where('aktif', 'Y')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.galeri.index', compact('menu', 'galeri', 'album', 'kategori', 'paket'));
    }

    public function tag(Request $request,$tag){
        $post = Post::all();
        $data = [];
        foreach($post as $row){
            $tag_seo = explode(',', $row->tag);
            if(in_array($tag, $tag_seo)){
                array_push($data, $row);
            }
        }
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $populer = Post::limit(2)->orderBy('dibaca', 'desc')->get();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $productCollection = collect($data);
        $perPage = 6;
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $data= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);
        $data->setPath($request->url());
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.tag.index', compact('menu','data','populer', 'tag', 'kategori', 'paket'));   
    }
    
    public function kategori($kategori_seo){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $populer = Post::limit(2)->orderBy('dibaca', 'desc')->get();
        $id_kat = Kategori::where('kategori_seo', $kategori_seo)->FirstorFail();
        $data = Post::where('id_kat', $id_kat->id)->paginate(6);
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.kategori.index', compact('menu','data','populer', 'id_kat', 'kategori', 'paket'));   

    }

    public function search_berita(Request $request){
        $pencarian = $request->q;
        $data = Post::where('judul', 'LIKE', '%'.$request->q.'%')->orderBy('created_at', 'desc')->paginate(6);
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $populer = Post::limit(2)->orderBy('dibaca', 'desc')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.informasi.search', compact('menu','data','populer', 'pencarian', 'kategori', 'paket'));   
    }

    public function search_agenda(Request $request){
        $pencarian = $request->q;
        $agenda = agenda::where('tema', 'LIKE', '%'.$request->q.'%')->paginate(6);
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $agenda_baru = Agenda::limit(2)->orderBy('updated_at', 'desc')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.agenda.search', compact('menu','agenda','agenda_baru', 'pencarian', 'kategori', 'paket'));   
    }

    public function spotlight(Request $request){
        $pencarian = $request->q;
        $post = Post::where('judul', 'LIKE', '%'.$pencarian.'%')->where('publish', 'Y')->orderBy('dibaca', 'desc')->limit(3)->get();
        $tag = Tag::where('nama_tag', 'LIKE', '%'.$pencarian.'%')->limit(3)->get();
        return view('_public._slicing.livesearch', compact('pencarian', 'post', 'tag'));
    }

    public function agendaview(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $agenda = Agenda::paginate(6);
        $agenda_baru = Agenda::limit(2)->orderBy('updated_at', 'desc')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.agenda.index', compact('menu', 'agenda', 'agenda_baru', 'kategori', 'paket'));
    }

    public function agenda($agenda){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $agenda_baru = Agenda::limit(1)->orderBy('updated_at', 'desc')->FirstorFail();
        $agenda_page = Agenda::where('tema_seo', $agenda)->limit(1)->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.agenda.agenda', compact('menu', 'agenda_baru', 'agenda_page', 'kategori', 'paket'));
    }

    public function mailto(Request $request){
        $identitas = Identitas::find(1)->FirstorFail();
        $to = $identitas->email;
        $subject = "Kritik Atau Saran Untuk Web Edu Green Indonesia";
        $txt = $request->message;
        $headers = "From: ".$request->email . "\r\n";
        mail($to,$subject,$txt,$headers);
        return redirect('/');
    }

    public function pendaftaran(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.pendaftaran.index', compact('menu', 'paket', 'kategori', 'paket'));
    }

    public function cara_pendaftaran(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $cara = CaraPendaftaran::find(1)->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.pendaftaran.cara', compact('menu', 'cara', 'kategori', 'paket'));
    }

    public function daftardata(Request $request){
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|numeric',
            'whatsapp' => 'required|numeric',
            'email' => 'required|email',
            'paket_kursus' => 'required',
            'periode' => 'required',
            'tgl_datang' => 'required',
            'jumlah_peserta' => 'required|numeric',
            'ukuran_kaos' => 'required'
        ]);
        $data = $request->all();
        $data['status'] = 'Menunggu Konfirmasi';
        Pendaftaran::create($request->all());
        return redirect('/data_terkirim/'.$request->unique_id);
    }

    public function data_terkirim($unique){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $data = Pendaftaran::where('unique_id', $unique)->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.pendaftaran.verify', compact('menu','data', 'kategori', 'paket'));
    }

    public function kontak(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.kontak.index', compact('menu', 'kategori', 'paket'));
    }

    public function ask(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $ask = Ask::all();
        $paket = Paket::where('aktif', 'Y')->get();
        return view('_public.pendaftaran.ask', compact('menu', 'ask', 'kategori', 'paket'));
    }

    public function programview(){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $paket_all = Paket::where('aktif', 'Y')->paginate(6);
        $paket_headline = Paket::where('aktif', 'Y')->limit(3)->orderBy('id', 'asc')->get();
        $populer = Post::limit(1)->orderBy('dibaca', 'desc')->get();
        $paket = Paket::where('aktif', 'Y')->get();
        $kategori_paket = Post::where('id_kat', '3')->limit(2)->orderBy('dibaca', 'desc')->get();
        return view('_public.program.index', compact('paket_all', 'menu', 'paket_headline', 'populer', 'kategori', 'paket', 'kategori_paket'));
    }

    public function paket($paket_seo){
        $menu = Menu::where('aktif', 'Y')->orderBy('urutan_menu', 'asc')->get();
        $kategori = Kategori::where('aktif', 'Y')->get();
        $post_terbaru = Post::limit(1)->orderBy('created_at', 'desc')->FirstorFail();
        $paket = Paket::where('aktif', 'Y')->get();
        $detail_paket = Paket::where('paket_seo', $paket_seo)->FirstorFail();
        return view('_public.program.paket', compact('menu', 'kategori', 'post_terbaru', 'paket', 'detail_paket'));
    }
}
