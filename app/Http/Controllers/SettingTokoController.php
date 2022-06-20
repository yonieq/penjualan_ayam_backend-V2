<?php

namespace App\Http\Controllers;

use App\Models\SettingToko;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $toko = SettingToko::all();
        return view('admin.settingtoko.index', compact('toko'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $toko = SettingToko::findOrFail($id);
        return view('admin.settingtoko.edit', compact('toko'));
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
        //
        $this->validate($request, [
            'nama_toko' => 'required',
            'pemilik_toko' => 'required',
        ]);

        $toko = SettingToko::findOrFail($id);

        $toko->update([
            'nama_toko' => $request->nama_toko,
            'pemilik_toko' => $request->pemilik_toko,
        ]);

        if ($toko) {
            return redirect()
                ->route('settingtoko.index')
                ->with([
                    Alert::success('Yapps!', 'Data telah berhasil diubah')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Oppss!', 'Gagal mengubah data, coba lagi')
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
