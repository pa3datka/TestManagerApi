<?php

namespace App\Http\Controllers\Api\TestManager\Common;

use App\Http\Controllers\Controller;
use App\Services\Repositories\Api\TestManager\Common\CategoryRepository;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    private CategoryRepository $CategoryRepository;

    public function __construct()
    {
        $this->CategoryRepository = new CategoryRepository();
    }

    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categoryList = $this->CategoryRepository->getListCategories();
        return response()->json($categoryList);
    }

}
