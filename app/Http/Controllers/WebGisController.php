<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{WebGis, Lokasi};

class WebGisController extends Controller
{
    public function index(Request $request)
    {
        return view('webgis/web-gis-index', [
            'locations' => Lokasi::all()
        ]);
    }
    public function getData()
    {
        return json_encode(WebGis::all()->toArray());
    }
    public function getLokasi(Lokasi $lokasi)
    {
        if ($lokasi->exists()) {
            return json_encode($lokasi);
        } else {
            // dd('sds');
            return response()->json([
                'status' => 'error',
                'message' => 'tidak ada data / id tidak ditemukan',
                'data' => $lokasi
            ]);
        }
    }
}
