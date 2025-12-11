<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('categories.categories-entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|file|mimes:jpg,jpeg,png'
        ]);

        $img = $request->file('gambar');
        $nama_file = time().'_'.$img->getClientOriginalName();
        $img->move(public_path('assets/thumbnail'), $nama_file);

        Category::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $nama_file,
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.categories-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'file|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('gambar')) {

            // hapus file lama
            if (File::exists(public_path('assets/thumbnail/'.$category->gambar))) {
                File::delete(public_path('assets/thumbnail/'.$category->gambar));
            }

            $img = $request->file('gambar');
            $nama_file = time().'_'.$img->getClientOriginalName();
            $img->move(public_path('assets/thumbnail'), $nama_file);

            $category->gambar = $nama_file;
        }

        $category->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        return view('categories.categories-hapus', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        // hapus gambar
        if (File::exists(public_path('assets/thumbnail/'.$category->gambar))) {
            File::delete(public_path('assets/thumbnail/'.$category->gambar));
        }

        $category->delete();

        return redirect()->route('category.index');
    }
}
