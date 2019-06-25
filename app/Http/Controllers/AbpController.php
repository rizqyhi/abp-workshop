<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbpController extends Controller
{
    public function getMahasiswa(Request $request, $nim)
    {
        $userAgent = $request->header('User-Agent');

        // return 'NIM: '.$nim.' mengakses dengan '.$userAgent;
        $data = [
            'nim' => $nim,
            'user_agent' => $userAgent,
            'isi_pesan' => session('pesan')
        ];

        return response()->json($data);
    }
}
