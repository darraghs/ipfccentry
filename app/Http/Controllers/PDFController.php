<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClubEntryController;

use App\ClubEntry;
use App\User;
use App\Club;




class PDFController extends Controller
{

    public function comments(){
        $entries = ClubEntry::orderBy('panel_number')->get();
        $clubEntry = new ClubEntryController();
        $monoPanels = [];
        $colourPanels = [];
        foreach ($entries as $entry) {

            if( $entry->status == 'complete') {

                if ($clubEntry->hasMonoPanel($entry->club_id)) {
                    array_push($monoPanels, array('panel_id' => $entry->panel_number, 'club_id' => $entry->club_id));
                }
                if ($clubEntry->hasColourPanel($entry->club_id)) {
                    array_push($colourPanels, array('panel_id' => $entry->panel_number, 'club_id' => $entry->club_id));
                }
            }

        }
        $pageArray['mono'] = $monoPanels;
        $pageArray['colour'] = $colourPanels;

        return view('results.commentsPDF', $pageArray);
    }

    public  function commentsPDF(){
        $entries = ClubEntry::orderBy('panel_number')->get();
        $clubEntry = new ClubEntryController();
        $monoPanels = [];
        $colourPanels = [];
        foreach ($entries as $entry) {

            if( $entry->status == 'complete') {

                if ($clubEntry->hasMonoPanel($entry->club_id)) {
                    array_push($monoPanels, array('panel_id' => $entry->panel_number, 'club_id' => $entry->club_id));
                }
                if ($clubEntry->hasColourPanel($entry->club_id)) {
                    array_push($colourPanels, array('panel_id' => $entry->panel_number, 'club_id' => $entry->club_id));
                }
            }

        }
        $pageArray['mono'] = $monoPanels;
        $pageArray['colour'] = $colourPanels;
        $pdf = PDF::loadView('results.commentsPDF', $pageArray);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('comments.pdf');
    }

    public function awards(){
        $pageArray = app('App\Http\Controllers\AdminResultsController')->getResults();
        return view('admin.awards_listPDF', $pageArray);
    }

    public  function awardsPDF(){
        $pageArray = app('App\Http\Controllers\AdminResultsController')->getResults();
        $pdf = PDF::loadView('admin.awards_listPDF', $pageArray );
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('awards.pdf');
    }
}
