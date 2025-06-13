<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.buku', ['bukus' => $bukus]);
    }

    public function add()
    {
        $kategoris = Kategori::all();
        return view('buku.tambah_buku', ['kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|unique:bukus|max:255',
            'judul' => 'required|max:255',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategoris.*' => 'exists:kategoris,id'
        ]);

        $newName = null;
        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->judul . '-' . now()->timestamp . '.' . $extension;
            $request->file('cover')->storeAs('cover', $newName);
            $validated['cover'] = $newName;
        } 

        $buku = Buku::create($validated);
        $buku->kategoris()->sync($validated['kategoris'] ?? []);
        return redirect('buku')->with('status', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::where('id', $id)->first();
        $kategoris = Kategori::all();
        return view('buku.edit_buku', ['kategoris' => $kategoris, 'buku' => $buku]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|max:255|unique:bukus,kode_buku,' . $id,
            'judul' => 'required|max:255',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategoris.*' => 'exists:kategoris,id'
        ]);

        $buku = Buku::findOrFail($id);

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $newName = $request->judul . '-' . now()->timestamp . '.' . $extension;
            $request->file('cover')->storeAs('cover', $newName);

            if ($buku->cover && \Storage::exists('cover/' . $buku->cover)) {
                \Storage::delete('cover/' . $buku->cover);
            }

            $validated['cover'] = $newName;
        } else {
            $validated['cover'] = $buku->cover;
        }

        $buku->update([
            'kode_buku' => $validated['kode_buku'],
            'judul' => $validated['judul'],
            'cover' => $validated['cover'],
        ]);

        $buku->kategoris()->sync($validated['kategoris'] ?? []);
        return redirect('buku')->with('status', 'Buku berhasil diubah');
    }

    public function delete($id)
    {
        $buku = Buku::where('id', $id)->first();
        return view('buku.delete_buku', ['buku' => $buku]);
    }

    public function destroy($id)
    {
        $buku = Buku::where('id', $id)->first();
        $buku->delete();
        return redirect('buku')->with('status', 'buku berhasil dihapus');
    }

}