<?php

namespace App\Http\Controllers;

use App\Post;
use App\Kategori;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('_admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('_admin.post.create', compact('kategori', 'tag'));
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
            'id_kat' => 'required',
            'headline' => 'required',
            'isi_post' => 'required',
            'gambar' => 'required|image|mimes: jpg,jpeg,png',
            'publish' => 'required'
        ]);
        $data = $request->all();
        $post = Post::where('headline', 'Y')->count();
        if($post == 3 and $data['headline'] == 'Y'){
            return redirect('/admin/post/create')->with('pesan_headline', 'Headline sudah mencapai batas maksimum');
        }else{
            $seo = strtolower($data['judul']);
            $data['judul_seo'] = str_replace(' ', '-', $seo);
            $data['username'] = Auth::user()->name;
            if(!isset($data['tag'])){
                $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                Post::create($data);
            }else{
                $data['tag'] = implode(',', $data['tag']);
                $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                Post::create($data);
            }
            return redirect('/admin/post')->with('pesan', 'Posting berhasil di upload');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $tag_data = explode(',', $post->tag);
        return view('_admin.post.edit', compact('post', 'kategori', 'tag', 'tag_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'id_kat' => 'required',
            'headline' => 'required',
            'isi_post' => 'required',
            'gambar' => 'image|mimes: jpg,jpeg,png',
            'publish' => 'required'
        ]);
        $data = $request->all();
        $post_c = Post::where('headline', 'Y')->count();
        $seo = strtolower($data['judul']);
        $data['judul_seo'] = str_replace(' ', '-', $seo);
        $data['username'] = Auth::user()->name;
        if(!isset($data['tag'])){
            if($post_c == 3 and $data['headline'] == 'Y'){
                if($data['headline'] == $post->headline){
                    if(!isset($data['gambar'])){
                        Post::find($post->id)->update($data);
                    }else{
                        unlink(storage_path('app/public/'.$post->gambar));
                        $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                        Post::find($post->id)->update($data);
                    }
                }else{
                    return redirect('/admin/post/'.$post->id.'/edit')->with('pesan_headline', 'Headline sudah mencapai batas maksimum');
                }
            }else{
                if(!isset($data['gambar'])){
                    Post::find($post->id)->update($data);
                }else{
                    unlink(storage_path('app/public/'.$post->gambar));
                    $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                    Post::find($post->id)->update($data);
                }
            }
        }else{
            $data['tag'] = implode(',', $data['tag']);
            if($post_c == 3 and $data['headline'] == 'Y'){
                if($data['headline'] == $post->headline){
                    if(!isset($data['gambar'])){
                        Post::find($post->id)->update($data);
                    }else{
                        unlink(storage_path('app/public/'.$post->gambar));
                        $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                        Post::find($post->id)->update($data);
                    }
                }else{
                    return redirect('/admin/post/'.$post->id.'/edit')->with('pesan_headline', 'Headline sudah mencapai batas maksimum');
                }
            }else{
                if(!isset($data['gambar'])){
                    Post::find($post->id)->update($data);
                }else{
                    unlink(storage_path('app/public/'.$post->gambar));
                    $data['gambar'] = $request->file('gambar')->store('asset/post', 'public');
                    Post::find($post->id)->update($data);
                }
            }
        }
        return redirect('/admin/post')->with('pesan', 'Posting berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        unlink(storage_path('app/public/'.$post->gambar));
        Post::destroy($post->id);
        return redirect('/admin/post')->with('pesan', 'Posting berhasil di hapus');
    }
}
