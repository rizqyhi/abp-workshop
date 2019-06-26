<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = [
            ['nim' => 11, 'nama' => 'John Lennon', 'angkatan' => 2016],
            ['nim' => 12, 'nama' => 'Curt Cobain', 'angkatan' => 2016],
            ['nim' => 13, 'nama' => 'Alexander Supertramp', 'angkatan' => 2015],
            ['nim' => 14, 'nama' => 'Iron Man', 'angkatan' => 2017],
            ['nim' => 15, 'nama' => 'Thor Son of Odin', 'angkatan' => 2017]
        ];
    }

    public function showAll()
    {
        // return view('mahasiswa_list', [
        //     'mahasiswa' => $this->mahasiswa
        // ]);

        return view('mahasiswa_list')
            ->with([
                'mahasiswa' => $this->mahasiswa
            ]);
    }

    public function showMahasiswa($nim)
    {
        $mahasiswa = [
            'nim' => $nim,
            'nama' => 'John Doe',
            'angkatan' => 2017
        ];

        return view('mahasiswa_detail', [
            'mahasiswa' => $mahasiswa
        ]);
    }
}
