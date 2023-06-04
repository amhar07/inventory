<?php

namespace Database\Seeders;

use App\Models\barangmasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\barang;
use App\Models\pengajuan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Amhar Izlal Pane",
            "nip" => "1",
            "password" => bcrypt('1'),
            "role" => "kepsek",
            "nomorTelepon" => "085691482068",
            "alamat" => "Kp. Rancadulang Rt04/01 Kelurahan Margasari",
        ]);

        User::create([
            "nama" => "Ambar Wati",
            "nip" => "2",
            "password" => bcrypt('2'),
            "role" => "sekretaris",
            "nomorTelepon" => "085637845265",
            "alamat" => "Kp. Rancadulang Rt04/01 Kelurahan Margasari",
        ]);

        User::create([
            "nama" => "Maruf Hafiz",
            "nip" => "3",
            "password" => bcrypt('3'),
            "role" => "operator",
            "nomorTelepon" => "085691482068",
            "alamat" => "Kp. Rancadulang Rt04/01 Kelurahan Margasari",
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // user::create([
        //     'nama' => 'syahna sadika',
        //     'nip' => '121212',
        //     'password' => bcrypt('1212'),
        //     'role' => 'sekertaris',
        //     'nomorTelepon' => '00000000',
        //     'alamat' => 'jl larangan',
        //     'foto' => 'default.png',
        // ]);

        // user::create([
        //     'nama' => 'syahna sadika1',
        //     'nip' => '1212121',
        //     'password' => bcrypt('12121'),
        //     'role' => 'sekertaris',
        //     'nomorTelepon' => '000000001',
        //     'alamat' => 'jl larangan1',
        //     'foto' => '/img/1.png',
        // ]);

        // barang::create([
        //     'IDbarang' => '001',
        //     'namabarang' => 'Meja',
        //     'stok' => '100',
        // ]);
        // barang::create([
        //     'IDbarang' => '002',
        //     'namabarang' => 'Kursi',
        //     'stok' => '50',
        // ]);

        // barangmasuk::create([
        //     'IDbarang' => '001',
        //     'nama' => 'Meja',
        //     'asal' => 'yayasan',
        //     'jumlah' => '100',
        //     'tanggal' => date('Y-m-d'),
        // ]);

        // barangmasuk::create([
        //     'IDbarang' => '002',
        //     'nama' => 'Kursi',
        //     'asal' => 'yayasan',
        //     'jumlah' => '50',
        //     'tanggal' => date('Y-m-d'),
        // ]);

        // pengajuan::create([
        //     'kodepengajuan' => 'PGJN001',
        //     'IDbarang' => '001',
        //     'namapengaju' => 'admin',
        //     'namabarang' => 'Meja',
        //     'jumlahbarang' => '10',
        //     'status' => 'diajukan',
        //     'tanggalpengajuan' => date('Y-m-d')
        // ]);
    }
}