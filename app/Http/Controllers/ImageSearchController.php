<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageSearchController extends Controller
{
    public function search(){
        $api_url = 'https://pixabay.com/api/?key=15429123-40b384e475ccef5c0c193b7d6&image_type=photo';
        $query = request()->q ?? '';
        $page = request()->page ?? 1;

        $response = Http::get($api_url . '&page=' . $page . '&q=' . $query);

        return $response;
    }
}
