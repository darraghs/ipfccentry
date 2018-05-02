<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompetitionStatus;


class CompStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $statuses = CompetitionStatus::all();


        return view('admin.compstatus', compact('statuses', $statuses));
    }

    public function updateCompState(Request $request)
    {
        $statusId = $request->input('current');

        $statuses = CompetitionStatus::all();

        foreach ($statuses as $status ){
            if($status->id == $statusId){
                $status->current = 1;
            } else {
                $status->current = 0;
            }
            $status->save();
        }


        return view('admin.compstatus', compact('statuses', $statuses));


    }
}
