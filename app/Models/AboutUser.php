<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUser extends Model
{
    use HasFactory;

    protected $table = 'about_users';

    protected $fillable = [
        'user_id',
        'user_ip',
        'city',
        'platform',
        'device',
        'browser',
        'language',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
