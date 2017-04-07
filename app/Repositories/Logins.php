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
        // Should not be manually entering created_at but database would not store local time by default no matter what I did
        DB::insert("INSERT INTO Logins (user_id, login_time, created_at) VALUES (?, ?, ?)", [$id, Carbon::now(), Carbon::now()]);
        return DB::getPdo()->lastInsertId();
    }

    public function recordLogout($id) {
        DB::update("UPDATE Logins SET logout_time = ? WHERE id = ?", [Carbon::now(), $id]);
    }

    // private function now() {
    //     date_default_timezone_set('UTC');

    //     // Then call the date functions
    //     return date('Y-m-d H:i:s');
    // }
}
