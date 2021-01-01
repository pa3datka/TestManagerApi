<?php


namespace App\Services\CalculationTestResult;


use App\Services\CalculationTestResult\Options\Ball;
use App\Services\CalculationTestResult\Options\Percent;
use Illuminate\Support\Facades\Auth;

class CalculateResultService
{
    private $arrAnswers;
    private $typeCalculation;
    private $test;
    private $resultRepository;
    private static $availableEngine = [
        'BallCalculation' => Ball::class,
        'PercentCalculation' =>Percent::class
    ];
    private static $variantResults = [
        'Ball' => 'балла(ов)',
        'Percent' => '%'
    ];

    /**
     * CalculationService constructor.
     * @param $arrAnswers
     * @param $testId
     */
    public function __construct($arrAnswers, $testId)
    {
        $this->arrAnswers = $arrAnswers;
        $this->resultRepository = new ResultRepository();
        $this->test = (new TestRepository())->loadAllRelationships($testId);
        $this->typeCalculation = $this->test->calculation['slug'];
    }

    /**
     * @return mixed
     */
    public function resultTest()
    {
        $arrCorrectAnswers = $this->getCorrectResults($this->test->quests);
        $result = $this->calculationEngine($this->typeCalculation)
            ->calculationResults($arrCorrectAnswers,$this->arrAnswers);
        $userId = Auth::user() ? Auth::id() : 1;
        $this->resultRepository->setResult($result, $userId, $this->test['id'], $this->test['calculation_id']);
        return $result. ' ' .self::$variantResults[$this->typeCalculation];
    }

    /**
     * @param $class
     * @return mixed
     */
    private function calculationEngine($class)
    {
        return new self::$availableEngine[$class.'Calculation'];
    }

    /**
     * @param $quests
     * @return array
     */
    private function getCorrectResults($quests)
    {
        $countQuests = count($quests) -1;
        $correctAnswers = [];
        for ($i = 0; $i <= $countQuests; $i++) {
            if ($this->typeCalculation === 'Ball') $correctAnswers[$i]['ball'] = $quests[$i]['ball'];
            $answers = $quests[$i]['answers'];
            foreach ($answers as $answer) {
                if ($answer->status == 1) {
                    $correctAnswers[$i][] = $answer->id;
                }
            }
        }
        return $correctAnswers;
    }

}
