<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kecamatan = DB::table('kecamatans')
                        ->join('kabupatens', 'kecamatans.kabupaten_id', '=', 'kabupatens.id')
                        ->select('kecamatans.*', 'kabupatens.name as kabupaten')
                        ->get();
        return view('admin.kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kabupaten = Kabupaten::all();
        return view('admin.kecamatan.create', compact('kabupaten'));
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
        $this->validate($request, [
            'name' => 'required',
            'kabupaten_id' => 'required',
            'ongkir' => 'required'
        ]);

        $kecamatan = Kecamatan::create([
            'name' => $request->name,
            'kabupaten_id' => $request->kabupaten_id,
            'ongkir' => $request->ongkir
        ]);

        if ($kecamatan) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    Alert::success('Yapps!', 'Data berhasil ditambahkan')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Oppss!', 'Gagal menambahkan data')
                ]);
        }
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
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit', compact('kecamatan', 'kabupaten'));
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
            'name' => 'required',
            'kabupaten_id' => 'required',
            'ongkir' => 'required'
        ]);

        $kecamatan = Kecamatan::findOrFail($id);

        $kecamatan->update([
            'name' => $request->name,
            'kabupaten_id' => $request->kabupaten_id,
            'ongkir' => $request->ongkir
        ]);

        if ($kecamatan) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    Alert::success('Yappss!', 'Data berhasil dirubah')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Opps!', 'Gagal merubah data')
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        if ($kecamatan) {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    Alert::success('Yapps!', 'Data berhasil dihapus')
                ]);
        } else {
            return redirect()
                ->route('kecamatan.index')
                ->with([
                    Alert::error('Oppss!', 'Gagal menghapus data')
                ]);
        }
    }
}
