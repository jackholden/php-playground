<?php

declare(strict_types=1);

/*
 * Simple config constant
 */
const jsonOn = false;

/**
 * Countries Playground
 */
if (jsonOn) {
    $getCountries = file_get_contents('src/data/countries.json'); // json format
    $getCountries = json_decode($getCountries, true, 512, JSON_THROW_ON_ERROR); // convert json to php array
} else {
    $getCountries = require 'data/countries.php'; // array format
}