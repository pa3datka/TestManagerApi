<?php

namespace App\Http\Controllers\Api\TestManager\Common;

use App\Http\Controllers\Api\TestManager\BaseController;
use App\Repositories\Api\TestManager\Common\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends BaseController
{
    private $questionRepository;

    public function __construct()
    {
        $this->questionRepository = new QuestionRepository();
    }

    public function showQuestionsBelongTest($testId)
    {
        $questions = $this->questionRepository->getAllQuestionsBelongTest($testId);
        return response()->json($questions);
    }
}
