<?php

namespace BrainGames\brainGamesCalcLogic;

use function BrainGames\engine\runGameProfile;

function randomNumber()
{
    return rand(1, 10);
}

function randomOperator()
{
    $operators = ['+', '-', '*'];
    $key = array_rand($operators);

    return $operators[$key];
}

function calculation($num1, $num2, $operator)
{
    if ($operator === '+') {
        return $num1 + $num2;
    } elseif ($operator === '-') {
        return $num1 - $num2;
    } elseif ($operator === '*') {
        return $num1 * $num2;
    }
}

function calcGameStart()
{
    $gameDescription = "What is the result of the expression?";

    $count = 0;
    while ($count < 3) {
        $num1 = randomNumber();
        $num2 = randomNumber();
        $operator = randomOperator();

        $correctAnswer = calculation($num1, $num2, $operator);

        $correctAnswer = (string) $correctAnswer;

        $question = "{$num1} {$operator} {$num2}";

        $generateRound[] = [$question, $correctAnswer];

        $count++;
    }
    runGameProfile($gameDescription, $generateRound);
}
