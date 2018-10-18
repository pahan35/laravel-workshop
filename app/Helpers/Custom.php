<?php
/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 9/30/2018
 * Time: 21:29
 */

namespace App\Helpers;


use App\Misc\CustomRepository;

class Custom
{
    protected $repository;
    public function __construct()
    {
        $this->repository = new CustomRepository();
    }

    public function __call($method, $args)
    {
        if (in_array($method, ['create', 'complete', 'completed', 'exists', 'removeExpired'])) {
            return call_user_func([$this->repository, $method], ...$args);
        }
    }
}
