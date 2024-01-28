<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner\Banner;
use App\Models\Backend\Banner\KategoriBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('backend.admin.banner.index', compact('banners'));
    }
    public function create()
    {
        $categories = KategoriBanner::all();
        $banner = new Banner();
        return view('backend.admin.banner.create', compact('categories', 'banner'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'status'=> 'required|boolean',
        ]);
        $banner = new Banner;
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/banner/', $filename);
            $banner->image_path = $filename;
        };
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->category_id = $request->input('category_id');
        $banner->status = $request->input('status');
        $banner->save();

        return redirect()->route('banner-index')->with('success', 'Banner created successfully!');
    }
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('backend.admin.banner.show', compact('banner'));
    }
    public function edit($id)
    {
        $banner = Banner::find($id);
        $categories = KategoriBanner::all();
        return view('backend.admin.banner.edit', compact('banner', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|mimes:png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'status'=> 'required|boolean',
        ]);
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/banner/', $filename);
            $banner->image_path = $filename;
        };
        $banner->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'status'=> $request->input('status'),
        ]);
        return redirect()->route('banner-index')->with('success', 'Banner berhasil diperbaharui');
    }
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('banner-index')->with('success', 'Banner Berhasil dihapus');
    }
}
