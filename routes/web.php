<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\WebGisController;

// Route::get('/', function () {
//     $qrcode = QrCode::size(500)->format('png')->generate('youtube.com', 'storage/images/fukc.png');
// });

Route::get('/gis', [WebGisController::class, 'index']);
Route::get('/gis/data', [WebGisController::class, 'getData']);
