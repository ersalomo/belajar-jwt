<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageIdentification extends Model
{
    use HasFactory;
    protected $table ="image_identification";

    protected $fillable = [
        "visitor_id",
        "image_size",
        "image_name",
        "image_base64",
        "image_descriptor",
    ];

}
