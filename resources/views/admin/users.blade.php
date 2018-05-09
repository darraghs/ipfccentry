@extends('layouts.app')

@section('content')
    <div class="container">

        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="panel-body">
                    <table width="100%">
                        <tr>
                            <td class="col-sm-4 col-md-2">Name</td>
                            <td class="col-sm-4 col-md-2 col-md-push-2">Email</td>
                            <td class="col-sm-4 col-md-2 col-md-push-6">Phone</td>
                            <td class="col-sm-4 col-md-2 col-md-pull-4">Club</td>
                            <td class="col-sm-4 col-md-2 col-md-pull-4">Approved</td>
                            <td class="col-sm-4 col-md-2">Admin</td>
                            <td class="col-sm-4 col-md-2">Delete</td>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td class="col-sm-4 col-md-2">{{ $user->name }}</td>
                                <td class="col-sm-4 col-md-2 col-md-push-2">{{ $user->email }}</td>
                                <td class="col-sm-4 col-md-2 col-md-push-6">{{ $user->phone }}</td>
                                <td class="col-sm-4 col-md-2 col-md-pull-4">{{ $user->clubname }}</td>
                                <td class="col-sm-4 col-md-2 col-md-pull-4">{{ Form::checkbox($user->id, $user->id, $user->approved, ['class' => 'approve']) }}</td>
                                <td class="col-sm-4 col-md-2">{{ Form::checkbox($user->id, $user->id, $user->admin, ['class' => 'admin']) }}</td>
                                <td class="col-sm-4 col-md-2"><a
                                            href="{{ URL::route('deleteUser', array('userId'=>$user->id)) }}"
                                            class="btn btn-default"> Delete </a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>

            </div>
        @endif
    </div>
@endsection

