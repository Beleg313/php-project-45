<?php

namespace BrainGames\brainGamesProgressionLogic;

use function BrainGames\engine\runGameProfile;

function randomNumber($min, $max)
{
    return rand($min, $max);
}

function makeProgression()
{
    $array = [];

    $start = randomNumber(1, 50);

    $counter = 9;

    $array[] = $start;

    $progression = randomNumber(2, 10);
    $newNum = $start;
    while ($counter > 0) {
        $newNum += $progression;
        $array[] = $newNum;

        $counter--;
    }

    $hideNum = array_rand($array);
    $hideNum = (string) $array[$hideNum];

    $result = implode(" ", $array);

    $result = str_replace($hideNum, '..', $result);

    return [$result, $hideNum];
}


function progressionGameStart()
{
    $gameDescription = "What number is missing in the progression?";

    $generateRound = [];
    $count = 0;
    while ($count < 3) {
        $temp = makeProgression();

        $correctAnswer = $temp[1];
        $correctAnswer = (string) $correctAnswer;

        $question = "{$temp[0]}";

        $generateRound[] = [$question, $correctAnswer];

        $count++;
    }
    runGameProfile($gameDescription, $generateRound);
}
