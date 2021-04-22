<?php

require 'BmiCalculator.php';

use Jackhelodeon\BmiCalculator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') // check if posted form
{
    $units = $_POST['units'] ? 1 : 0;

    if ($units === 1) { // imperial
        $weight_stone = $_POST['weight-stone'];
        $weight_pounds = $_POST['weight-pounds'];

        $height_feet = $_POST['height-feet'];
        $height_inches = $_POST['height-inches'];

        $weight = $weight_stone + ($weight_pounds / 14); // get two, down to one (stone)
        $height = ($height_feet * 12) + $height_inches; // get two, down to one (inches)
    } else { // metric
        $weight = $_POST['weight-metric'];
        $height = $_POST['height-metric'];
    }

    $calculator = new BmiCalculator($weight, $height, $units);
    $result = $calculator->doBMI();
}