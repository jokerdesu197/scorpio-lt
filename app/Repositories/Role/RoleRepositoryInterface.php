<?php

namespace App\Repositories\Role;

/**
 * Class ACLRepositoryInterface.
 */
interface RoleRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel();

    public function getRole($id);

    public function getListRole();
}
