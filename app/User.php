<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'club_id', 'password', 'phone', 'approved', 'admin', 'judge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function isApproved() {
        // your logic here i.e
        return $this->approved == 1;
    }

    public function isAdmin() {
        // your logic here i.e
        return $this->admin == 1;
    }
}
