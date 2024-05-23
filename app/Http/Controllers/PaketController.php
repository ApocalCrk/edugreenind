<?php

namespace App\Http\Controllers;

use App\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        return view('_admin.paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.paket.create');
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
            'nama_paket' => 'required',
            'waktu_paket' => 'required',
            'harga' => 'required|numeric',
            'keunggulan_p' => 'required',
            'gambar' => 'required|image',
            'deskripsi_paket' => 'required'
        ]);
        $keunggulan_paket = '';
        foreach($request->keunggulan_p as $row){
            $keunggulan_paket .= $row.',';
        }
        $data = $request->all();
        $data['keunggulan_paket'] = $keunggulan_paket;
        $seo = strtolower($data['nama_paket']);
        $data['paket_seo'] = str_replace(' ', '-', $seo);
        $data['gambar'] = $request->file('gambar')->store('asset/paket', 'public');
        Paket::create($data);
        return redirect('/admin/paket')->with('pesan', 'Paket Kursus berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('_admin.paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket' => 'required',
            'waktu_paket' => 'required',
            'harga' => 'required|numeric',
            'keunggulan_p' => 'required',
            'aktif' => 'required',
            'gambar' => 'image',
            'deskripsi_paket' => 'required'
        ]);
        $keunggulan_paket = '';
        foreach($request->keunggulan_p as $row){
            $keunggulan_paket .= $row.',';
        }
        $data = $request->all();
        $data['keunggulan_paket'] = $keunggulan_paket;
        $seo = strtolower($data['nama_paket']);
        $data['paket_seo'] = str_replace(' ', '-', $seo);
        if(!isset($data['gambar'])){
            Paket::find($paket->id)->update($data);
        }else{
            unlink(storage_path('app/public/'.$paket->gambar));
            $data['gambar'] = $request->file('gambar')->store('asset/paket', 'public');
            Paket::find($paket->id)->update($data);
        }
        return redirect('/admin/paket')->with('pesan', 'Paket Kursus berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);
        return redirect('/admin/paket')->with('pesan', 'Paket Kursus berhasil di hapus');
    }
}
