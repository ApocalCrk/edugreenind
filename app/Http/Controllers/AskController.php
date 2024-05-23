<?php

namespace App\Http\Controllers;

use App\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ask = Ask::all();
        return view('_admin.ask.index', compact('ask'));
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);
        Ask::create($request->all());
        return redirect('/admin/ask')->with('pesan', 'Pertanyaan yang sering diajukan berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function show(Ask $ask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $ask)
    {
        return view('_admin.ask.edit', compact('ask'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ask $ask)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);
        Ask::find($ask->id)->update($request->all());
        return redirect('/admin/ask')->with('pesan', 'Pertanyaan yang sering diajukan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
        Ask::destroy($ask->id);
        return redirect('/admin/ask')->with('pesan', 'Pertanyaan yang sering diajukan berhasil di hapus');
    }
}
