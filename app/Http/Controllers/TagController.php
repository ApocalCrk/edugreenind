<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();
        return view('_admin.tag.index', compact('tag'));
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
            'nama_tag' => 'required'
        ]);
        $data = $request->all();
        $seo = strtolower($data['nama_tag']);
        $data['tag_seo'] = str_replace(' ', '-', $seo);
        Tag::create($data);
        return redirect('/admin/tag')->with('pesan', 'Tag/Label berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('_admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'nama_tag' => 'required'
        ]);
        $data = $request->all();
        if($data['nama_tag'] != $tag->nama_tag){
            $seo = strtolower($data['nama_tag']);
            $data['tag_seo'] = str_replace(' ', '-', $seo);
            Tag::find($tag->id)->update($data);
        }else{
            Tag::find($tag->id)->update($data);
        }
        return redirect('/admin/tag')->with('pesan', 'Tag / Label berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        Tag::destroy($tag->id);
        return redirect('/admin/tag')->with('pesan', 'Tag / Label berhasil di hapus');
    }
}
