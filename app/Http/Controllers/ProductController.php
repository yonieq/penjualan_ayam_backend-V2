<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->select('products.*', 'categories.name as nama_kategori')
                    ->get();
        $data = array(
            'products' => $products
        );
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'required',
            'price' => 'required',
            'weigth' => 'required',
            'category_id' => 'required',
            'stok' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        if ($input) {
            return redirect()
                ->route('product.index')
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
        $categories = Category::all();
        $products = Product::findorfail($id);
        return view('admin.product.edit', compact('products', 'categories'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'required',
            'price' => 'required',
            'weigth' => 'required',
            'category_id' => 'required',
            'stok' => 'required',
        ]);

        $products = Product::findOrFail($id);
        // $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $products['image'] = "$profileImage";
        }else{
            unset($products['image']);
        }

        $products->update([
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'weigth' => $request->weigth,
            'category_id' => $request->category_id,
            'stok' => $request->stok,
        ]);

        if ($products) {
            return redirect()
                ->route('product.index')
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
        $products = Product::findOrFail($id);
        $products->delete();

        if ($products) {
            return redirect()
                ->route('product.index')
                ->with([
                    Alert::success('Yapps!', 'Data telah berhasil dihapus')
                ]);
        } else {
            return redirect()
                ->route('product.index')
                ->with([
                    Alert::error('Oppss!', 'Gagal menghapus data, coba lagi')
                ]);
        }
    }
}
