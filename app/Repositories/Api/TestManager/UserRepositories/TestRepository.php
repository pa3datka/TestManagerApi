<?php


namespace App\Repositories\Api\TestManager\UserRepositories;


use App\Repositories\Api\TestManager\Common\CategoryRepository;
use App\Repositories\CoreRepository;
use App\Models\Api\TestManager\Test\Test as Model;
use Illuminate\Support\Facades\Auth;

class TestRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function showFormCreateTest(): array
    {
        return array(
            'categories' => (new CategoryRepository())->getListCategories(),
            'calculations' => (new TypeCalculationRepository())->getAllTypesCalculation(),
            'access' => (new TypeAccessRepository())->getAllTypesAccess()
        );
    }

    public function getAllUserTests()
    {
        $columns = [
            'id',
            'head',
            'access_id',
            'calculation_id',
            'category_id',
            'created_at'
        ];
        return $this->startConditions()
            ->select($columns)
            ->where('user_id', Auth::id())
            ->with([
                'categories:id,title',
                'categories:id,title'
            ])
            ->withAvg('results', 'result')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
