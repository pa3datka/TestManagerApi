<?php


namespace App\Services\CalculationTestResult;



use App\Services\CalculationTestResult\Options\Score;
use App\Services\CalculationTestResult\Options\Percent;

class CalculateResultService
{
    private $arrAnswers;
    private $typeCalculation;
    private $questions;
    private static $availableEngine = [
        'Score' => Score::class,
        'Percent' =>Percent::class
    ];
    private static $variantResults = [
        'Score' => 'балла(ов)',
        'Percent' => '%'
    ];

    /**
     * CalculationService constructor.
     *
     * @param $test
     * @param $answers
     */
    public function __construct($test, $answers)
    {
        $this->arrAnswers = $answers;
        $this->typeCalculation = $test->calculation['slug'];
        $this->questions = $test->quests;
    }

    /**
     * @return mixed
     */
    public function resultTest()
    {
        $correctAnswers = $this->getCorrectResults();
        $result = $this->calculationEngine($this->typeCalculation);
        return $result->calculationResults($correctAnswers,$this->arrAnswers) . ' ' . self::$variantResults[$this->typeCalculation];
    }

    /**
     * @param $class
     * @return mixed
     */
    private function calculationEngine($class)
    {
        return new self::$availableEngine[$class];
    }

    /**
     * @param $quests
     * @return array
     */
    private function getCorrectResults(): array
    {
        $countQuestions = count($this->questions) -1;
        $correctAnswers = [];
        for ($i = 0; $i<= $countQuestions; $i++) {
            $countAnswers = count($this->questions[$i]['answers']) - 1;
            for ($r = 0; $r <= $countAnswers; $r++) {
                if ($this->questions[$i]['answers'][$r]['status'] == 1) {
                    $correctAnswers[$i][] = $this->questions[$i]['answers'][$r]['id'];
                    $correctAnswers[$i]['evaluation'] = $this->questions[$i]['evaluation'];
                }
            }
        }
        return $correctAnswers;
    }

}
