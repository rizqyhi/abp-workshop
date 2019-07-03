<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeEmail;

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

        Mail::to($request->email)
            ->send(new SubscribeEmail);

        return redirect()->back()
            ->with('pesan', 'Terima kasih sudah mendaftarkan email kamu');
    }
}
