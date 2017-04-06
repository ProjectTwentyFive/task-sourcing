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

    public function checkIfUserCreatedTasksOfAllGenericCategory($userid)
    {
		$users = DB::select('
				SELECT u.id FROM users u WHERE NOT EXISTS(
					SELECT g.category FROM generic_tasks g WHERE NOT EXISTS(
						SELECT t.category FROM tasks t
						WHERE t.category = g.category
						AND t.owner = u.id
					)
				)
			');
		foreach($users as $user) {
			if ($user->id == $userid) {
				return true;
			}
		}
		return false;
	}
}
