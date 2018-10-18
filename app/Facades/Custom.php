<?php
/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 10/1/2018
 * Time: 2:30
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Custom extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'custom';
    }

}
