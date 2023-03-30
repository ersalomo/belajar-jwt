<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\WebGisController;

// Route::get('/', function () {
//     $qrcode = QrCode::size(500)->format('png')->generate('youtube.com', 'storage/images/fukc.png');
// });
// Route::get('/', fn () => to_route('home.index'));
// Route::group([
//     'as' => 'home.'
// ], function () {
//     Route::get('/gis', [WebGisController::class, 'index'])->name('index');
//     Route::get('/gis/data', [WebGisController::class, 'getData']);
//     Route::get('/gis/lokasi/{lokasi?}', [WebGisController::class, 'getLokasi']);
// });
// Route::get('/assets/{any}', function () {
//     return 'oke';
// })->where('any', '([^/\?])+');



Route::get('/m/{m?}', function ($m = '') {

    return view('test.test');
});
