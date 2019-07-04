<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showUsers()
    {
        $ch = curl_init('https://reqres.in/api/users');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return view('users_list')->with([
            'users' => json_decode($result)
        ]);
    }
}
