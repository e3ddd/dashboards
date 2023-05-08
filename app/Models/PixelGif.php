<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PixelGif extends Model
{
    use HasFactory;

    protected $table = 'pixel_gifs';

    protected $fillable = [
        'user_id',
        'pixel'
    ];
}
