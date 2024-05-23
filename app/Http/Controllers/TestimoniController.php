<?php

namespace App\Http\Controllers;

use App\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('_admin.testimoni.index', compact('testimoni'));
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
            'nama' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|mimes: jpg,jpeg,png',
        ]);
        $data = $request->all();
        $testimoni = Testimoni::count();
        if($testimoni == 3){
            $data['aktif'] = 'N';
            $data['foto'] = $request->file('foto')->store('asset/testimoni', 'public');
            Testimoni::create($data);
        }else{
            $data['aktif'] = 'Y';
            $data['foto'] = $request->file('foto')->store('asset/testimoni', 'public');
            Testimoni::create($data);
        }
        return redirect('/admin/testimoni')->with('pesan', 'Testimoni berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        return view('_admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama' => 'required',
            'isi' => 'required',
        ]);
        $data = $request->all();
        if(!isset($data['foto'])){
            $data['foto'] = $testimoni->foto;
            Testimoni::find($testimoni->id)->update($data);
        }else{
            $request->validate([
                'foto' => 'image|mimes: jpg,jpeg,png',
            ]);
            unlink(storage_path('app/public/'.$testimoni->foto));
            $data['foto'] = $request->file('foto')->store('asset/testimoni', 'public');
            Testimoni::find($testimoni->id)->update($data);
        }
        return redirect('/admin/testimoni')->with('pesan', 'Testimoni berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        unlink(storage_path('app/public/'.$testimoni->foto));
        Testimoni::destroy($testimoni->id);
        return redirect('/admin/testimoni')->with('pesan', 'Testimoni berhasil di hapus');
    }
}
