<?php

namespace App\Http\Controllers\Api\TestManager\Common;

use App\Http\Controllers\Api\TestManager\BaseController;
use Illuminate\Http\JsonResponse;
use App\Repositories\Api\TestManager\Common\TestRepository;

class TestController extends BaseController
{
    /**
     * @var TestRepository
     */
    private TestRepository $testRepository;

    /**
     * TestController constructor.
     */
    public function __construct()
    {
        $this->testRepository = new TestRepository();
    }

    /**
     * Displaying a list of tests with the 'visible to all' modifier.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tests = $this->testRepository->getAllTests();
        return response()->json($tests);
    }

    /**
     * Displaying a test with the 'visible to all' modifier.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $test = $this->testRepository->showTest($id);
        return response()->json($test);
    }

    /**
     *  Show tests that belong to a category
     *
     * @param int $categoryId
     * @return JsonResponse
     */
    public function getAllTestsCategory(int $categoryId): JsonResponse
    {
        $category = $this->testRepository->showTestsBelongCategory($categoryId);
        return response()->json($category);
    }

}
