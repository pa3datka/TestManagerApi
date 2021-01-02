<?php


namespace App\Services\CalculationTestResult\Options;


use App\Services\CalculationTestResult\Abstractions\CalculateAbstractClass;


class Score extends CalculateAbstractClass
{

    public function calculationResults($correctAnswers, $answers)
    {
        $result = 0;
        $countCorrectAnswers = count($correctAnswers) - 1;
        for ($i = 0; $i <= $countCorrectAnswers; $i++) {
            $evaluation = $correctAnswers[$i]['evaluation'];
            unset($correctAnswers[$i]['evaluation']);
            if ($this->comparingArrays($correctAnswers[$i], $answers[$i])) {
                $result += $evaluation;
            }
        }
        return $result;
    }
}
