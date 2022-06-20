<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function product()
    {
        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
                ->get(['products.id as id', 'products.name as name', 'products.desc as desc',
                        'products.image as image', 'products.price as price', 'products.weigth as weigth',
                        'categories.name as categories', 'products.stok as stok']);
        return response([
            'message' => 'List Products',
            'data' => $product
        ], 200);
    }

    public function categories()
    {
        $categories = Category::all();

        return response([
            'message' => 'List Kategori',
            'data' => $categories
        ], 200);
    }
}
