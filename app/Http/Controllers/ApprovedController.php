<?php

namespace App\Http\Controllers;

use App\Models\approved;
use App\Models\pengajuan;
use App\Http\Requests\StoreapprovedRequest;
use App\Http\Requests\UpdateapprovedRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approved = pengajuan::where('status', null)->latest()->get();
        return view('approved', [
            "title" => "Approved Inventory",
            "approved" => $approved
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
     * @param  \App\Http\Requests\StoreapprovedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapprovedRequest $request)
    {
        $approved = $request->validate([
            'kodepengajuan' => 'required',
            'IDbarang' => 'required',
            'namapengaju' => 'required',
            'namabarang' => 'required',
            'jumlahbarang' => 'required',
            'tanggalpengajuan' => 'required',
            'status' => 'required',
        ]);

        approved::create($approved);

        return redirect('approved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function show(approved $approved)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function edit(approved $approved)
    {
        // return view('editbarangsampai', [
        //     "title" => "edit",
        //     'approved' => $approved
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapprovedRequest  $request
     * @param  \App\Models\approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapprovedRequest $request, approved $approved)
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

        // approved::where('id', $approved->id)
        //     ->update($update);

        // return redirect('editbarangsampai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\approved  $approved
     * @return \Illuminate\Http\Response
     */
    public function destroy(approved $approved)
    {
        //
    }


    public function setuju(pengajuan $pengajuan)
    {

        pengajuan::where('id', $pengajuan->id)->update([
            'status' => 'Setuju'
        ]);
        return redirect('/approved')->with('success', 'Data Telah Disetujui');
    }

    public function tolak(pengajuan $pengajuan)
    {

        pengajuan::where('id', $pengajuan->id)->update([
            'status' => 'Tolak'
        ]);
        return redirect('/approved')->with('failed', 'Data Ditolak!');
    }
}