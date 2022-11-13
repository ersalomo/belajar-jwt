<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    $qrcode = QrCode::size(500)->format('png')->generate('youtube.com', 'storage/images/fukc.png');
});
