<?php

namespace BrainGames\brainGamesEvenLogic;

use function BrainGames\engine\runGameProfile;

function randomNumber()
{
    return rand(1, 100);
}

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function answer(bool $booleanEven)
{
    $answer = '';
    if ($booleanEven === true) {
        $answer = 'yes';
    } elseif ($booleanEven === false) {
        $answer = 'no';
    }
    return $answer;
}

function evenGameStart()
{
    $gameDescription = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    $generateRound = [];
    $count = 0;
    while ($count < 3) {
        $randomNum = randomNumber();

        $booleanEven = isEven($randomNum);
        $correctAnswer = answer($booleanEven);

        $question = "{$randomNum}";

        $generateRound[] = [$question, $correctAnswer];

        $count++;
    }
    runGameProfile($gameDescription, $generateRound);
}
