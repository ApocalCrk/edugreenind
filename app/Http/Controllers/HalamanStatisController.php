<?php

namespace App\Http\Controllers;

use App\HalamanStatis;
use Illuminate\Http\Request;

class HalamanStatisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = HalamanStatis::all();
        return view('_admin.halamanstatis.index', compact('halaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.halamanstatis.create');
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
            'judul' => 'required',
            'isi_halaman' => 'required',
            'gambar' => 'required|image|mimes: jpg,jpeg,png',
        ]);
        $data = $request->all();
        $seo = strtolower($data['judul']);
        $data['judul_seo'] = str_replace(' ', '-', $seo);
        $data['gambar'] = $request->file('gambar')->store('asset/halamanstatis', 'public');
        HalamanStatis::create($data);
        return redirect('/admin/halamanstatis')->with('pesan', 'Halaman Statis berhasil di upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HalamanStatis $halamanstati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HalamanStatis $halamanstati)
    {
        return view('_admin.halamanstatis.edit', compact('halamanstati'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HalamanStatis $halamanstati)
    {
        $request->validate([
            'judul' => 'required',
            'isi_halaman' => 'required',
            'gambar' => 'image|mimes: jpg,jpeg,png',
        ]);
        $data = $request->all();
        $seo = strtolower($data['judul']);
        $data['judul_seo'] = str_replace(' ', '-', $seo);
        if(!isset($data['gambar'])){
            HalamanStatis::find($halamanstati->id)->update($data);
        }else{
            unlink(storage_path('app/public/'.$halamanstati->gambar));
            $data['gambar'] = $request->file('gambar')->store('asset/halamanstatis', 'public');
            HalamanStatis::find($halamanstati->id)->update($data);
        }
        return redirect('/admin/halamanstatis')->with('pesan', 'Halaman Statis berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HalamanStatis $halamanstati)
    {
        unlink(storage_path('app/public/'.$halamanstati->gambar));
        HalamanStatis::destroy($halamanstati->id);
        return redirect('/admin/halamanstatis')->with('pesan', 'Halaman Statis berhasil di hapus');
    }
}
