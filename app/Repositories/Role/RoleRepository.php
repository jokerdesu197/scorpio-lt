<?php

namespace App\Repositories\Role;

use App\Repositories\EloquentRepository;
//use Your Model

/**
 * Class ACLRepository.
 */
class RoleRepository extends EloquentRepository implements RoleRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Role::class;
    }
    public function getRole($id)
    {
    	$qb = $this->_model::where('id', $id)->whereNull('deleted_at')->first();
    	return $qb;
    }
    public function getListRole()
    {
    	$qb = $this->_model::where('id', '>', 0);
    	return $qb;
    }
}
