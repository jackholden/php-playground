<?php

require 'AutomatedBot.php';

use Jackhelodeon\AutomatedBot;

date_default_timezone_set('Europe/London'); // set timezone

$data = file_get_contents('src/data/responses.json'); // load redefined responses

$bot = new AutomatedBot($data); // initialise and process $data

$topics = $bot->getTopics(); // get topics from freshly formatted array

if ($_SERVER['REQUEST_METHOD'] === 'POST') // check if posted form
{
    $postQuestion = $_POST['question']; // post the question
    $postTopics = $_POST['topics']; // get topics (next step is to attempt to determine the topic)
    // should be doing santisation to prevent naughty ppl oops

    // check if user input topic is in  (v basic security)
    if (!array_key_exists($postTopics, $topics)) {
        die('topic no exist');
    }

    $response = $bot->botResponse($postQuestion, $postTopics); // the response
}