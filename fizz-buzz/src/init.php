<?php

declare(strict_types=1);

// a vvvv simple way
function fizzBuzz()
{
    $output = '';
    foreach (range(1, 100) as $number) {
        if ($number % 3 === 0 && $number % 5 === 0) { // if mulitple of 3 or 5
            $output .= "FizzBuzz <br>";
        } elseif ($number % 3 === 0) {
            $output .= "Fizz <br>";
        } elseif ($number % 5 === 0) {
            $output .= "Buzz <br>";
        } else {
            $output .= "$number <br>";
        }
    }

    return $output;
}

$result  = fizzBuzz();

/*
 *
if ((x & 1) == 0) {
  x is even
}
else {
  x is odd
}
 *
 */