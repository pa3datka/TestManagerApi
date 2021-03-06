<?php


namespace App\Repositories\Api\TestManager\Common;



use App\Models\Api\TestManager\Test\Category as Model;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;


class CategoryRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getListCategories(): Collection
    {
        return $this->startConditions()
            ->all()
            ->toBase();
    }
}
