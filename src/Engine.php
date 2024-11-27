<?php

namespace Braingames\engine;

use function cli\line;
use function cli\prompt;


function runGameProfile ($gameDescription, $generateRound) {

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameDescription);

    $countRightAnswers = 0;

    while ($countRightAnswers < 3) {
        [$question, $correctAnswer] = $generateRound[$countRightAnswers];

        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");        

        if ($userAnswer === $correctAnswer) {            
            line("Correct!");
            $countRightAnswers++;
        }

        else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, {$name}!");
            break;
        }  

    }

    if ($countRightAnswers === 3) {
        line("Congratulations, {$name}!");
    } 

}

