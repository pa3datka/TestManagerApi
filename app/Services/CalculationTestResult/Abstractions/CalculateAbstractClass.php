<?php


namespace App\Services\CalculationTestResult\Abstractions;


abstract class CalculateAbstractClass
{
    /**
     * @param $correctAnswer
     * @param $answer
     * @return bool
     */
    protected function comparingArrays($correctAnswer, $answer)
    {
        $countCorrectAnswers = count($correctAnswer) -1;
        $countAnswers = count($answer) -1;

        for ($i = 0; $i <= $countCorrectAnswers; $i++) {
            for ($r = 0; $r <= $countAnswers; $r++) {
                if (isset($correctAnswer[$i]) && isset($answer[$r]) && $correctAnswer[$i] == $answer[$r]) {
                    unset($correctAnswer[$i]);
                    unset($answer[$r]);
                }
            }
        }
        if (empty($correctAnswer) && empty($answer)) {
            return true;
        }
        return false;
    }

    /**
     * @param $correctAnswers
     * @param $answers
     * @return mixed
     */
    abstract protected function calculationResults($correctAnswers, $answers);
}
