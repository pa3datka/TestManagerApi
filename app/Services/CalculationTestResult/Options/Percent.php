<?php


namespace App\Services\CalculationTestResult\Options;

use App\Services\CalculationTestResult\Abstractions\CalculateAbstractClass;

class Percent extends CalculateAbstractClass
{

    public function calculationResults($correctAnswers, $answers): int
    {
        $result = 0;
        $countCorrectAnswers = count($correctAnswers) - 1;

        for ($i = 0; $i <= $countCorrectAnswers; $i++) {
            unset($correctAnswers[$i]['evaluation']);
            if ($this->comparingArrays($correctAnswers[$i], $answers[$i])) {
                $result += 1;
            }
        }
        $result = round((100 / (count($correctAnswers)) * $result), 2);
        return $result;
    }
}
