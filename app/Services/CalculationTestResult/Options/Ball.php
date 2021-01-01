<?php


namespace App\Services\CalculationTestResult\Options;


use App\Services\CalculationTestResult\Abstractions\CalculateAbstractClass;


class Ball extends CalculateAbstractClass
{

    public function calculationResults($correctAnswers, $answers)
    {
        $result = 0;

        $countCorrectAnswers = count($correctAnswers) - 1;
        for ($i = 0; $i <= $countCorrectAnswers; $i++) {
            $ball = $correctAnswers[$i]['ball'];
            unset($correctAnswers[$i]['ball']);
            if ($this->comparingArrays($correctAnswers[$i], $answers[$i])) {
                $result += $ball;
            }
        }
        return round($result);
    }
}
