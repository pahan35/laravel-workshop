<?php
/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 9/30/2018
 * Time: 21:30
 */

namespace App\Misc;


use DB;
use Sentinel;

class CustomRepository
{
    public function create($user)
    {
        DB::insert('');
    }

    public function complete($user, $code)
    {

        Sentinel::findRoleById(1);
        dd(Sentinel::findRoleById(1)->name);
    }

    public function completed($user, $code)
    {

    }

    public function exists($user)
    {
        dd('exists');
    }

    public function removeExpired()
    {

    }
}
