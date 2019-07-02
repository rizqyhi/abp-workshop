<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AngkatanMin;

class SimpanMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nim' => 'required|digits:3',
            'nama' => 'required|min:3',
            'angkatan' => ['required', 'integer', new AngkatanMin],
            'address' => 'required',
            'avatar' => 'required|image|max:1024'
        ];
    }
}
