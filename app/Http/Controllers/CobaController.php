<?php

namespace App\Http\Controllers;

use App\Models\coba;
use App\Http\Requests\StorecobaRequest;
use App\Http\Requests\UpdatecobaRequest;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorecobaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecobaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function show(coba $coba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function edit(coba $coba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecobaRequest  $request
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecobaRequest $request, coba $coba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coba  $coba
     * @return \Illuminate\Http\Response
     */
    public function destroy(coba $coba)
    {
        //
    }
}
