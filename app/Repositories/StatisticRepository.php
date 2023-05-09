<?php

namespace App\Repositories;

use App\CorrectStatisticResponse;
use App\Models\AboutUser;
use App\Models\PageViewStatistic;
use App\Models\PixelGif;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class StatisticRepository
{
    /**
     * get column statistic
     * @param string|null $column
     * @return array
     */
    public function getColumnStatistic($column)
    {
        if($column === null){
            throw new \RuntimeException('Column value required');
        }

        $total = AboutUser::all()->count();

        $statistic = DB::table('about_users')
            ->select($column, DB::raw('count(*) as total'))
            ->groupBy($column)
            ->get();

        $response = new CorrectStatisticResponse($statistic);

        return $response->formatResponse($column, $total);
    }


    public function getReferralColumnStatistic($pixel, $column)
    {
        $pixel_id = PixelGif::where('pixel', $pixel)->first()->id;

        $total = AboutUser::all()->count();

        if(AboutUser::where('pixel_id', $pixel_id)->exists()){
            $statistic = DB::table('about_users')
                ->select($column, DB::raw('count(*) as total'))
                ->where('pixel_id', $pixel_id)
                ->groupBy($column)
                ->get();
            $response = new CorrectStatisticResponse($statistic);
            return $response->formatResponse($column, $total);
        }else{
            throw new \RuntimeException('Pixel.gif not found');
        }


    }
}
