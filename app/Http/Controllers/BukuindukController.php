<?php

namespace App\Http\Controllers;

use App\Models\bukuinduk;
use App\Models\barang;
use App\Http\Requests\StorebukuindukRequest;
use App\Http\Requests\UpdatebukuindukRequest;

class BukuindukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukuinduk = bukuinduk::all();
        $barang = barang::all();
        return view('bukuinduk', [
            "title" => "Buku Induk",
            "bukuinduk" => $bukuinduk,
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
     * @param  \App\Http\Requests\StorebukuindukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebukuindukRequest $request)
    {
        $bukuinduk = $request->validate([
            'IDbarang' => 'required',
            'jumlahbarang' => 'required',
            'keterangan' => 'required',
            'tanggalpencatatan' => 'required',
        ]);

        bukuinduk::create($bukuinduk);
        return redirect('bukuinduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bukuinduk  $bukuinduk
     * @return \Illuminate\Http\Response
     */
    public function show(bukuinduk $bukuinduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bukuinduk  $bukuinduk
     * @return \Illuminate\Http\Response
     */
    public function edit(bukuinduk $bukuinduk)
    {
        return view('editbarang', [
            "title" => "edit",
            'bukuinduk' => $bukuinduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebukuindukRequest  $request
     * @param  \App\Models\bukuinduk  $bukuinduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebukuindukRequest $request, bukuinduk $bukuinduk)
    { {
            $update = $request->validate([
                'IDbarang' => 'required',
                'keterangan' => 'required',
                'jumlahbarang' => 'required',
                'tanggalpencatatan' => 'required',
            ]);

            bukuinduk::where('id', $bukuinduk->id)->update($update);

            return redirect('bukuinduk');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bukuinduk  $bukuinduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(bukuinduk $bukuinduk)
    {
        bukuinduk::destroy($bukuinduk->id);
        return redirect('bukuinduk');
    }
}