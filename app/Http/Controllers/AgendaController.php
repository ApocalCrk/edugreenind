<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();
        return view('_admin.agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.agenda.create');
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
            'tema' => 'required',
            'isi_agenda' => 'required',
            'tempat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'jam' => 'required',
            'pengirim' => 'required',
            'gambar' => 'required|image',
        ]);
        $data = $request->all();
        $seo = strtolower($data['tema']);
        $data['tema_seo'] = str_replace(' ', '-', $seo);
        $data['username'] = Auth::user()->name;
        if($data['tgl_selesai'] < $data['tgl_mulai']){
            return redirect('/admin/agenda/create')->with('pesan', 'Tanggal selesai tidak boleh kurang dari Tanggal mulai');
        }else{
            $data['gambar'] = $request->file('gambar')->store('asset/agenda', 'public');
            Agenda::create($data);
        }
        return redirect('/admin/agenda')->with('pesan', 'Agenda berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('_admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'tema' => 'required',
            'isi_agenda' => 'required',
            'tempat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'jam' => 'required',
            'pengirim' => 'required',
            'gambar' => 'image',
        ]);
        $data = $request->all();
        $seo = strtolower($data['tema']);
        $data['tema_seo'] = str_replace(' ', '-', $seo);
        $data['username'] = Auth::user()->name;
        if($data['tgl_selesai'] < $data['tgl_mulai']){
            return redirect('/admin/agenda/create')->with('pesan', 'Tanggal selesai tidak boleh kurang dari Tanggal mulai');
        }else{
            if(!isset($data['gambar'])){
                Agenda::find($agenda->id)->update($data);
            }else{
                $data['gambar'] = $request->file('gambar')->store('asset/agenda', 'public');
                Agenda::create($data);
            }
        }
        return redirect('/admin/agenda')->with('pesan', 'Agenda berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        unlink(storage_path('app/public/'.$agenda->gambar));
        Agenda::destroy($agenda->id);
        return redirect('/admin/agenda')->with('pesan', 'Agenda berhasil di hapus');
    }
}
