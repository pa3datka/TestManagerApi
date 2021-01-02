<?php

namespace App\Http\Controllers\Api\TestManager\Common;

use App\Http\Controllers\Api\TestManager\BaseController;
use App\Models\Api\TestManager\Test\Result;
use App\Repositories\Api\TestManager\Common\ResultRepository;
use App\Repositories\Api\TestManager\Common\TestRepository;
use App\Services\CalculationTestResult\CalculateResultService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends BaseController
{
    /**
     * @var ResultRepository
     */
    private ResultRepository $resultRepository;

    /**
     * ResultController constructor.
     */
    public function __construct()
    {
        $this->resultRepository = new ResultRepository;
    }

    /**
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function calculationResult(Request $request): JsonResponse
    {
        $test = $this->getTest($request->testId);
        $resultService = new CalculateResultService($test, $request->answers);
        $user = Auth::id() ? Auth::id() : 1;
        $result = $resultService->resultTest();
        $this->setResult((int) $result, $user, $test['id'], $test['calculation_id']);

        return response()->json($result);

    }

    /**
     *  Get Test (relationships: quests, answers, calculation)
     *
     * @param int $testId
     * @return mixed
     */
    private function getTest(int $testId)
    {
        $testRepository = new TestRepository();
        return $testRepository->getAllAnswersTestAndTypeCalculation($testId);
    }

    /**
     *  Save result
     *
     * @param int $result
     * @param int $userId
     * @param int $testId
     * @param int $typeCalculation
     */
    private function setResult(int $result, int $userId, int $testId, int $typeCalculation)
    {
        $resultModel = new Result();
        $resultModel->create([
            'user_id' => $userId,
            'test_id' => $testId,
            'calculation_id' => $typeCalculation,
            'result' => $result
        ]);
    }
}
