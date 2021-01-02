<?php

namespace App\Repositories\Api\TestManager\Common;

use App\Models\Api\TestManager\Test\Test as Model;
use App\Repositories\CoreRepository;


class TestRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAllTests()
    {
        $columns = [
            'head',
            'image',
            'user_id',
            'category_id',
            'created_at as date_time',
        ];
        return $this->startConditions()
            ->select($columns)
            ->where('access_id', 1)
            ->with([
                'users:id,name',
                'categories:id,title'
            ])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toBase();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function showTest(int $id)
    {
        $columns = [
            'head',
            'description',
            'time',
            'attempts',
            'image',
            'user_id',
            'category_id',
            'created_at as date_time'
        ];

        return $this->startConditions()
            ->select($columns)
            ->where('id', $id)
            ->where('access_id', 1)
            ->with([
                'users:id,name',
                'categories:id,title'
            ])
            ->withAvg('results', 'result')
            ->first();
    }

    public function showTestsBelongCategory($categoryId)
    {
        $columns = [
            'head',
            'description',
            'time',
            'attempts',
            'image',
            'user_id',
            'category_id',
            'created_at as date_time'
        ];

        return $this->startConditions()
            ->select($columns)
            ->where('category_id', $categoryId)
            ->where('access_id', 1)
            ->with([
                'users:id,name',
                'categories:id,title'
            ])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toBase();
    }

    public function getAllAnswersTestAndTypeCalculation($testId)
    {
        $columns = [
            'id',
            'calculation_id'
        ];
        return $this->startConditions()
            ->select($columns)
            ->where('id', $testId)
            ->with([
                'calculation:id,slug',
                'quests.answers:id,quest_id,status'
            ])
            ->first();
    }
}
