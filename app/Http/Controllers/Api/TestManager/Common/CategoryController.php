<?php

namespace App\Http\Controllers\Api\TestManager\Common;

use App\Http\Controllers\Controller;
use App\Repositories\Api\TestManager\Common\CategoryRepository;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $CategoryRepository;

    /**
     * CategoryController constructor.
     */
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
