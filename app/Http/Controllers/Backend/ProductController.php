<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product\CategoryProduct;
use App\Models\Backend\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = CategoryProduct::all();
        return view('backend.admin.product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'nullable',
                'brand_id' => 'nullable',
                'product_code' => 'nullable',
                'discount' => 'nullable',
                'tax' => 'nullable',
                'favorite' => 'nullable',
                'short_description' => 'nullable',
                'long_description' => 'nullable',
                'selling_price' => 'nullable',
                'purchase_price' => 'nullable',
                'stock' => 'required',
                'image' => 'nullable',
            ]);

            Product::create($request->all());

            return redirect()->route('product-index')->with('success', 'Produk berhasil ditambahkan');
        }catch(\Exception $e){
            // return redirect()->route('product-index')->with('error', $e->getMessage());
            dd($e->getMessage());
        }
    }
    public function edit(Product $product)
    {
        $categories = CategoryProduct::all();
        return view('backend.admin.product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_code' => 'required',
            'discount' => 'required',
            'tax' => 'required',
            'favorite' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }

}
