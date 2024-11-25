<?php

namespace BrainGames\brainGamesGcdLogic;

use function BrainGames\engine\runGameProfile;

function randomNumber () {   
    return rand(1,100);
}

function gcd ($num1, $num2) {

    while ($num2 !== 0) {

        $r = $num1 % $num2;

        $num1 = $num2;
        $num2 = $r;

    }

    return $num1;
}


function gcdGameStart() {

    $gameDescription = "Find the greatest common divisor of given numbers.";

    $count = 0;

    while ($count < 3) {

    $num1 = randomNumber ();
    $num2 = randomNumber ();

    $correctAnswer = gcd ($num1, $num2);
    $correctAnswer = (string) $correctAnswer;

    $question = "{$num1} {$num2}";
   
    $generateRound[] = [$question, $correctAnswer];

    $count++;
    
}

    runGameProfile($gameDescription, $generateRound);

}