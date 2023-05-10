<?php

namespace App;

use App\Models\AboutUser;

class CorrectStatisticResponse
{
    private \Illuminate\Support\Collection $collection;

    public function __construct(\Illuminate\Support\Collection $collection)
    {
        $this->collection = $collection;
    }

    public function formatResponse($column, $total)
    {
        $statistic = $this->collection->keyBy($column)->sortByDesc('total');

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
}
