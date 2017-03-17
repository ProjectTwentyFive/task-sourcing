<?php

namespace Taskr\Http\Controllers\Resources;

use Taskr\Http\Controllers\Controller;
use Taskr\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | View Methods
    |--------------------------------------------------------------------------
    |
    | These methods should return views with the appropriate data bind to it.
    |
    */
    /*
    * Method returns a view listing all of the users in the database
    */
    public function index()
    {
        // TODO: Restrict to Administrator
        $users = DB::select('SELECT * FROM users');
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Show User Profile
        $user_profile = DB::select('SELECT * FROM users WHERE id = ?', [$user->id]);
        return view('users.listing', compact('user'));
    }

    public function create()
    {
        // TODO: Restrict to Administrator
        // User creation method handled by Auth controllers.
    }

    public function edit()
    {
        // Update User Profile
    }

    /*
    |--------------------------------------------------------------------------
    | Resource Methods
    |--------------------------------------------------------------------------
    |
    | These methods should not return any views but instead process the
    | appropriate actions instead.
    |
    */
    public function update()
    {

    }

    /*
    * Parameter: user id
    * e.g. 1
    */
    public function destroy($id)
    {
        DB::select('DELETE FROM users where id = ?', [$id]);
        return "Deleted user with id {$id}";
    }

    // CREATE
    public function store()
    {

    }
}
