<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{

    public function getModel();
    
    public function hasPermission($permission);

    public function getListUser();

}