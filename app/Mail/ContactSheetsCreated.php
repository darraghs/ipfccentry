<?php

namespace App\Mail;

use App\Club;
use App\ClubEntry;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSheetsCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $clubEntry;
    public function __construct(ClubEntry $clubEntry)
    {
        $this->clubEntry = $clubEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $clubid = $this->clubEntry-id;

        $club = Club::id($clubid);
        $clubname = $club->name;
        return $this->subject("New Contact Sheets for ".$clubname)->view('email.contactsheets');
    }
}
