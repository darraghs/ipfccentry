<?php

namespace App\Http\Controllers;

use App\Club;
use App\ClubEntry;
use App\ClubPanel;
use App\CompetitionStatus;
use App\PanelImage;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Log;


class ClubEntryController extends Controller
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

    //
    public function index()
    {

        $clubid = Auth::user()->club_id;
        $name = "NO CLUB";
        if (!is_null($clubid)) {
            $club = Club::find($clubid);
            $name = $club->clubname;
        } else {
            $clubid = "";
        }

        return view('entry.entry', ['clubid' => $clubid, 'club' => $name]);
    }

    public function create(Request $request)
    {
        $clubId = $request->input('club_id');
        $club = Club::find($clubId);

        if (!is_null($club)) {
            $entry = ClubEntry::where('club_id', $club->id)->get();


            $panels = $request->input('panels');
            if (is_null($entry) || sizeof($entry) == 0) {
                if (strcmp($panels, 'Both') == 0) {
                    $this->createPanelImages("mono", $club->id);
                    $this->createPanelImages("colour", $club->id);
                } elseif (strcmp($panels, 'Colour Only') == 0) {
                    $this->createPanelImages("colour", $club->id);
                } else {
                    $this->createPanelImages("mono", $club->id);
                }

                $entry = ClubEntry::create([
                    'club_id' => $club->id,
                    'status' => 'incomplete',
                    'payment' => 'unpaid'
                ]);

            }
            return ClubEntryController::displayPanel("colour", $club->id);
        }


    }

    public function payment(Request $request)
    {
        $clubid = Auth::user()->club_id;
        $club = Club::find($clubid);

        return view('payment.paypal', ['clubname' => $club->clubname]);
    }


    public function colourpanel(Request $request)
    {
        $clubid = Auth::user()->club_id;
        return $this->displayPanel("colour", $clubid);
    }

    public function monopanel(Request $request)
    {
        $clubid = Auth::user()->club_id;
        return $this->displayPanel("mono", $clubid);
    }

    public function displayPanel($type, $club_id)
    {

        $clubid = $club_id;
        if (is_null($club_id)) {
            $clubid = Auth::user()->club_id;
        }
        $club = Club::find($clubid);
        $pageArray = [];
        if (!is_null($club)) {
            $panels = ClubPanel::where('club_id', $club->id)->where('image_type', $type)->orderBy('image_id')->get();
            $counter = 1;
            $pageArray = ['club_id' => $club->id, 'club' => $club->clubname, 'type' => $type];

            foreach ($panels as $panel) {

                $image = PanelImage::find($panel->image_id);

                $pageArray['image_id_' . $counter] = $image->id;

                if (strcmp($image->image, "") == 0) {
                    $pageArray['image_' . $counter] = $image->image;
                } else {
                    $filename = 'uploads/200_' . $image->image;
                    if (!File::exists($filename)) {
                        $filename = '/uploads/' . $image->image;
                    } else {
                        $filename = '/' . $filename;
                    }
                    $pageArray['image_' . $counter] = $filename;
                }
                $pageArray['author_' . $counter] = $image->author_name;
                $pageArray['title_' . $counter] = $image->title;
                $counter++;
            }


        } else {

            $pageArray['id'] = '';
            $pageArray['club'] = '';


        }
        $pageArray['canUpdate'] = $this->canUpdateEntry();
        return view('entry.panel', $pageArray);
    }

    public function fileUpload(Request $request)
    {


        $file = $request->file('data');
        $id = $request->input('id');
        $name = $request->input('name');
        $panelimage = PanelImage::find($id);

        $fileName = preg_replace('/[^a-zA-Z0-9_.]/', '', $name);

        $image_name = $panelimage->id . "-" . $fileName;

        $file->move('uploads', $image_name);
        $image200 = Image::make(sprintf('uploads/%s', $image_name))->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(sprintf('uploads/200_%s', $image_name));

        $panelimage->image = $image_name;
        $panelimage->save();

        return \response(['msg' => 'Image Uploaded'], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');


    }

    public function update(Request $request)
    {
        $type = $request->input('type');
        $clubid = Auth::user()->club_id;
        if (is_null($clubid) || empty($clubid)) {
            $clubid = $request->input('club_id');
        }

        $panels = ClubPanel::where('club_id', $clubid)->where('image_type', $type)->orderBy('image_id')->get();
        $counter = 1;

        foreach ($panels as $panel) {

            $panelimage = PanelImage::find($panel->image_id);
            $author_name = $request->input('author_' . $counter);
            $title = $request->input('title_' . $counter);

            $file = $request->file('image_' . $counter);

            if (!is_null($file)) {

                $fileName = $file->getClientOriginalName();
                $fileName = preg_replace('/[^a-zA-Z0-9_.]/', '', $fileName);
                $image_name = $panelimage->id . "-" . $fileName;
                $file->move('uploads', $image_name);

                $image = Image::make(sprintf('uploads/%s', $image_name))->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(sprintf('uploads/200_%s', $image_name));

                $panelimage->image = $image_name;
            }
            if (!is_null($author_name)) {
                $panelimage->author_name = $author_name;
            }
            if (!is_null($title)) {
                $panelimage->title = $request->input('title_' . $counter);
            }

            $panelimage->save();
            $counter++;
        }
        $this->runPanelChecks($clubid);

        if ($type == 'mono') {
            if ($this->hasColourPanel($clubid)) {
                if ($this->checkIfPanelIsComplete("colour", $clubid)) {
                    return redirect()->route('entrystatus');
                } else {
                    return $this->displayPanel("colour", $clubid);
                }
            } else {
                return redirect()->route('entrystatus');
            }
        } else {
            if ($this->hasMonoPanel($clubid)) {
                if ($this->checkIfPanelIsComplete("mono", $clubid)) {
                    return redirect()->route('entrystatus');
                } else {
                    return $this->displayPanel("mono", $clubid);
                }
            } else {
                return redirect()->route('entrystatus');
            }
        }
        return $this->displayPanel($type, $clubid);
    }

    public function runPanelChecks($clubid)
    {
        $entry = ClubEntry::find($clubid);
        if (strcmp($entry->status, 'incomplete') == 0) {

            if ($this->checkIfPanelIsComplete("colour", $clubid) && $this->checkIfPanelIsComplete("mono", $clubid)) {

                $query = 'SELECT max(panel_number) as max from club_entries';
                $max = DB::select($query);

                $panel_number = 1;
                $max = $max[0]->max;

                if (!is_null($max)) {
                    $panel_number = intval($max) + $panel_number;
                }

                $entry->panel_number = $panel_number;
                $entry->status = "complete";
                $entry->save();
            }
        }

        if ($this->hasMonoPanel($clubid)) {
            $this->createContactSheets('mono', $clubid);

        }
        if ($this->hasColourPanel($clubid)) {
            $this->createContactSheets('colour', $clubid);
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

    public function checkIfPanelIsComplete($type, $clubid)
    {
        $panels = ClubPanel::where('club_id', $clubid)->where('image_type', $type)->orderBy('image_id')->get();
        $complete = TRUE;
        if (sizeof($panels) > 0) {

            $counter = 0;
            foreach ($panels as $panel) {

                $panelimage = PanelImage::find($panel->image_id);
                $author_name = $panelimage->author_name;
                $title = $panelimage->title;
                $image_name = $panelimage->image;
                if ($counter < 10 && (empty($title) || empty($author_name) || empty($image_name))) {
                    $complete = FALSE;
                }
                $counter++;
            }
        }
        return $complete;
    }


    private function createPanelImages($type, $clubid)
    {

        for ($counter = 1; $counter <= 12; $counter++) {
            $subImage = 0;
            if ($counter > 10) {
                $subImage = 1;
            }
            $panelImage = PanelImage::create([
                'image' => '',
                'author_name' => '',
                'author_email' => '',
                'title' => '',
                'Judge1_Score' => 0,
                'Judge2_Score' => 0,
                'Judge3_Score' => 0,
                'award' => 0,
                'substitue' => $subImage,
                'panel_order' => $counter
            ]);

            $panel = ClubPanel::create([
                'club_id' => $clubid,
                'image_type' => $type,
                'image_id' => $panelImage->id
            ]);
        }


    }

    public function entrystatus()
    {
        $user = Auth::user();
        $clubid = $user->club_id;
        $this->runPanelChecks($clubid);
        $pageArray = [];
        $club = Club::find($clubid);
        $pageArray['id'] = $club->id;
        $pageArray['clubname'] = $club->clubname;
        $pageArray['name'] = $user->name;
        $pageArray['email'] = $user->email;
        if (is_null($user->phone)) {
            $pageArray['phone'] = 'No number provided';
        } else {
            $pageArray['phone'] = $user->phone;
        }
        if ($this->isPaid() == false) {
            $pageArray['paid'] = 'Unpaid';
        } else {
            $pageArray['paid'] = 'Payment Completed';
        }
        if ($this->isComplete() == true) {
            $pageArray['complete'] = 'Completed';
        } else {
            $pageArray['complete'] = 'Incomplete';
        }

        $entry = ClubEntry::where('club_id', $clubid)->get();
        $panel_number = $entry[0]['panel_number'];
        $pageArray['panel_number'] = "Not yet assisnged";
        if (!is_null($panel_number)) {
            $pageArray['panel_number'] = $panel_number;
        }
        $monoPanels = ClubPanel::where('club_id', $clubid)->where('image_type', 'mono')->get();
        $colourPanels = ClubPanel::where('club_id', $clubid)->where('image_type', 'colour')->get();
        if (sizeof($monoPanels) >= 10 && sizeof($colourPanels) >= 10) {
            $pageArray['panels'] = 'Both';
        } elseif (sizeof($monoPanels) >= 10 && sizeof($colourPanels) == 0) {
            $pageArray['panels'] = 'Mono Only';
        } else {
            $pageArray['panels'] = 'Colour Only';
        }


        return view('entry.status', $pageArray);

    }

    public function hasEntry()
    {
        $clubid = Auth::user()->club_id;
        $panels = ClubPanel::where('club_id', $clubid)->get();
        $entry = false;
        if (sizeof($panels) > 0) {
            $entry = true;
        }
        return $entry;

    }


    public function isComplete()
    {

        $clubid = Auth::user()->club_id;
        $entry = ClubEntry::where('club_id', $clubid)->get();
        $status = $entry[0]['status'];
        $complete = true;
        if (strcmp($status, 'incomplete') == 0) {
            $complete = false;
        }
        return $complete;
    }


    public function isPaid()
    {

        $clubid = Auth::user()->club_id;
        $paid = false;
        $entry = ClubEntry::where('club_id', $clubid)->get();
        if (!is_null($entry)) {
            $payment = $entry[0]['payment'];

            if (strcmp($payment, 'unpaid') != 0) {
                $paid = true;
            }
        }

        return $paid;
    }

    public function updateAuthor(Request $request)
    {
        $imageId = $request->input('id');
        $author = $request->input('author');
        $image = PanelImage::find($imageId);
        $image->author_name = $author;
        $image->save();

        $panel = ClubPanel::where('image_id', $image->id)->get();
        if (!is_null($panel) && sizeof($panel) == 1) {
            $this->runPanelChecks($panel[0]->club_id);
        }

        return \response(['msg' => 'Author Updated'], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');
    }

    public function updateTitle(Request $request)
    {
        $imageId = $request->input('id');
        $newTitle = $request->input('title');
        $image = PanelImage::find($imageId);
        if( is_null($newTitle))
        {
            $image->title = '';
        }
        else{
            $image->title = $newTitle;
        }
        $image->save();

        $panel = ClubPanel::where('image_id', $image->id)->get();
        if (!is_null($panel) && sizeof($panel) == 1) {
            $this->runPanelChecks($panel[0]->club_id);
        }

        return \response(['msg' => 'Title Updated'], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');
    }

    public function getCurrentStatus()
    {
        $status = CompetitionStatus::where('current', '=', 1)->get();
        $status = $status[0];
        return $status->status;
    }

    private function canUpdateEntry()
    {
        if (Auth::user()->isAdmin()) {
            return true;
        } elseif (strcmp($this->getCurrentStatus(), 'entry') == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createContactSheets($paneltype, $club_id)
    {
        $selectSQL = "select pi.image from club_panels cp, club_entries ce, panel_images pi where ce.club_id=" . $club_id . " and ce.club_id=cp.club_id and cp.image_type='" . $paneltype . "' and cp.image_id = pi.id and pi.panel_order < 11 order by pi.panel_order";
        $images = DB::select(DB::raw($selectSQL));

        $filelocations = "";
        foreach ($images as $image) {
            $filename = $image->image;
            if (!is_null($filename)) {
                $filelocations = $filelocations . " uploads/" . $image->image;
            }
        }
        $outputDir = "uploads/" . $club_id;
        if (!file_exists($outputDir)) {
            File::makeDirectory($outputDir);
        }

        $outputFile = $outputDir . "/" . $club_id . "_" . $paneltype . "_contact_sheet.jpg";
        $command = "/usr/bin/montage " . $filelocations . " -background '#808080' -geometry 460x460+4+3 -tile 5x2 " . $outputFile . " > /dev/null 2>/dev/null & ";
        system($command);

    }


}
