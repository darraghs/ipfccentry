<?php

namespace App\Http\Controllers;

use App\ClubEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Club;
use App\Mail\UserApproved;

class UserApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $users = User::all();
        $user_new = [];
        foreach ($users as $user) {

            $user_new = $user->get();

            $clubid = $user->club_id;
            $club = Club::find($user->club_id);
            if (!is_null($club)) {
                $user['clubname'] = $club->clubname;
            } else {
                $user['clubname'] = 'No Club Selected';
            }
        }

        return view('admin.users', compact('users', $user_new));
    }

    public function approveUser(Request $request)
    {
        $userId = $request->input('userId');
        $checked = $request->input('checkboxStatus');
        $user = User::find($userId);
        if (strcmp($checked, 'true') == 0) {
            $user->approved = 1;
        } else {
            $user->approved = 0;
        }
        $user->save();
        Mail::to($user)->send(new UserApproved($user));
        return \response(['msg' => 'User Approved'], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');


    }

    public function setAdmin(Request $request)
    {
        $userId = $request->input('userId');
        $checked = $request->input('checkboxStatus');
        $user = User::find($userId);
        if (strcmp($checked, 'true') == 0) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }
        $user->save();

        return \response(['msg' => 'Admin Approved'], 200)// 200 Status Code: Standard response for successful HTTP request
        ->header('Content-Type', 'application/json');
    }


}
