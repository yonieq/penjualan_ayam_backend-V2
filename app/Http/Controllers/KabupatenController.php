<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kabupaten = Kabupaten::all();
        return view('admin.kabupaten.index', compact('kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kabupaten.create');
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
            'name',
        ]);

        $kabupaten = Kabupaten::create([
            'name' => $request->name,
        ]);

        if ($kabupaten){
            return redirect()
                ->route('kabupaten.index')
                ->with([
                    Alert::success('Yapps!', 'Data berhasil ditambahkan!')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Opps!', 'Gagal menambahkan data')
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
        $kabupaten = Kabupaten::findOrFail($id);
        return view('admin.kabupaten.edit', compact('kabupaten'));
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
            'name' => 'required'
        ]);

        $kabupaten = Kabupaten::findOrFail($id);

        $kabupaten->update([
            'name' => $request->name,
        ]);

        if ($kabupaten) {
            return redirect()
                ->route('kabupaten.index')
                ->with([
                    Alert::success('Yapps!', 'Data berhasil dirubah')
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    Alert::error('Oppss!', 'Gagal merubah data')
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
        $kabupaten = Kabupaten::findOrFail($id);
        $kabupaten->delete();

        if ($kabupaten) {
            return redirect()
                ->route('kabupaten.index')
                ->with([
                    Alert::success('Yappps!', 'Data berhasil dihapus')
                ]);
        } else {
            return redirect()
                ->route('kabupaten.index')
                ->with([
                    Alert::error('Oppss!', 'Gagal menghapus data')
                ]);
        }
    }
}
