<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use App\Http\Requests\StorepengajuanRequest;
use App\Http\Requests\UpdatepengajuanRequest;
use App\Models\barang;

use function PHPUnit\Framework\assertNotNull;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = pengajuan::all();
        $masterBarang = barang::select('IDbarang', 'namabarang')->get();
        $kodePengajuan1 = "PGJN001";
        if (pengajuan::where('kodepengajuan', $kodePengajuan1)->exists()) {
            $kodePengajuan = pengajuan::max('kodepengajuan');
            $kodePengajuan++;
        } else {
            $kodePengajuan = $kodePengajuan1;
        }

        return view('pengajuan', [
            "title" => "Pengajuan",
            "pengajuan" => $pengajuan,
            "kodePengajuan" => $kodePengajuan,
            "masterBarang" => $masterBarang
        ]);
    }

    public function laporan()
    {
        $laporan = pengajuan::whereNotNull('status')->latest()->get();
        return view('laporan', [
            "title" => "laporan",
            "laporan" => $laporan
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
     * @param  \App\Http\Requests\StorepengajuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepengajuanRequest $request)
    {
        $i = 0;
        $a = 0;
        foreach ($request->IDbarang as $row) {
            if ($row != null) {
                $namabarang = barang::where('IDbarang', $row)->value('namabarang');
                pengajuan::create([
                    'kodepengajuan' => $request['kodepengajuan'],
                    'IDbarang' => $row,
                    'namapengaju' => auth()->user()->nama,
                    'namabarang' => $namabarang,
                    'jumlahbarang' => $request->jumlahbarang[$a],
                    'tanggalpengajuan' => date('Y-m-d'),

                ]);
            }

            $i++;
            $a++;
        }
        return redirect('/pengajuan')->with('success', 'Pengajuan Berhasil');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengajuan $pengajuan)
    {
        // return view('editbarangsampai', [
        //     "title" => "edit",
        //     'pengajuan' => $pengajuan
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepengajuanRequest  $request
     * @param  \App\Models\pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepengajuanRequest $request, pengajuan $pengajuan)
    {
        // $update = $request->validate([
        //     'kodepengajuan' => 'required',
        //     'IDbarang' => 'required',
        //     'namapengaju' => 'required',
        //     'namabarang' => 'required',
        //     'jumlahbarang' => 'required',
        //     'tanggalpengajuan' => 'required',
        //     'jumlahbarangsampai' => 'required',
        // ]);

        // pengajuan::where('id', $pengajuan->id)
        //     ->update($update);

        // return redirect('editbarangsampai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengajuan $pengajuan)
    {
        //
    }
}