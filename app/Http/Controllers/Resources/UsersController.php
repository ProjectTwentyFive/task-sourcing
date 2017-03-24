<?php

namespace Taskr\Http\Controllers\Resources;

use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Users;
use Taskr\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    protected $usersRepo;

    public function __construct(Users $users)
    {
        $this->usersRepo = $users;
    }

    // Considered adding an isAdmin attribute to the constructor but we're not able to pick up the user id until after the user has been constructed
    private function isAdmin() {
        $id = Auth::id();

        return $this->usersRepo->getUser($id)->is_admin;
    }

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
        if (Auth::check() && $this->isAdmin()) {
            $users = DB::select('SELECT * FROM users');
            return view('users.index', compact('users'));
        } else {
            abort(403);
        }
    }

    public function show(User $user)
    {
        // Show User Profile
        if (Auth::check() && $this->isAdmin()) {
            $user_profile = DB::select('SELECT * FROM users WHERE id = ?', [$user->id]);
            return view('users.show', compact('user'));
        } else {
            abort(403);
        }
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
        DB::delete('DELETE FROM users where id = ?', [$id]);
        return "Deleted user with id {$id}";
    }

    // CREATE
    public function store()
    {

    }
}
