<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product\CategoryProduct;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::all();

        return view('backend.admin.product-kategori.index', compact('categories'));
    }
    public function create()
    {
        $categories = CategoryProduct::all();
        return view('backend.admin.product-kategori.create', compact('categories'));
    }
    public function store(Request $request)
    {
       try{
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'parent_id' => 'nullable|exists:categories_product,id',
            'images' => 'nullable',
        ]);
        $categoryProduct = new CategoryProduct;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/product-category/', $filename);
            $categoryProduct->image_path = $filename;
        };
        $categoryProduct->name = $request->input('name');
        $categoryProduct->slug = $request->input('slug');
        $categoryProduct->status = $request->input('status');
        $categoryProduct->images = $request->input('images');
        $categoryProduct->save();
        // CategoryProduct::create($request->all());
        return redirect()->route('product-kategori-index')->with('success', 'Kategori Produk berhasil ditambahkan');
       }catch(\Exception $e){
        dd($e->getMessage());
       }
    }
    public function edit(CategoryProduct $id)
    {
        try {
            $category = CategoryProduct::findOrFail($id);
            $categories = CategoryProduct::all();
            return view('backend.admin.product-kategori.edit', compact('category','categories'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update(Request $request,  $id)
    {

        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'status' => 'required',
                'parent_id' => 'nullable',
                'images' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $category = CategoryProduct::findOrFail($id);

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/images/product-category/', $filename);
                $category->image_path = $filename;
            }

            $category->update([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'status' => $request->input('status'),
                'parent_id' => $request->input('parent_id'),
                // 'images' => $request->file('images'), // Remove this line, as 'images' is handled above
            ]);

            return redirect()->route('product-kategori-index')->with('success', 'Kategori Produk berhasil diperbarui');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function destroy($id){
        $category = CategoryProduct::findOrFail($id);
        $category->delete();
        return redirect()->route('product-kategori-index')->with('success', 'Kategori Banner berhasil dihapus');
    }
}
