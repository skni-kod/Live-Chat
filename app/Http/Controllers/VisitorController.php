<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    function getStatistics()
    {
        $visitorCountToday = app('App\Http\Controllers\VisitorController')->countVisitorsToday()->getData()->count;
        $lastWeekCount = app('App\Http\Controllers\VisitorController')->countVisitorsLastWeek()->getData()->count;

        if ($lastWeekCount != 0) {
            $percentChange = ($visitorCountToday - $lastWeekCount) / $lastWeekCount * 100;
        } else {
            $percentChange = 0;
        }
        $percentChangeStr = ($percentChange >= 0 ? '+' : '-') . abs($percentChange) . '%';

        $visitorCountNew = app('App\Http\Controllers\VisitorController')->countNewVisitors()->getData()->count;
        $lastWeekNewCount = app('App\Http\Controllers\VisitorController')->countNewVisitorsLastWeek()->getData()->count;
        if ($lastWeekNewCount != 0) {
            $percentChange = ($visitorCountNew - $lastWeekNewCount) / $lastWeekNewCount * 100;
        } else {
            $percentChange = 0;
        }
        $percentChangeStrNew = ($percentChange >= 0 ? '+' : '-') . abs($percentChange) . '%';

        return ['visitorCountToday' => $visitorCountToday,
                'visitorCountNew' => $visitorCountNew,
                'percentChangeStr' => $percentChangeStr,
                'percentChangeStrNew' => $percentChangeStrNew,
        ];
    }

    public function countVisitorsToday() {
        $countToday = Visitor::whereDate('updated_at', now()->format('Y-m-d'))->count();
        return response()->json(['count' => $countToday]);
    }

    public function countNewVisitors() {
        $countNew = Visitor::whereDate('created_at', now()->format('Y-m-d'))->count();
        return response()->json(['count' => $countNew]);
    }

    public function countVisitorsLastWeek()
    {
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd = now()->subWeek()->endOfWeek();

        $count = Visitor::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();

        return response()->json(['count' => $count]);
    }

    public function countNewVisitorsLastWeek()
    {
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd = now()->subWeek()->endOfWeek();

        $count = Visitor::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();

        return response()->json(['count' => $count]);
    }

    public function showVisitorData()
    {
        $visitorData = $this->getVisitorData();

        return view('dashboard', ['visitorData' => $visitorData]);
    }
}
