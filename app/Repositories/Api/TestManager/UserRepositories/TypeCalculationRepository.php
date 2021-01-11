<?php


namespace App\Repositories\Api\TestManager\UserRepositories;


use App\Repositories\CoreRepository;
use App\Models\Api\TestManager\Test\TypeCalculation as Model;
use Illuminate\Support\Collection;

class TypeCalculationRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getAllTypesCalculation(): Collection
    {
        return $this->startConditions()
            ->all()
            ->toBase();
    }
}
