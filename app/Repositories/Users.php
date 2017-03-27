<?php

namespace Taskr\Repositories;

use Illuminate\support\Facades\DB;

/**
 * Class Users is an repository which contains methods that combines
 * business log and data manipulation for User objects. It also
 * avoids namespace clashes with eloquent methods that we are not
 * able to use.
 *
 * @package Taskr\Repositories
 */
class Users
{
    public function all()
    {

    }

    public function getUser($id)
    {
        $user = DB::select('SELECT * FROM Users WHERE id=?', [$id]);
        return $user[0];
    }
}
