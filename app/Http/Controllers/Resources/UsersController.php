<?php

namespace Taskr\Http\Controllers\Resources;

use Taskr\Http\Controllers\Controller;
use Taskr\User;

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
    public function index()
    {
        // TODO: Restrict to Administrator
    }

    public function show(User $user)
    {
        // Show User Profile
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

    public function delete()
    {

    }

    public function store()
    {

    }
}
