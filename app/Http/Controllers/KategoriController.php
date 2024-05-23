<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('_admin.kategori.index', compact('kategori'));
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
        $seo = strtolower($data['nama_kategori']);
        $data['kategori_seo'] = str_replace(' ', '-', $seo);
        Kategori::create($data);
        return redirect('/admin/kategori')->with('pesan', 'Kategori baru telah di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('_admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'aktif' => 'required',
        ]);
        $data = $request->all();
        if($data['nama_kategori'] != $kategori->nama_kategori){
            $seo = strtolower($data['nama_kategori']);
            $data['kategori_seo'] = str_replace(' ', '-', $seo);
            Kategori::find($kategori->id)->update($data);
        }else{
            Kategori::find($kategori->id)->update($data);
        }
        return redirect('/admin/kategori')->with('pesan', 'Kategori post berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/admin/kategori')->with('pesan', 'Kategori post berhasil di hapus');
    }
}
