<?php


namespace App\Repositories\Api\TestManager\Common;



use App\Models\Api\TestManager\Test\Category as Model;
use App\Repositories\CoreRepository;


class CategoryRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getListCategories(): \Illuminate\Support\Collection
    {
        return $this->startConditions()
            ->all()
            ->toBase();
    }
}
