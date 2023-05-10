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
    public function getPixelColumnStatistic($column, $pixel)
    {
        return $this->statisticRepository->getPixelColumnStatistic($pixel, $column);
    }

    /**
     * @param string|null $column
     * @param string|null $pixel
     * @param string|null $referral
     * @return array
     */
    public function getReferralColumnStatistic($column, $pixel, $referral)
    {
        return $this->statisticRepository->getReferralColumnStatistic($column, $pixel, $referral);
    }

    public function getPixelReferrals($pixel)
    {
        return $this->statisticRepository->getPixelReferrals($pixel);
    }
}
