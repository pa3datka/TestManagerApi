<?php


namespace App\Repositories\Api\TestManager\UserRepositories;


use App\Repositories\CoreRepository;
use App\Models\Api\TestManager\Test\TypeAccess as Model;
use Illuminate\Support\Collection;

class TypeAccessRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getAllTypesAccess(): Collection
    {
        return $this->startConditions()
            ->all()
            ->toBase();
    }
}
