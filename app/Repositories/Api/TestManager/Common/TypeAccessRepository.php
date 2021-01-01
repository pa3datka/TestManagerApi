<?php

namespace App\Repositories\Api\TestManger\Common\TestRepositories;


use App\Models\Api\TestManager\Test\TypeAccess as Model;
use App\Repositories\CoreRepository;

class TypeAccessRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
}
