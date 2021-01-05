<?php


namespace App\Repositories\Api\TestManager\Common;

use App\Models\Api\TestManager\Test\Quest as Model;
use App\Repositories\CoreRepository;

class QuestionRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    public function getAllQuestionsBelongTest ($testId)
    {
        return $this->startConditions()
            ->where('test_id', $testId)
            ->with('answers:id,quest_id,answer,image,variant')
            ->get()
            ->toBase();
    }
}
