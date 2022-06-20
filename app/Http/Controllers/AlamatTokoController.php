<?php

namespace App\Http\Controllers;

use App\Models\AlamatToko;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AlamatTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alamat_tokos = DB::table('alamat_tokos')
                    ->join('kabupatens', 'kabupatens.id', '=', 'alamat_tokos.kabupaten_id')
                    ->join('kecamatans', 'kecamatans.id', '=', 'alamat_tokos.kecamatan_id')
                    ->select('alamat_tokos.*', 'kecamatans.name as nama_kecamatan', 'kabupatens.name as nama_kabupaten' )
                    ->get();
        $data = array(
            'alamat_tokos' => $alamat_tokos
        );
        return view('admin.alamat_toko.index', $data);
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
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $toko = AlamatToko::findOrFail($id);
        return view('admin.alamat_toko.edit', compact('toko', 'kabupaten', 'kecamatan'));
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
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'detail' => 'required',
        ]);

        $toko = AlamatToko::findOrFail($id);
        // $input = $request->all();

        $toko->update([
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id,
            'detail' => $request->detail,
        ]);

        if ($toko) {
            return redirect()
                ->route('alamat_toko.index')
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
