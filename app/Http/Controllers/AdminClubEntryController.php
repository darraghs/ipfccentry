<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PanelImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClubEntryController;

use App\ClubEntry;
use App\User;
use App\Club;


class AdminClubEntryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function checkClubPanels($clubid)
    {
        $clubEntry = new ClubEntryController();
        $clubEntry->runPanelChecks($clubid);

        if ($clubEntry->hasMonoPanel($clubid)) {
            return $clubEntry->displayPanel('mono', $clubid);
        } else {
            return $clubEntry->displayPanel('colour', $clubid);
        }

    }

    public function showColourPanel($clubid)
    {
        $clubEntry = new ClubEntryController();
        $clubEntry->runPanelChecks($clubid);

        if ($clubEntry->hasColourPanel($clubid)) {
            return $clubEntry->displayPanel('colour', $clubid);
        } else {
            return $clubEntry->displayPanel('mono', $clubid);
        }
    }

    public function setPaid($clubid, $method){

        $entry = ClubEntry::find($clubid);
        $entry->payment = $method;
        $entry->save();
        return \response(['msg' => 'payment: '.$method ], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');


    }

    public function status()
    {
        $entries = ClubEntry::orderBy('panel_number')->get();
        $entries_new = [];

        $clubEntry = new ClubEntryController();
        foreach ($entries as $entry) {

            $club = Club::find($entry->club_id);
            $user = User::where('club_id', $entry->club_id)->get();

            $entry_new = [];

            $user = $user[0];
            $entry_new['club_id'] = $entry['club_id'];
            $entry_new['status'] = $entry['status'];
            $entry_new['paid'] = $entry['payment'];
            $entry_new['panel_number'] = $entry['panel_number'];
            $entry_new['name'] = $user['name'];
            $entry_new['phone'] = $user['phone'];
            $entry_new['email'] = $user['email'];
            $entry_new['hasMono'] = $clubEntry->hasMonoPanel($entry->club_id) ? 'yes' : 'no';
            $entry_new['hasColour'] = $clubEntry->hasColourPanel($entry->club_id)? 'yes' : 'no';
            $entries_new[$club['clubname']] = $entry_new;

        }

        $ret_entries = ['entries' => $entries_new];

        return view('admin.status', $ret_entries);
    }

}
