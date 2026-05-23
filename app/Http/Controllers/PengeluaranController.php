<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    /**
     * * method untuk menampilkan data.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::orderBy('tanggal', 'desc')->get();
        return view('history.pengeluaran', compact('pengeluaran'));
    }

    /**
     * * method untuk menampilkan form.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'bahan'            => 'required|string|max:255',
            'tanggal'           => 'required|date',
            'jumlah'            => 'required|integer|min:1',
            'harga_satuan'      => 'required|numeric|min:0',
            'harga_total'       => 'required|numeric|min:0',
            'keterangan'        => 'nullable|string',
        ]);
        
        $pengeluaran = Pengeluaran::create($validate);
        if ($pengeluaran) {
            return redirect()->route('history.pengeluaran')->with('success', 'Data berhasil ditambahkan');
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
