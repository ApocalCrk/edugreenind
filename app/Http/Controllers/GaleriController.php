<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\KategoriGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        $album = KategoriGaleri::all();
        return view('_admin.galeri.index', compact('galeri', 'album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kat' => 'required',
            'judul_galeri' => 'required',
            'keterangan' => 'required'
        ]);
        $data = $request->all();
        $seo = strtolower($data['judul_galeri']);
        $data['galeri_seo'] = str_replace(' ', '-', $seo);
        if($data['radio'] == 'youtube'){
            $data['file'] = $data['youtube'];
            Galeri::create($data);
        }elseif($data['radio'] == 'foto'){
            $data['file'] = $request->file('file')->store('asset/galeri', 'public');
            Galeri::create($data);
        }elseif($data['youtube'] == null and $data['file'] == null){
            return redirect('/admin/galeri')->with('pesan_gagal', 'File gagal di tambah ke galeri');
        }
        return redirect('/admin/galeri')->with('pesan', 'File berhasil di tambah ke galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        $album = KategoriGaleri::all();
        return view('_admin.galeri.edit', compact('galeri', 'album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'id_kat' => 'required',
            'judul_galeri' => 'required',
            'keterangan' => 'required'
        ]);
        $data = $request->all();
        $seo = strtolower($data['judul_galeri']);
        $data['galeri_seo'] = str_replace(' ', '-', $seo);
        if($data['radio'] == 'youtube'){
            if(substr($galeri->file, '0', '12') == 'asset/galeri'){
                unlink(storage_path('app/public/'.$galeri->file));
            }
            $data['file'] = $data['youtube'];
            Galeri::find($galeri->id)->update($data);
        }elseif($data['radio'] == 'foto'){
            $data['file'] = $request->file('file')->store('asset/galeri', 'public');
            Galeri::find($galeri->id)->update($data);
        }elseif($data['youtube'] == null and $data['file'] == null){
            return redirect('/admin/galeri')->with('pesan_gagal', 'File gagal di tambah ke galeri');
        }else{
            $data['file'] = $galeri->file;
            Galeri::find($galeri->id)->update($data);
            return redirect('/admin/galeri')->with('pesan', 'File galeri berhasil di edit');
        }
        return redirect('/admin/galeri')->with('pesan', 'File galeri berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        if(substr($galeri->file, '0', '12') == 'asset/galeri'){
            unlink(storage_path('app/public/'.$galeri->file));
        }
        Galeri::destroy($galeri->id);
        return redirect('/admin/galeri')->with('pesan', 'File galeri berhasil di hapus');
    }
}
