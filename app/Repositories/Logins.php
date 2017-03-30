<?php

namespace Taskr\Repositories;

use Illuminate\support\Facades\DB;
use Carbon\Carbon;

/**
 * Class Logins is an repository which contains methods that combines
 * business log and data manipulation for Login objects. It also
 * avoids namespace clashes with eloquent methods that we are not
 * able to use.
 *
 * @package Taskr\Repositories
 */
class Logins
{
    public function recordLogin($id) {
        DB::insert("INSERT INTO Logins (user_id, login_time) VALUES (?, ?)", [$id, $this->now()]);
        return DB::getPdo()->lastInsertId();
    }

    public function recordLogout($id) {
        DB::update("UPDATE Logins SET logout_time = ? WHERE id = ?", [$this->now(), $id]);
    }

    private function now() {
        date_default_timezone_set('UTC');

        // Then call the date functions
        return date('Y-m-d H:i:s');
    }
}
