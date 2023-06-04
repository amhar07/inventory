<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barangmasuk;
use App\Models\bukuinduk;
use Illuminate\Http\Request;

class barangmasukcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = barangmasuk::all();
        $idMasterBarang = barang::all();
        return view('barang-masuk', [
            "title" => "Barang Masuk",
            "idMasterBarang" => $idMasterBarang,
            "barangmasuk" => $barangmasuk,
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
        $barangmasuk = $request->validate([
            'IDbarang' => 'required',
            'asal' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);
        $barang = barang::where('IDbarang', $request['IDbarang'])->get()[0];

        $barangmasuk['nama'] = $barang->namabarang;
        barangmasuk::create($barangmasuk);
        barang::where('id', $barang->id)->update(['stok' => $barang->stok + $barangmasuk['jumlah']]);

        return redirect('barang-masuk')->with('success', 'Data Barang Masuk Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(barangmasuk $barangmasuk)
    {
        //
    }

    public function barnag(barangmasuk $barangmasuk)
    {
        $masuk = bukuinduk::where('status', 'masuk')->get();
        return view('barang-masuk', [
            "title" => "Barang Masuk",
            "barangmasuk" => $masuk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(barangmasuk $barangmasuk)
    {
        return view('editbarangmasuk', [
            "title" => "editbarangmasuk",
            'barangmasuk' => $barangmasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barangmasuk $barangmasuk)
    {
        $update = $request->validate([
            'IDbarang' => 'required',
            'nama' => 'required',
            'asal' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        barangmasuk::where('id', $barangmasuk->id)
            ->update($update);

        return redirect('barang-masuk');
    }

    // public function bukuinduk()
    // {
    //     $bukuinduk = barangmasuk::whereNotNull('status');
    //     return view('bukuinduk', [
    //         "title" => "bukuinduk",
    //         "bukuinduk" => $bukuinduk
    //     ]);
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(barangmasuk $barangmasuk)
    {
        barangmasuk::destroy($barangmasuk->id);
        return redirect('barangmasuk');
    }
}