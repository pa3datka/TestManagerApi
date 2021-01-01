<?php

namespace App\Services\Repositories\Api\TestManager\UserRepositories\UserRepository;

use App\Models\Api\TestManager\User\User as Model;
use CoreRepository;

class UserRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }
}
