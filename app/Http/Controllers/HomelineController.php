<?php

namespace App\Http\Controllers;

use App\HomeLine;
use Illuminate\Http\Request;

class HomelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeline = HomeLine::all();
        return view('_admin.homeline.index', compact('homeline'));
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
            'icon' => 'required|image',
        ]);
        $data = $request->all();
        $homeline = HomeLine::where('aktif', 'Y')->count();
        $data['icon'] = $request->file('icon')->store('asset/icon', 'public');
        if($homeline > 3){
            $data['aktif'] = 'N';
            HomeLine::create($data);
        }else{
            $data['aktif'] = 'Y';
            HomeLine::create($data);
        }
        return redirect('/admin/homeline')->with('pesan', 'Fitur Beranda berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeLine  $homeline
     * @return \Illuminate\Http\Response
     */
    public function show(HomeLine $homeline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeLine  $homeline
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeLine $homeline)
    {
        return view('_admin.homeline.edit', compact('homeline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeLine  $homeline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeLine $homeline)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'icon' => 'image',
        ]);
        $data = $request->all();
        $homeline_c = HomeLine::where('aktif', 'Y')->count();
        if($homeline_c > 3 and $data['aktif'] == 'Y'){
            if($data['aktif'] == $homeline->aktif){
                if(!isset($data['icon'])){
                    HomeLine::find($homeline->id)->update($data);
                }else{
                    unlink(storage_path('app/public/'.$homeline->icon));
                    HomeLine::find($homeline->id)->update($data);
                    $data['icon'] = $request->file('icon')->store('asset/homeline', 'public');
                }
            }else{
                return redirect('/admin/homeline')->with('pesan_limit', 'Aktif Sudah mencapai maksimum');
            }
        }else{
            if(!isset($data['icon'])){
                HomeLine::find($homeline->id)->update($data);
            }else{
                unlink(storage_path('app/public/'.$homeline->icon));
                $data['icon'] = $request->file('icon')->store('asset/homeline', 'public');
                HomeLine::find($homeline->id)->update($data);
            }
        }
        return redirect('/admin/homeline')->with('pesan', 'Fitur Beranda berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeLine  $homeline
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeLine $homeline)
    {
        unlink(storage_path('app/public'.$homeline->icon));
        HomeLine::Destroy($homeline->id);
        return redirect('/admin/homeline')->with('pesan', 'Fitur Beranda berhasil di hapus');
    }
}
