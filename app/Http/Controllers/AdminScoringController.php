<?php

namespace App\Http\Controllers;

use App\ClubPanel;
use App\ClubEntry;
use App\PanelImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AdminScoringController extends Controller
{
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
                if( !is_null($panelImage)){
                    if ($panelImage->panel_order < 11) {

                        $panelArray[$panelImage->id] = ['score' => $panelImage['Judge' . $judge . '_Score'], 'order' => $panelImage->panel_order];
                    }
                }
            }

            $pageArray['panels'][$entry->panel_number] = $panelArray;

        }

        // dd($pageArray);


        return view('admin.scoring', $pageArray);

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


    //select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and   cp.image_id=p.id  group by cp.club_id order by score desc LIMIT 5;
}
