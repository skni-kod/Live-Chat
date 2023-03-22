<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
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


}
