<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\KategoriGaleri;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = KategoriGaleri::all();
        return view('_admin.album.index', compact('album'));
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
            'nama_kategori' => 'required'
        ]);
        $data = $request->all();
        $data['aktif'] =  'Y';
        $seo = strtolower($data['nama_kategori']);
        $data['album_seo'] = str_replace(' ', '-', $seo);
        KategoriGaleri::create($data);
        return redirect('/admin/album')->with('pesan', 'Album berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriGaleri $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriGaleri $album)
    {
        return view('_admin.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriGaleri $album)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'aktif' => 'required',
        ]);
        $data = $request->all();
        if($data['nama_kategori'] != $album->nama_kategori){
            $seo = strtolower($data['nama_kategori']);
            $data['album_seo'] = str_replace(' ', '-', $seo);
            KategoriGaleri::find($album->id)->update($data);
        }else{
            KategoriGaleri::find($album->id)->update($data);
        }
        return redirect('/admin/album')->with('pesan', 'Album berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriGaleri $album)
    {
        KategoriGaleri::destroy($album->id);
        return redirect('/admin/album')->with('pesan', 'Album berhasil di hapus');
    }
}
