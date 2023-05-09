<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetStatisticRequest;
use App\Services\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Get column statistic
     * @param Request $request
     * @return array
     */
    public function getColumnStatistic(Request $request)
    {
        /** @var StatisticService $statisticService */
        $statisticService = app(StatisticService::class);
        return $statisticService->getColumnStatistic($request->column);
    }

    public function getReferralColumnStatistic(GetStatisticRequest $request)
    {
        $statisticService = app(StatisticService::class);
        return $statisticService->getReferralColumnStatistic($request->column, $request->pixel);
    }
}
