<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ClubController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the clubs
        $clubs = Club::all();

        // load the view and pass the clubs
        return View::make('admin.clubs.index')
            ->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/admin/clubs/create.blade.php)
        return View::make('admin.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'clubname'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clubs/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $club = new Club;
            $club->clubname       = Input::get('clubname');

            $club->save();

            // redirect
            Session::flash('message', 'Successfully created club!');
            return Redirect::to('clubs');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the club
        $club = Club::find($id);

        // show the edit form and pass the nerd
        return View::make('admin.clubs.edit')
            ->with('club', $club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'clubname'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clubs/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $club = Club::find($id);
            $club->clubname       = Input::get('clubname');

            $club->save();

            // redirect
            Session::flash('message', 'Successfully updated club!');
            return Redirect::to('clubs');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $club = Club::find($id);
        $club->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the club!');
        return Redirect::to('clubs');
    }
}
