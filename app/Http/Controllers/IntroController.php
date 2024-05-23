<?php

namespace App\Http\Controllers;

use App\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intro = Intro::all();
        return view('_admin.intro.index', compact('intro'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
        ]);
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('asset/intro', 'public');
        $intro = Intro::where('aktif', 'Y')->count();
        if($intro > 2){
            $data['aktif'] = 'N';
            Intro::create($data);
        }else{
            $data['aktif'] = 'Y';
            Intro::create($data);
        }
        return redirect('/admin/intro')->with('pesan', 'Fitur Intro berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function show(intro $intro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function edit(intro $intro)
    {
        return view('_admin.intro.edit', compact('intro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, intro $intro)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image',
        ]);
        $data = $request->all();
        $intro_c = Intro::where('aktif', 'Y')->count();
        if($intro_c > 2 and $data['aktif'] == 'Y'){
            if($intro->aktif == $data['aktif']){
                if(!isset($data['gambar'])){
                    $data['gambar'] = $intro->gambar;
                    Intro::find($intro->id)->update($data);
                }else{
                    unlink(storage_path('app/public/'.$intro->gambar));
                    $data['gambar'] = $request->file('gambar')->store('asset/intro', 'public');
                    Intro::find($intro->id)->update($data);
                }
            }else{
                return redirect('/admin/intro')->with('pesan_limit', 'Aktif sudah mencapai batas maksimum');
            }
        }else{
            if(!isset($data['gambar'])){
                $data['gambar'] = $intro->gambar;
                Intro::find($intro->id)->update($data);
                
            }else{
                unlink(storage_path('app/public/'.$intro->gambar));
                $data['gambar'] = $request->file('gambar')->store('asset/intro', 'public');
                Intro::find($intro->id)->update($data);
            }
        }
        return redirect('/admin/intro')->with('pesan', 'Fitur Intro berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function destroy(intro $intro)
    {
        unlink(storage_path('app/public'.$intro->gambar));
        Intro::destroy($intro->id);
        return redirect('/admin/intro')->with('oesan', 'Fitur Intro berhasi di hapus');
    }
}
