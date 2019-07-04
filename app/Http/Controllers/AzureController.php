<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AzureController extends Controller
{
    public function translate()
    {
        return view('translate');
    }

    public function processTranslate(Request $request)
    {
        $data = $this->validate($request, [
            'text' => 'required',
            'to' => 'required'
        ]);

        // $result = $data['text'];

        $client = new Client;
        $res = $client->post('https://api.cognitive.microsofttranslator.com/translate', [
            'query' => [
                'api-version' => '3.0',
                'to' => $data['to']
            ],
            'headers' => [
                'Ocp-Apim-Subscription-Key' => env('AZURE_TRANSLATE_KEY')
            ],
            'json' => [
                ['Text' => $data['text']]
            ]
        ]);

        $result = (string) $res->getBody();

        return view('translate')->with([
            'originalText' => $data['text'],
            'result' => json_decode($result)
        ]);
    }
}
