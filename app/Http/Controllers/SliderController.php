<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('_admin.slider.index', compact('slider'));
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
            'judul_slider' => 'required',
            'foto' => 'required|image',
        ]);
        $data = $request->all();
        $slider = Slider::count();
        if($slider == 6){
            return redirect('/admin/slider')->with('pesan_slider', 'Slider telah mencapai batas maksimum');
        }else{
            $seo = strtolower($data['judul_slider']);
            $data['slider_seo'] = str_replace(' ', '-', $seo);
            $data['foto'] = $request->file('foto')->store('asset/slider', 'public');
            Slider::create($data);
            return redirect('/admin/slider')->with('pesan', 'Slider berhasil di tambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('_admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'judul_slider' => 'required',
            'foto' => 'image',
            'tampilkan_keterangan' => 'required'
        ]);
        $data = $request->all();
        $seo = strtolower($data['judul_slider']);
        $data['slider_seo'] = str_replace(' ', '-', $seo);
        if(!isset($data['foto'])){
            Slider::find($slider->id)->update($data);
        }else{
            unlink(storage_path('app/public/'.$slider->foto));
            $data['foto'] = $request->file('foto')->store('asset/slider', 'public');
            Slider::find($slider->id)->update($data);
        }
        return redirect('/admin/slider')->with('pesan', 'Slider berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink(storage_path('app/public/'.$slider->foto));
        Slider::destroy($slider->id);
        return redirect('/admin/slider')->with('pesan', 'Slider berhasil di hapus');
    }
}
