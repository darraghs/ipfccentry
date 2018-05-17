<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CompetitionStatus;

class PublicStatusController extends Controller
{
    public function getCurrentStatus()
    {
        $status = CompetitionStatus::where('current', '=', 1)->get();
        $status = $status[0];
        return $status->status;
    }

    public function getCurrentStatusFull() {
        return CompetitionStatus::where('current', '=', 1)->get()[0];
    }
}
