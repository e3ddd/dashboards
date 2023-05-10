<?php

namespace App\Repositories;

use App\CorrectStatisticResponse;
use App\Models\AboutUser;
use App\Models\PixelGif;;
use Illuminate\Support\Facades\DB;

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


    /**
     * Get
     * @param string|null $pixel
     * @param string|null $column
     * @return array
     */
    public function getPixelColumnStatistic($pixel, $column)
    {
        $pixel_id = PixelGif::where('pixel', $pixel)->first()->id;

        $total = AboutUser::where('pixel_id', $pixel_id)->get($column)->count();

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

    public function getReferralColumnStatistic($column, $pixel, $referral)
    {
        $pixel_id = PixelGif::where('pixel', $pixel)->first()->id;

        $total = AboutUser::where('pixel_id', $pixel_id)->where('referral', $referral)->get($column)->count();

        if(AboutUser::where('pixel_id', $pixel_id)->where('referral', $referral)->exists()){
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

    public function getPixelReferrals($pixel)
    {
        $pixel_id = PixelGif::where('pixel', $pixel)->first()->id;

        if($pixel_id === null){
            throw new \RuntimeException('Pixel not found');
        }

        return AboutUser::where('pixel_id', $pixel_id)->distinct()->get();
    }
}
