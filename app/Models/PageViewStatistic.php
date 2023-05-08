<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageViewStatistic extends Model
{
    use HasFactory;

    protected  $table = 'pages_views_statistic';

    protected  $fillable = [
        'page_name',
        'count'
    ];
}
