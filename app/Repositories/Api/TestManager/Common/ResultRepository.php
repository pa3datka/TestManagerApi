<?php


namespace App\Repositories\Api\TestManager\Common;

use App\Models\Api\TestManager\Test\Result as Model;
use App\Repositories\CoreRepository;

class ResultRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
