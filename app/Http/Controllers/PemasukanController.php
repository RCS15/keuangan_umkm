<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;

class PemasukanController extends Controller
{
    /**
     * method untuk menampilakan data
     */
    public function index()
    {
        $pemasukan = Pemasukan::orderBy('tanggal', 'desc')->get();
        return view('history.pemasukan', compact('pemasukan'));
    }

    /**
     * method untuk menampilkan form.
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'produk'            => 'required|string|max:255',
            'tanggal'           => 'required|date',
            'jumlah'            => 'required|integer|min:1',
            'harga_per_bungkus' => 'required|numeric|min:0',
            'total'             => 'required|numeric|min:0',
            'keterangan'        => 'nullable|string',
        ]);
        
        $pemasukan = Pemasukan::create($validate);
        if ($pemasukan) {
            return redirect()->route('history.pemasukan')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->back()->with('error', 'Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
