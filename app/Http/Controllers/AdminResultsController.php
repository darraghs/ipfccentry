<?php

namespace App\Http\Controllers;

use App\PanelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminResultsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function colourwinners(Request $request){
        return $this->getWinners('colour');
    }

    public function monowinners(Request $request){
        return $this->getWinners('mono');
    }

    public function getWinners($type){

        $query = 'SELECT ce.panel_number, p.id AS pid, p.panel_order, p.image, p.award, p.title, (p.Judge1_score + p.Judge2_Score + p.Judge3_Score) AS TOTAL FROM panel_images p, club_panels epl, club_entries ce WHERE ce.club_id = epl.club_id AND epl.image_id = p.id AND epl.image_type = "'.$type.'" AND ce.panel_number IS NOT NULL ORDER BY p.award DESC, TOTAL DESC LIMIT 10';

        $winners = DB::select(DB::raw($query));
        return view('admin.winners', ['winners'=>$winners]);
    }

    public function update(Request $request)
    {
        $type = $request->input('type');
        $clubid = $request->input('clubid');

        $panels = ClubPanel::where('club_id', $clubid)->where('image_type', $type)->orderBy('image_id')->get();
        $counter = 1;

        foreach ($panels as $panel) {

            $panelimage = PanelImage::find($panel->image_id);
            $judge1_score = $request->input('judge1_' . $counter);
            $judge2_score = $request->input('judge2_' . $counter);
            $judge3_score = $request->input('judge3_' . $counter);


            if (!is_null($judge1_score)) {
                $panelimage->Judge1_Score = $judge1_score;
            }

            if (!is_null($judge2_score)) {
                $panelimage->Judge2_Score = $judge2_score;
            }
            if (!is_null($judge3_score)) {
                $panelimage->Judge3_Score = $judge3_score;
            }


            $panelimage->save();
            $counter++;
        }


        return $this->displayPanel($type, $clubid);
    }


    public function  setawards(Request $request){
        $imageId = $request->input('imageId');
        $award = $request->input('award');
        $image = PanelImage::find($imageId);
        $image->award = $award;
        $image->save();
        return \response(['msg' => 'Award: ' . $award], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');
    }

    public function displayPanel($type, $club_id)
    {

        $club = Club::find($club_id);
        if( !is_null($club )) {
            $panels = ClubPanel::where('club_id', $club->id)->where('image_type', $type)->orderBy('image_id')->get();
            $counter = 1;
            $pageArray = ['club_id' => $club->id, 'club' => $club->clubname, 'type' => $type];

            foreach ($panels as $panel) {

                $image = PanelImage::find($panel->image_id);

                if( strcmp($image->image, "" )==0){
                    $pageArray['image_' . $counter] = $image->image;
                }
                else {
                    $filename = '/uploads/200_' . $image->image;
                    if( ! file_exists($filename)){
                        $filename ='/uploads/' . $image->image;
                    }
                    $pageArray['image_' . $counter] = $filename;
                }
                $pageArray['author_'.$counter] = $image->author_name;
                $pageArray['title_'.$counter] = $image->title;
                $counter++;
            }

            return view('entry.panel', $pageArray);
        }
        else {
            return view('entry.panel', ['id' => '', 'club' => '']);
        }
    }



//select ce.panel_number, p.id as pid, p.panel_order, p.image, p.award,
//
//from
//panel_images p,
//club_panels epl,
//club_entries ce
//where ce.club_id=epl.club_id
//and epl.image_id=p.id
//and epl.image_type='colour'
//ORDER BY TOTAL DESC LIMIT 10
}
