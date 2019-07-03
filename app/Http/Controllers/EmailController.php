<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email'
        ]);

        return redirect()->back()
            ->with('pesan', 'Terima kasih sudah mendaftarkan email kamu');
    }
}
