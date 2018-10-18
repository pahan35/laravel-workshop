<?php
/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 10/1/2018
 * Time: 2:32
 */

namespace App\Http\Controllers;


use Custom;
use Sentinel;

class WorkshopController extends Controller
{
    public function index()
    {
        $user = Sentinel::getUser();
        Custom::complete($user, 35);
    }
}
