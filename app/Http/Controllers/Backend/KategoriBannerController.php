<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner\KategoriBanner;
use Illuminate\Http\Request;

class KategoriBannerController extends Controller
{
    public function index()
    {
        $categories = KategoriBanner::all();
        return view('backend.admin.banner-kategori.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.admin.banner-kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        KategoriBanner::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('kategori-banner-index')->with('success', 'Kategori  Berhasil Ditambahkan!');
    }
    public function edit($id){
        $category = KategoriBanner::findOrFail($id);
        return view('backend.admin.banner-kategori.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
        ]);
        $category = KategoriBanner::findOrFail($id);
        $category->update([
            'name'=> $request->input('name'),
        ]);

        return redirect()->route('kategori-banner-index')->with('success', 'Kategori Banner berhasil diperbarui');
    }
    public function destroy($id){
        $category = KategoriBanner::findOrFail($id);
        $category->delete();
        return redirect()->route('kategori-banner-index')->with('success', 'Kategori Banner berhasil dihapus');
    }
}
