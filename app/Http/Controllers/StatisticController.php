<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getColumnStatistic(Request $request)
    {
        /** @var StatisticService $statisticService */
        $statisticService = app(StatisticService::class);
        return $statisticService->getColumnStatistic($request->column);
    }
}
