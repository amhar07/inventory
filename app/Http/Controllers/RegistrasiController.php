<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Http\Requests\StoreRegistrasiRequest;
use App\Http\Requests\UpdateRegistrasiRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrasi', [
            "title" => "Registrasi"
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
     * @param  \App\Http\Requests\StoreRegistrasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrasiRequest $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'nip' => 'required|numeric',
            'role' => 'required',
            'nomorTelepon' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'nama' => $validatedData['nama'],
            'nip' => $validatedData['nip'],
            'role' => $validatedData['role'],
            'nomorTelepon' => $validatedData['nomorTelepon'],
            'alamat' => $validatedData['alamat'],
            'password' => bcrypt($validatedData['password'])
        ]);

        return redirect('/registrasi')->with('success', 'Registrasi Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // dd(User::where('id', auth()->user()->id)->get());
        return view('profil', [
            "user" => User::where('id', auth()->user()->id)->get(),
            "title" => ""
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrasiRequest  $request
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrasiRequest $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'role' => 'required',
            'nomorTelepon' => 'required',
            'alamat' => 'required',
        ]);

        if ($request->file('foto')) {
            if (empty($user->foto)) {
                $validatedData['foto'] = $request->file('foto')->store('foto-user');
            } else {
                $validatedData['foto'] = $request->file('foto')->store('foto-user');
                Storage::delete($user->foto);
            }
        }

        User::where('id', auth()->user()->id)
            ->update($validatedData);

        return redirect('profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrasi $registrasi)
    {
        //
    }
}