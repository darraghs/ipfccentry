<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Club;
use App\ClubEntry;
use App\ClubPanel;
use App\Mail\ContactSheetsCreated;
use File;


class createContactSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $club;
    public function __construct(Club $club)
    {
        $this->club = $club;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if( $this->club ) {
            $clubEntry = ClubEntry::find($this->club->id);
            if( $clubEntry ){
                $clubid = $clubEntry->club_id;

                if ($this->hasMonoPanel($clubid)) {
                    $this->createContactSheets('mono', $clubid);

                }
                if ($this->hasColourPanel($clubid)) {
                    $this->createContactSheets('colour', $clubid);
                }

                //Mail::to($user)->send(new RegistrationComplete($user));
                // $users = User::where('club_id',$clubEntry->club_id)->get();
                Mail::to('darragh.sherwin@gmail.com')->send(new ContactSheetsCreated($clubEntry));
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
