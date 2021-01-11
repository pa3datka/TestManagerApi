<?php

namespace App\Http\Controllers\Api\TestManager\User;

use App\Http\Controllers\Api\TestManager\BaseController;
use App\Http\Requests\TestRequest;
use App\Models\Api\TestManager\Test\Answer;
use App\Models\Api\TestManager\Test\Test;
use App\Repositories\Api\TestManager\UserRepositories\TestRepository;
use App\Services\ImageInterventionService\ImageIntervention;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends BaseController
{
    private TestRepository $testRepository;

    public function __construct()
    {
        $this->testRepository = new TestRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tests = $this->testRepository->getAllUserTests();
        return response()->json($tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        $form = $this->testRepository->showFormCreateTest();
        return response()->json($form);
    }


    public function store(TestRequest $request): JsonResponse
    {
        $testId = $this->saveTest($request);
        return response()->json($testId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $newTest
     * @return mixed
     */
    private function saveTest($newTest)
    {
        return  DB::transaction(function () use ($newTest) {
            $testModel = new Test();
            $test = $testModel->create([
                'user_id' => Auth::id(),
                'head' => $newTest['head'],
                'description' => $newTest['description'],
                'access_id' => $newTest['access_id'],
                'calculation_id' => $newTest['calculation_id'],
                'category_id' => $newTest['category_id'],
                'time' => $newTest['time'],
                'attempts' => $newTest['attempts'],
                'image' => (new ImageIntervention())->saveImage($newTest['image'])
            ]);
            $numberQuest = 1;
            foreach ($newTest->questions as $quest) {
                $newQuest = $test->questions()->create([
                    'quest' => $quest['quest'],
                    'number' => $numberQuest++,
                    'image' => (new ImageIntervention())->saveImage($quest['image']),
                    'evaluation' =>  $quest['score'],
                ]);
                foreach ($quest['answers'] as $answers) {

                        if ($answers['variant'] === 'image') {
                            $newQuest->answers()->saveMany([
                                new Answer([
                                    'answer' => '',
                                    'status' => $answers['status'],
                                    'image' => (new ImageIntervention())->saveImage($answers['answer'], 150, 200),
                                    'variant' => $answers['variant']
                                ]),

                            ]);
                        } else if ($answers['variant'] === 'text') {
                            $newQuest->answers()->saveMany([
                                new Answer ([
                                    'answer' => $answers['answer'],
                                    'status' => $answers['status'],
                                    'image' => '',
                                    'variant' => $answers['variant']
                                ])
                            ]);
                        }


                }
            }
            return $test->id;
        });
    }
}
