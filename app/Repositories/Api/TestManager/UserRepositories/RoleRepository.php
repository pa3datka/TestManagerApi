<?php


namespace App\Services\Repositories\Api\TestManager\UserRepositories\RoleRepository;


use CoreRepository;
use App\Models\Api\TestManager\User\Role as Model;

class RoleRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }
}
