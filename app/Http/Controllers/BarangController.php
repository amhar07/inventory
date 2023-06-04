<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;
use App\Models\StockOpname;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return view('databarang', [
            "title" => "Data Barang",
            "barang" => $barang
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
     * @param  \App\Http\Requests\StorebarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebarangRequest $request)
    {
        $barang = $request->validate([
            'IDbarang' => 'required',
            'namabarang' => 'required',
            'stok' => 'required',
        ]);
        barang::create($barang);
        return redirect('/databarang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebarangRequest  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebarangRequest $request, barang $barang)
    { {
            $update = $request->validate([
                'IDbarang' => 'required',
                'namabarang' => 'required',
                'stok' => 'required',
            ]);

            barang::where('id', $barang->id)->update($update);

            return redirect('databarang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
    }

    public function cekStok()
    {
        $barang = barang::all();
        return view('cekStok', [
            "title" => "Penyesuaian Stok",
            "barang" => $barang
        ]);
    }

    public function cekStokUbah(UpdatebarangRequest $request)
    {

        if (!$request['stokFisik']) {
            return back()->with('failed', 'Data Stok Fisik Kosong');
        } else {
            $dataBarang = barang::where('IDbarang', $request['IDbarang'])->get()[0];
            $kodePengecekan1 = "STK001";
            if (StockOpname::where('kodePengecekan', $kodePengecekan1)->exists()) {
                $kodePengecekan = StockOpname::max('kodePengecekan');
                $kodePengecekan++;
            } else {
                $kodePengecekan = $kodePengecekan1;
            }
            StockOpname::create([
                'kodePengecekan' => $kodePengecekan,
                'IDbarang' => $dataBarang->IDbarang,
                'nama' => $dataBarang->namabarang,
                'jumlahSistem' => $request['stokSistem'],
                'jumlahFisik' => $request['stokFisik'],
                'tanggal' => date('Y-m-d'),
                'selisih' => abs($request['stokSistem'] - $request['stokFisik'])
            ]);
            barang::where('IDbarang', $request['IDbarang'])->update(['stok' => $request['stokFisik']]);
        }
        return redirect('databarang')->with('success', 'Data Barang Berhasil Diubah');
    }

    public function StockOpname()
    {
        $stockOpname = StockOpname::all();
        return view('StockOpname', [
            "title" => "Stock Opname",
            "stockOpname" => $stockOpname
        ]);
    }
}