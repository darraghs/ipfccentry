<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Club;
use App\ClubEntry;
use App\ClubPanel;
use App\PanelImage;

class createContactSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($clubid)
    {
        $club = Club::find($clubid);
        if( $club ) {
            $clubEntry = ClubEntry::find($clubid);
            if( $clubEntry ){
                $mono_panel = ClubPanel::find($clubEntry->mono_panel_id);
                $colour_panel = ClubPanel::find($clubEntry->colour_panel_id);
            }
        }

    }
}
