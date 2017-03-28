<?php

namespace Taskr\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Taskr\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    /**
     * Return the view of the login page.
     */
    public function create()
    {
        return view('sessions.create');
    }

    // Attempts to authenticate the user and login him/her into the application.
    public function store()
    {
        // Validate the form
        $this->validate(request(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        // search for user in the database
        $results = array_filter(DB::select('SELECT * FROM users WHERE email = ?', [request('email')]));

        // if there is a match for both email and password, login the user
        if (!empty($results) && Hash::check(request('password'), $results[0]->password)) {
            // Create new user object and store information into it
            $user = new \Taskr\User;
            $user->id = $results[0]->id;
            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
            $user->is_admin = request('is_admin');

            auth()->login($user);
            return redirect()->home();
        } else {
            // redirect them back since authentication fail
            request()->flash();
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }
    }

    /**
     * Logout the user from the application.
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
