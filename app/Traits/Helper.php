<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

trait Helper
{
    public function check_image(): bool {
        $arr_value = explode('/',auth()->user()->picture);
        $image = array_pop($arr_value);
        $f = Storage::disk('public')->get('users/'.$image);

        $respon = HTTP::attach('image_file', $f,'image_base64')
            ->post(
                env('API_URL_FR').'/facepp/v3/detect?api_key='.
                env('API_KEY_FR').'&api_secret='.
                env('API_SECRET_FR'));
        return boolval($respon['face_num'] < 1);
    }
}
