<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('level', '!=', 'User')->get();
        return view('_admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ga di pakai
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'telp' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
            'foto' => 'image',
            'level' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if($request->foto != null){
            $data['foto'] = $request->file('foto')->store('asset/foto_profil', 'public');
            User::create($data);
        }else{
            User::create($data);
        }
        return redirect('/admin/pengguna')->with('pesan', 'Pengguna berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        // Ga Di pakai
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        return view('_admin.user.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'telp' => 'required|numeric',
            'foto' => 'image||mimes:jpg,png,jpeg',
            'level' => 'required'
        ]);
        $data = $request->all();
        if($request->foto != null) {
            if($pengguna->foto == '/asset/foto_profil/default.png' or $pengguna->foto == null){
                $data['foto'] = $request->file('foto')->store('asset/foto_profil', 'public');
                User::find($pengguna->id)->update($data);
            }else{
                $data['foto'] = $request->file('foto')->store('asset/foto_profil', 'public');
                unlink(storage_path('app/public/'.$pengguna->foto));
                User::find($pengguna->id)->update($data);
            }
        }else{
            User::find($pengguna->id)->update($data);
        }
        return redirect('/admin/pengguna')->with('pesan', 'Data pengguna berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        if($pengguna->foto == '/asset/foto_profil/default.png' or $pengguna->foto == null){
            User::destroy($pengguna->id);
        }else{
            unlink(storage_path('app/public/'.$pengguna->foto));
            User::destroy($pengguna->id);
        }
        return redirect('/admin/pengguna')->with('pesan', 'Data pengguna berhasil dihapus');
    }
}
