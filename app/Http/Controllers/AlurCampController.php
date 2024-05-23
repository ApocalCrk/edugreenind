<?php

namespace App\Http\Controllers;

use App\Alur;
use Illuminate\Http\Request;

class AlurCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alur = Alur::all();
        return view('_admin.alur.index', compact('alur'));
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
            'nama_proses' => 'required',
            'deskripsi_proses' => 'required',
            'urutan_proses' => 'required',
        ]);
        $data = $request->all();
        $alur = Alur::count();
        if($alur == 6){
            $data['aktif'] = 'N';
            Alur::create($data);
        }else{
            $data['aktif'] = 'Y';
            Alur::create($data);
        }
        return redirect('/admin/alur')->with('pesan', 'Alur berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function show(Alur $alur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function edit(Alur $alur)
    {
        return view('_admin.alur.edit', compact('alur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alur $alur)
    {
        $request->validate([
            'nama_proses' => 'required',
            'deskripsi_proses' => 'required',
            'urutan_proses' => 'required',
        ]);
        $data = $request->all();
        $alur_c = Alur::where('aktif', 'Y')->count();
        if($alur_c == 6 and $request->aktif == 'Y'){
            if($data['aktif'] == $alur->aktif){
                Alur::find($alur->id)->update($data);
            }else{
                return redirect('/admin/alur/'.$alur->id.'/edit')->with('pesan_alur', 'Tidak bisa mengaktifkan alur');
            }
        }else{
            Alur::find($alur->id)->update($data);
        }
        return redirect('/admin/alur')->with('pesan', 'Alur berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alur  $alur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alur $alur)
    {
        Alur::destroy($alur->id);
        return redirect('/admin/alur')->with('pesan', 'Alur berhasil di hapus');
    }
}
