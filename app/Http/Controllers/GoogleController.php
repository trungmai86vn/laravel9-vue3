<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleController extends Controller
{
    public function autocomplete(){
        try {
            $key = env('GOOGLE_API_KEY');
            $input = request()->q;
            $components = implode('|', [
                'country:au' 
            ]);

            $response = Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json?key=' . $key . '&components=' . $components . '&input=' . $input);

            return optional($response)->json();
        } catch(\Exception $e){
            return $e;
        }
    }
}
