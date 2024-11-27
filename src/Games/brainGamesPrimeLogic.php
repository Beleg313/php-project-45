<?php

namespace BrainGames\brainGamesPrimeLogic;

use function BrainGames\engine\runGameProfile;

function randomNumber () {   
    return rand(1,100);
}

function basicConditionsCheck ($num) {

    if($num < 2) {
        return 'no';
    }

    if($num === 2) {
        return 'yes';
    }

    if(($num % 2 === 0) && $num > 2) {
        return 'no';
    }
}

function isPrime ($num) {

    basicConditionsCheck ($num);

    $squereNum = round(sqrt($num));

    for ($i = 2; $i <= $squereNum; $i++) {

        if($num % $i === 0) {
            return 'no';
        }

    }

    return 'yes';

}

function primeGameStart() {

    $gameDescription = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    $count = 0;

    while ($count < 3) {
        
    $num = randomNumber ();

    $question = "{$num}";


    $correctAnswer = isPrime ($num);   
        
   
    $generateRound[] = [$question, $correctAnswer];

    $count++;
    
}

    runGameProfile($gameDescription, $generateRound);

}