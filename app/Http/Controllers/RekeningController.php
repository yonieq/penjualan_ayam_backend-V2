<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekenings = Rekening::all();
        return view('admin.rekening.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.rekening.create');
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
            'atas_nama' => 'required',
            'no_rekening' => 'required',
        ]);

        $rekenings = Rekening::create([
            'name' => $request->name,
            'atas_nama' => $request->atas_nama,
            'no_rekening' => $request->no_rekening,
        ]);

        if ($rekenings) {
            return redirect()
                ->route('rekening.index')
                ->with([
                    Alert::success('Yapps!', 'Data telah berhasil ditambahkan')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Oppss!', 'Gagal menambahkan data, coba lagi')
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
        $rekenings = Rekening::findOrFail($id);
        return view('admin.rekening.edit', compact('rekenings'));
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
            'atas_nama' => 'required',
            'no_rekening' => 'required',
        ]);

        $rekenings = Rekening::findOrFail($id);

        $rekenings->update([
            'name' => $request->name,
            'atas_nama' => $request->atas_nama,
            'no_rekening' => $request->no_rekening,
        ]);

        if ($rekenings) {
            return redirect()
                ->route('rekening.index')
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
        $rekenings = Rekening::findOrFail($id);
        $rekenings->delete();

        if ($rekenings) {
            return redirect()
                ->route('rekening.index')
                ->with([
                    Alert::success('Yapps!', 'Data telah berhasil dihapus')
                ]);
        } else {
            return redirect()
                ->route('rekening.index')
                ->with([
                    Alert::error('Oppss!', 'Gagal menghapus data, coba lagi')
                ]);
        }
    }
}
