<?php

namespace App\Repositories;

use App\Models\AboutUser;
use App\Models\PageViewStatistic;
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

        $statistic = $statistic->keyBy($column)->sortByDesc('total');

        $response = [];

        foreach ($statistic->skip(0)->take(5) as $key => $item){
               $total -= $item->total;
                $response[] = [
                    'name' => $item->$column,
                    'total' => $item->total
                ];
            }

        $response[] = [
            'name' => 'others',
            'total' => $total
        ];

        return $response;
    }

    public function getReferralStatistic()
    {
        $statistic = DB::table('about_users')
            ->select('referral', DB::raw('count(*) as total'))
            ->groupBy('referral')
            ->get();

        return $statistic;
    }
}
