<?php

namespace App\Http\Controllers;

use App\ClubEntry;
use App\ClubPanel;
use App\PanelImage;
use Illuminate\Http\Request;
use PDF;


class AdminScoringController extends Controller
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


    public function scoring($type, $judge)
    {

        $entries = ClubEntry::whereNotNull('panel_number')->orderBy('panel_number')->get();

        $pageArray = [];
        $pageArray['data'] = ['judge' => $judge, 'type' => $type];
        $pageArray['panels'] = [];


        foreach ($entries as $entry) {
            $panelArray = [];
            $clubid = $entry->club_id;
            $panels = ClubPanel::where('club_id', $clubid)->where('image_type', $type)->get();
            foreach ($panels as $panel) {
                $imageId = $panel->image_id;
                $panelImage = PanelImage::find($imageId);
                if (!is_null($panelImage)) {
                    if ($panelImage->panel_order < 11) {

                        $panelArray[$panelImage->id] = ['score' => $panelImage['Judge' . $judge . '_Score'], 'order' => $panelImage->panel_order];
                    }
                }
            }

            $pageArray['panels'][$entry->panel_number] = $panelArray;

        }

        return view('admin.scoring', $pageArray);

    }

    public function scoringSheets($type, $judge)
    {

        $entries = ClubEntry::whereNotNull('panel_number')->orderBy('panel_number')->get();

        $pageArray = [];
        $pageArray['data'] = ['judge' => $judge, 'type' => ucwords($type)];
        $pageArray['panels'] = [];


        foreach ($entries as $entry) {
            $panelArray = [];
            $clubid = $entry->club_id;
            $panels = ClubPanel::where('club_id', $clubid)->where('image_type', $type)->get();
            foreach ($panels as $panel) {
                $imageId = $panel->image_id;
                $panelImage = PanelImage::find($imageId);
                if (!is_null($panelImage)) {
                    if ($panelImage->panel_order < 11) {

                        if ($panelImage->panel_order < 6) {
                            $panelArray[1][$panelImage->id] = ['image' => $panelImage->image, 'title' => $panelImage->title, 'order' => $panelImage->panel_order];
                        } else {
                            $panelArray[2][$panelImage->id] = ['image' => $panelImage->image, 'title' => $panelImage->title, 'order' => $panelImage->panel_order];
                        }
                    }
                }
            }

            if (!empty($panelArray)) {
                $pageArray['panels'][$entry->panel_number] = $panelArray;
            }

        }

        //== dd($pageArray);

//        $pdf = PDF::loadView('admin.scoringSheets', $pageArray);
//        $pdf->setPaper('a4', 'portrait');
//        return $pdf->download('scoring_sheet_'.$judge.'_'.$type.'.pdf');
        return view('admin.scoringSheets', $pageArray);

    }


    public function setScore(Request $request)
    {
        $judgeId = $request->input('judge');
        $imageId = $request->input('id');
        $score = $request->input('score');

        $image = PanelImage::find($imageId);
        $image['Judge' . $judgeId . '_Score'] = $score;
        $image->save();
        return \response(['msg' => 'Score Saved: ' . $score], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');
    }

}
