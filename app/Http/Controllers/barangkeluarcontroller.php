<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barangkeluar;
use App\Models\bukuinduk;
use Illuminate\Http\Request;

class barangkeluarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = barangkeluar::all();
        $idMasterBarang = barang::all();
        return view('barang-keluar', [
            "title" => "Barang Keluar",
            "idMasterBarang" => $idMasterBarang,
            "barangkeluar" => $barangkeluar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangkeluar = $request->validate([
            'IDbarang' => 'required',
            'jumlahbarangkeluar' => 'required',
            'peminta' => 'required',
            'tanggalbarangkeluar' => 'required',
        ]);
        $barang = barang::where('IDbarang', $request['IDbarang'])->get()[0];

        if ($barang->stok <= $request->jumlahbarangkeluar) {
            return redirect('barang-keluar')->with('error', 'jumlah barang yang keluar lebih dari stok yang ada');
        } else {
            $barang->stok -= $request->julahbarangkeluar;
            $barang->save();
        }

        $barangkeluar['namabarang'] = $barang->namabarang;
        barangkeluar::create($barangkeluar);
        barang::where('id', $barang->id)->update(['stok' => $barang->stok - $barangkeluar['jumlahbarangkeluar']]);

        return redirect('barang-keluar')->with('success', 'Data Barang Keluar Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(barangkeluar $barangkeluar)
    {
        return view('editbarangkeluar', [
            "title" => "edit",
            'barangkeluar' => $barangkeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barangkeluar $barangkeluar)
    {
        $update = $request->validate([
            'IDbarang' => 'required',
            'namabarang' => 'required',
            'jumlahbarangkeluar' => 'required',
            'peminta' => 'required',
            'tanggalbarangkeluar' => 'required',
        ]);

        barangkeluar::where('id', $barangkeluar->id)
            ->update($update);

        return redirect('barang-keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(barangkeluar $barangkeluar)
    {
        barangkeluar::destroy($barangkeluar->id);
        return redirect('barangkeluar');
    }
}