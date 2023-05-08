<?php

namespace App\Services;

use App\Repositories\StatisticRepository;

class StatisticService
{
    private StatisticRepository $statisticRepository;

    public function __construct(StatisticRepository $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    public function getColumnStatistic($column)
    {
        return $this->statisticRepository->getColumnStatistic($column);
    }
}
