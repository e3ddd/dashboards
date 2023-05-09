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

    /**
     * @param string|null $column
     * @return array
     */
    public function getColumnStatistic($column)
    {
        return $this->statisticRepository->getColumnStatistic($column);
    }

    /**
     * @param string|null $column
     * @param string|null $pixel
     * @return array
     */
    public function getReferralColumnStatistic($column, $pixel)
    {
        return $this->statisticRepository->getReferralColumnStatistic($pixel, $column);
    }
}
