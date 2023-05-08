<?php

namespace App\Repositories;

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

        $statistic = DB::table('about_users')
            ->select($column, DB::raw('count(*) as total'))
            ->groupBy($column)
            ->get();

        $statistic = $statistic->keyBy($column)->sortByDesc('total');

        $response = [];

        foreach ($statistic->skip(0)->take(5) as $item){
            $response[] = [
                'name' => $item->$column,
                'total' => $item->total
            ];
        }

        return $response;
    }
}
