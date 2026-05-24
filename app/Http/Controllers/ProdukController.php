<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * * method untuk menampilkan data.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_produk' => 'required',
            'harga_jual' => 'required',
            'satuan' => 'required'
        ]);

        $produk = Produk::create($validate);
        if($produk) {
            return redirect()->route('produk.index')->with('success','Data berhasil ditambahkan!');
        } else {
            return redirect()->route('produk.index')->with('error','Data gagal ditambahkan!');
        }
    }

    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.create', compact('produk'));
    }

    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);
        $validate = $request->validate([
            'nama_produk' => 'required',
            'harga_jual' => 'required',
            'satuan' => 'required'
        ]);

        $produk->update($validate);
        return redirect()->route('produk.index')->with('success','Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();

        return redirect()->route('produk.index')->with('success','Data berhasil dihapus!');
    }

    
}
