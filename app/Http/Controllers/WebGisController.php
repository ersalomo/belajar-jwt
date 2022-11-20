<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebGis;

class WebGisController extends Controller
{
    public function index(Request $request)
    {
        return view('webgis/web-gis-index', []);
    }
    public function getData()
    {
        return json_encode(WebGis::all()->toArray());
    }
}
