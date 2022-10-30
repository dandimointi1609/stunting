<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\models\Kecamatan;
use App\models\Puskes;




class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::get();
        $kecamatan = Kecamatan::get();
        $puskes = Puskes::get();


        return view('pengguna.index', compact('pengguna','kecamatan','puskes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request['password']),
            'level' => $request->level,
            'id_puskesmas' => $request->id_puskesmas,
        ]);
        return redirect('pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::findOrFail($id);

        return view('pengguna.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $puskes = Puskes::get();

        // return view('pengguna.edit', compact('item'));
        return view('editpengguna')->with([
            'item' => $item,
            'puskes' => $puskes

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->id_puskesmas = $request->id_puskesmas;
        $item->password = Hash::make  ($request['password']);
        $item->update();
        return redirect()->route('pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('pengguna.index');
    }
}
