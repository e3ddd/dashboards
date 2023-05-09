<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUser extends Model
{
    use HasFactory;

    protected $table = 'about_users';

    protected $fillable = [
        'referral',
        'user_ip',
        'city',
        'platform',
        'device',
        'browser',
        'language',
        'pixel_id'
    ];

}
