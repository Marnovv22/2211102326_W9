<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'genre' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric|min:0'
        ]);

        Buku::create($request->only(['judul', 'penulis', 'genre', 'tahun_terbit', 'stok']));
        
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $bukus = Buku::all();
        $buku = Buku::findOrFail($id);
        return view('buku.index', compact('buku', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'genre' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric|min:0'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/');
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect('/');
    }
}
