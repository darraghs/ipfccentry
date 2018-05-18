<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\PanelImage;
use App\Club;
use App\ClubEntry;
use App\ClubPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;
use ZipArchive;

use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;

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

        $query = 'SELECT ce.panel_number, p.id AS pid, p.panel_order, p.image, p.award, p.title, (p.Judge1_score + p.Judge2_Score + p.Judge3_Score) AS TOTAL FROM panel_images p, club_panels epl, club_entries ce WHERE ce.club_id = epl.club_id AND epl.image_id = p.id AND epl.image_type = "'.$type.'" AND ce.panel_number IS NOT NULL ORDER BY p.award DESC, TOTAL DESC LIMIT 11';

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


    public function showAdminResults(){
        $pageArray = $this->getResults();
        return view('admin.awards_list', $pageArray);
    }

    public function showOverallResults(){
        $pageArray = $this->getResults();
        return view('results.results', $pageArray);
    }

    public function getResults()
    {

        $pageArray = [];

        $overallSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and   cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $overallQuery = DB::select(DB::raw($overallSQL));


        $firstPlaceScoreOverall = 0;
        $firstPlaceOverall = [];
        $secondPlaceScoreOverall = 0;
        $secondPlaceOverall = [];
        $thirdPlaceScoreOverall = 0;
        $thirdPlaceOverall = [];

        foreach ($overallQuery as $result) {

            $score = $result->score;
            if( $score > 0 ) {
                if ($firstPlaceScoreOverall == 0) {
                    $firstPlaceScoreOverall = $score;
                    array_push($firstPlaceOverall, $result);
                } elseif ($score == $firstPlaceScoreOverall) {
                    array_push($firstPlaceOverall, $result);
                } elseif ($secondPlaceScoreOverall == 0) {
                    $secondPlaceScoreOverall = $score;
                    array_push($secondPlaceOverall, $result);
                } elseif ($score == $secondPlaceScoreOverall) {
                    array_push($secondPlaceOverall, $result);
                } elseif ($thirdPlaceScoreOverall == 0) {
                    $thirdPlaceScoreOverall = $score;
                    array_push($thirdPlaceOverall, $result);
                } elseif ($thirdPlaceScoreOverall == $score) {
                    array_push($thirdPlaceOverall, $result);
                }
            }

        }

        $pageArray['first_overall'] = $firstPlaceOverall;
        $pageArray['second_overall'] = $secondPlaceOverall;
        $pageArray['third_overall'] = $thirdPlaceOverall;


        $colourSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and  cp.image_type="colour" and cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $colourResults = DB::select(DB::raw($colourSQL));


        $firstPlaceScoreColour = 0;
        $firstPlaceColour = [];
        $secondPlaceScoreColour = 0;
        $secondPlaceColour = [];
        $thirdPlaceScoreColour = 0;
        $thirdPlaceColour = [];

        foreach ($colourResults as $result) {

            $score = $result->score;
            if( $score > 0 ) {
                if ($firstPlaceScoreColour == 0) {
                    $firstPlaceScoreColour = $score;
                    array_push($firstPlaceColour, $result);
                } elseif ($score == $firstPlaceScoreColour) {
                    array_push($firstPlaceColour, $result);
                } elseif ($secondPlaceScoreColour == 0) {
                    $secondPlaceScoreColour = $score;
                    array_push($secondPlaceColour, $result);
                } elseif ($score == $secondPlaceScoreColour) {
                    array_push($secondPlaceColour, $result);
                } elseif ($thirdPlaceScoreColour == 0) {
                    $thirdPlaceScoreColour = $score;
                    array_push($thirdPlaceColour, $result);
                } elseif ($thirdPlaceScoreColour == $score) {
                    array_push($thirdPlaceColour, $result);
                }
            }

        }

        $pageArray['first_colour'] = $firstPlaceColour;
        $pageArray['second_colour'] = $secondPlaceColour;
        $pageArray['third_colour'] = $thirdPlaceColour;


        $monoSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and  cp.image_type="Mono" and cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $monoResults = DB::select(DB::raw($monoSQL));


        $firstPlaceScoreMono = 0;
        $firstPlaceMono = [];
        $secondPlaceScoreMono = 0;
        $secondPlaceMono = [];
        $thirdPlaceScoreMono = 0;
        $thirdPlaceMono = [];

        foreach ($monoResults as $result) {

            $score = $result->score;
            if( $score > 0 ){

                if ($firstPlaceScoreMono == 0) {
                    $firstPlaceScoreMono = $score;
                    array_push($firstPlaceMono, $result);
                } elseif ($score == $firstPlaceScoreMono) {
                    array_push($firstPlaceMono, $result);
                } elseif ($secondPlaceScoreMono == 0) {
                    $secondPlaceScoreMono = $score;
                    array_push($secondPlaceMono, $result);
                } elseif ($score == $secondPlaceScoreMono) {
                    array_push($secondPlaceMono, $result);
                } elseif ( $thirdPlaceScoreMono == 0 ){
                    $thirdPlaceScoreMono = $score;
                    array_push($thirdPlaceMono, $result);
                } elseif ( $thirdPlaceScoreMono == $score ){
                    array_push($thirdPlaceMono, $result);
                }
            }
        }

        $pageArray['first_mono'] = $firstPlaceMono;
        $pageArray['second_mono'] = $secondPlaceMono;
        $pageArray['third_mono'] = $thirdPlaceMono;


        $colorWinnersSQL = 'SELECT c.clubname, p.author_name, p.title, p.image, p.award  FROM panel_images p, club_panels epl, clubs c WHERE epl.club_id=c.id AND epl.image_id = p.id AND epl.image_type = "colour" AND p.award > 0  ORDER BY p.award DESC';
        $colorWinners = DB::select(DB::raw($colorWinnersSQL));


        $colourGold = [];
        $colourSilver = [];
        $colourBronze = [];
        $colourHC = [];
        foreach ($colorWinners as $result){
            $award = $result->award;
            if( $award == 6 ){
                array_push($colourGold, $result);
            } elseif ( $award == 5 ){
                array_push($colourSilver, $result);
            } elseif ($award == 4){
                array_push($colourBronze, $result);
            } elseif ( $award ==3 ){
                array_push($colourHC, $result);
            }

        }

        $pageArray['colour_gold'] = $colourGold;
        $pageArray['colour_silver'] = $colourSilver;
        $pageArray['colour_bronze'] = $colourBronze;
        $pageArray['colour_hc'] = $colourHC;



        $monoWinnersSQL = 'SELECT c.clubname, p.author_name, p.title, p.image, p.award  FROM panel_images p, club_panels epl, clubs c WHERE epl.club_id=c.id AND epl.image_id = p.id AND epl.image_type = "mono" AND p.award > 0  ORDER BY p.award DESC';
        $monoWinners = DB::select(DB::raw($monoWinnersSQL));


        $monoGold = [];
        $monoSilver = [];
        $monoBronze = [];
        $monoHC = [];
        foreach ($monoWinners as $result){
            $award = $result->award;
            if( $award == 6 ){
                array_push($monoGold, $result);
            } elseif ( $award == 5 ){
                array_push($monoSilver, $result);
            } elseif ($award == 4){
                array_push($monoBronze, $result);
            } elseif ( $award ==3 ){
                array_push($monoHC, $result);
            }

        }

        $pageArray['mono_gold'] = $monoGold;
        $pageArray['mono_silver'] = $monoSilver;
        $pageArray['mono_bronze'] = $monoBronze;
        $pageArray['mono_hc'] = $monoHC;

        return $pageArray;
    }

    public function showStandings(){
        $pageArray = $this->getStandings();
        return view('results.standings', $pageArray);
    }

    public function getStandings(){
        $pageArray = [];

        $overallSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and   cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $overallQuery = DB::select(DB::raw($overallSQL));
        $overallPlaces = $this->calculatePlacing($overallQuery);

        $colourSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and  cp.image_type="colour" and cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $colourResults = DB::select(DB::raw($colourSQL));
        $colourPlaces = $this->calculatePlacing($colourResults);

        $monoSQL = 'select cp.club_id, cn.clubname, sum(p.Judge1_Score)+sum(p.Judge2_Score)+sum(p.Judge3_Score) as score from club_panels cp,  panel_images p, clubs cn where cn.id=cp.club_id and  cp.image_type="Mono" and cp.image_id=p.id  group by cp.club_id, cn.clubname order by score desc';
        $monoResults = DB::select(DB::raw($monoSQL));
        $monoPlaces = $this->calculatePlacing($monoResults);

        $pageArray= ['overall'=>$overallPlaces, 'colour'=>$colourPlaces, 'mono'=>$monoPlaces];


        return $pageArray;

    }

    private function calculatePlacing( $results ) {
        $placings = [];
        $lastPlace = 1;
        $lastScore = $results[0]->score;

        foreach( $results as $result ){
            $place = [];
            $score = $result->score;
            if( $score > 0 ) {
                $place['club_id'] = $result->club_id;
                $place['clubname'] = $result->clubname;
                $place['score'] = $result->score;
                if ($score == $lastScore) {
                    $place['place'] = $lastPlace;
                } elseif ($score < $lastScore) {
                    $lastPlace++;
                    $lastScore = $score;
                    $place['place'] = $lastPlace;
                }
                array_push($placings, $place);
            }

        }
        return $placings;

    }

    public function showIndividualScores($clubid = NULL){

        if( is_null($clubid)) {
            $clubid = Auth::user()->club_id;
        }
        $club = Club::find($clubid);
        if( !is_null($club)){
            $pageArray = $this->getPanelScores($clubid);
            $pageArray['clubname'] = $club->clubname;
            return view('results.scores', $pageArray);
        }
    }


    private function getPanelScores($clubid){

        $colourPanelSQL='select cp.image_type, pi.id, pi.author_name, pi.title, pi.image, pi.panel_order, pi.award, pi.Judge1_Score, pi.Judge2_Score, pi.Judge3_Score from panel_images pi, club_panels cp where  cp.image_id=pi.id and pi.panel_order < 11 and cp.club_id='.$clubid.' and cp.image_type="colour" order by pi.panel_order';
        $monoPanelSQL='select cp.image_type, pi.id, pi.author_name, pi.title, pi.image, pi.panel_order, pi.award, pi.Judge1_Score, pi.Judge2_Score, pi.Judge3_Score from panel_images pi, club_panels cp where  cp.image_id=pi.id and pi.panel_order < 11 and cp.club_id='.$clubid.' and cp.image_type="mono" order by pi.panel_order';
        $colourPanelResults = DB::select(DB::raw($colourPanelSQL));
        $monoPanelResults = DB::select(DB::raw($monoPanelSQL));


        $colourPanel = [];
        $monoPanel = [];
        $awards = [0=>'No Award', 3=>'Highly Commended', 4=>'Bronze Medal', 5=>'Silver Medal', 6=>'Gold Medal'];

        foreach( $colourPanelResults as $result ){
            $colourImage = [];
            $colourImage['id'] = $result->id;
            $colourImage['type'] = $result->image_type;
            $colourImage['author'] = $result->author_name;
            $colourImage['title'] = $result->title;
            $colourImage['image'] = $result->image;
            $colourImage['order'] = $result->panel_order;
            $colourImage['judge1'] = $result->Judge1_Score;
            $colourImage['judge2'] = $result->Judge2_Score;
            $colourImage['judge3'] = $result->Judge3_Score;
            $colourImage['total'] =  $result->Judge1_Score +  $result->Judge2_Score +  $result->Judge3_Score;
            $colourImage['award'] = $awards[$result->award];
            array_push($colourPanel, $colourImage);
        }
        foreach( $monoPanelResults as $result ){
            $monoImage = [];
            $monoImage['id'] = $result->id;
            $monoImage['type'] = $result->image_type;
            $monoImage['author'] = $result->author_name;
            $monoImage['title'] = $result->title;
            $monoImage['image'] = $result->image;
            $monoImage['order'] = $result->panel_order;
            $monoImage['judge1'] = $result->Judge1_Score;
            $monoImage['judge2'] = $result->Judge2_Score;
            $monoImage['judge3'] = $result->Judge3_Score;
            $monoImage['total'] =  $result->Judge1_Score +  $result->Judge2_Score +  $result->Judge3_Score;
            $monoImage['award'] = $awards[$result->award];
            array_push($monoPanel, $monoImage);
        }
        $panelScores = ['colour'=>$colourPanel, 'mono'=>$monoPanel];


        return $panelScores;
    }

    public function getPDFResults($clubid){

        $club = Club::find($clubid);
        if( !is_null($club)){
            $pageArray = $this->getPanelScores($clubid);
            $pageArray['clubname'] = $club->clubname;
            $pdf = PDF::loadView('results.scores', $pageArray);
            return $pdf->download('results.pdf');

        }

    }

    public function createImagesZip(Request $request)
    {

        $public_dir=public_path();
        $this->delete_files($public_dir."/website");
        mkdir($public_dir."/website");
        mkdir($public_dir."/website/panels");
        mkdir($public_dir."/website/panels/mono");
        mkdir($public_dir."/website/panels/colour");
        mkdir($public_dir."/website/winners");

        $results = $this->getResults();
        $entries = ClubEntry::where('status', 'complete')->get();

        foreach( $entries as $entry ){
            $clubid = $entry->club_id;
            $club = Club::find($clubid);
            if($this->hasMonoPanel($clubid)){
                copy("uploads/".$clubid."/".$clubid."_mono_contact_sheet.jpg", "website/panels/mono/".str_replace(" ", "_", $club->clubname).".jpg");
            }
            if( $this->hasColourPanel($clubid)){
                copy("uploads/".$clubid."/".$clubid."_colour_contact_sheet.jpg", "website/panels/colour/".str_replace(" ", "_", $club->clubname).".jpg");
            }
        }

        $zipFileName = "ipf_website_images.zip";

        $zipFile = new ZipArchive();
        if ($zipFile->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive

            $files = new RecursiveIteratorIterator (new RecursiveDirectoryIterator($public_dir."/website"), RecursiveIteratorIterator::LEAVES_ONLY);

            // let's iterate
            foreach ($files as $name => $file) {
                $filePath = $file->getRealPath();
                $zipFile->addFile($filePath);
            }
            // Close ZipArchive
            $zipFile->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }


    }

    /*
     * php delete function that deals with directories recursively
     */
    public function delete_files($target)
    {
        if(file_exists($target)) {
            if (is_dir($target)) {
                $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

                foreach ($files as $file) {
                    $this->delete_files($file);
                }




                rmdir($target);
            } elseif (is_file($target)) {
                unlink($target);
            }
        }
    }

    public function hasMonoPanel($clubid)
    {
        $panels = ClubPanel::where('club_id', $clubid)->where('image_type', 'mono')->get();
        return (sizeof($panels) > 0);
    }

    public function hasColourPanel($clubid)
    {
        $panels = ClubPanel::where('club_id', $clubid)->where('image_type', 'colour')->get();
        return (sizeof($panels) > 0);
    }

}
