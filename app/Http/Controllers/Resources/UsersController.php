<?php

namespace Taskr\Http\Controllers\Resources;

use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Users;
use Taskr\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    protected $usersRepo;

    public function __construct(Users $users)
    {
        $this->usersRepo = $users;
    }

    // Considered adding an isAdmin attribute to the constructor but we're not able to pick up the user id until after the user has been constructed
    private function isAdmin()
    {
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
        // User creation method handled by Auth controllers.
        if (Auth::check() && $this->isAdmin()) {
            return view('users.create');
        } else {
            abort(403);
        }
    }

    public function edit()
    {
        // Update User Profile
        if (Auth::check() && $this->isAdmin()) {
            return view('users.edit', compact('user'));
        } elseif (Auth::check()) {
            // Get ID of logged in User
            return view('users.profile', compact('user'));
        } else {
            abort(403);
        }
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
        // Validate the form
        $this->validate(request(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6|required_with:password'
        ]);

        // Build sql query and inputs
        $sql = 'UPDATE users SET first_name = ?, last_name = ?';
        $input = array(request('first_name'), request('last_name'));
        if (!empty(request('password'))) {
            $sql .= ', password = ?';
            array_push($input, Hash::make(request('password')));
        }

        // Administrative function
        if (Auth::check() && $this->isAdmin() && !empty(request('is_admin'))) {
            $sql .= ', is_admin = ?';
            array_push($input, request('is_admin'));
        }

        $sql .= ' WHERE email = ?';
        array_push($input, Auth::user()->email);

        // Update the user in the database
        $isUpdated = DB::update($sql, $input);

        if ($isUpdated) {
            $results = DB::select('SELECT * FROM users WHERE email = ?', [Auth::user()->email]);

            // Recreate a new user object and relogin
            $user = new \Taskr\User;
            $user->id = $results[0]->id;
            $user->first_name = $results[0]->first_name;
            $user->last_name = $results[0]->last_name;
            $user->email = $results[0]->email;
            $user->is_admin = $results[0]->is_admin;
            Auth::login($user);

            return redirect(route('user.profile'))->with('status', 'Profile updated!');
        } else {
            // throw some error that insertion has failed. violate unique constraints?
            request()->flash();
            return back()->withErrors([
                'message' => 'There is something wrong when updating your profile. Try again later.'
            ]);
        }
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

    public function store()
    {
        // TODO: Restrict to Administrator
        // User creation method handled by Auth controllers.
    }
}
