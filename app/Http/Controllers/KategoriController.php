<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.kategori', ['kategoris' => $kategoris]);
    }

    public function add()
    {
        return view('kategori.tambah_kategori');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|unique:kategoris|max:255',
        ]);

        $kategori = Kategori::create($request->all());
        return redirect('kategori')->with('status', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('kategori.edit_kategori', ['kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|unique:kategoris|max:255',
        ]);

        $kategori = Kategori::where('id', $id)->first();
        $kategori->update($request->all());
        return redirect('kategori')->with('status', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('kategori.delete_kategori', ['kategori' => $kategori]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        $kategori->delete();
        return redirect('kategori')->with('status', 'Kategori berhasil dihapus');
    }
}