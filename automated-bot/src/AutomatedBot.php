<?php

declare(strict_types=1);

namespace Jackhelodeon;

class AutomatedBot
{

    private const personAvailable = '20:00'; // person available till 9pm, then switch message

    private array $responses = [
        'universal' => [
            'hi' => 'Hi there :)',
            'bye' => 'Thanks for getting in touch',
            'unsure' => 'I\'m unsure, please try rewording',
            'question' => 'I don\'t know how to answer that just yet :/', // generic question: need to figure out best way to incorporate this
            'yell' => 'No need to yell!',
            'rude' => 'There\'s no need for that!',
            'rude1' => 'I have feelings too :(',
            'blank' => 'Stop wasting my time, there are people who need me!',

            'request_person' => 'To speak to a person please call 000000000 or email support@domain.uk',
            'request_personX' => 'There are no humans available at the moment. I\'m all you have :)',
        ],

        'topics' => [
            //topics are added
        ]
    ];

    public function __construct($json = null)
    {
        if ($json !== null) {
            $responses = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
            $this->responses['topics'] += $responses; // add to topics array
        }
    }

    public function getTopics(): mixed
    {
        return $this->responses['topics'];
    }

    public function botResponse(string $query, string $topic = null): mixed
    {
        if ($this->isGreeting($query)) { // if greeting
            return $this->responses['universal']['hi'];
        }
        if ($this->isBye($query)) { // if bye
            return $this->responses['universal']['bye'];
        }
        if ($this->isYellQuestion($query) && !is_null($topic)) { // if question
            $query = strtolower($query);

            foreach ($this->responses['topics'][$topic] as $key => $value) {
                if (preg_match('-'. $key .'-', $query)) {
                    return $this->responses['universal']['yell'] . ' ' . $value;
                }
            }

            return $this->responses['universal']['yell'] . ' ' . $this->responses['universal']['question'];
        }
        if ($this->isQuestion($query) && !is_null($topic)) { // if question... use ? or how do i to trigger etc.
            $query = strtolower($query);

            foreach ($this->responses['topics'][$topic] as $key => $value) {
                if (preg_match('-'. $key .'-', $query)) {
                    return $value;
                }
            }

            return $this->responses['universal']['question'];
        }
        if ($this->isRude($query)) { // if rude
            if (random_int(0, 1)) {
                return $this->responses['universal']['rude'];
            }
            return $this->responses['universal']['rude1'];
        }
        if ($this->isRequestingHuman($query)) {
            return $this->responses['universal']['request_person'];
        }
        if ($this->isRequestingHuman($query) === false) {
            return $this->responses['universal']['request_personX'];
        }

        return $this->responses['universal']['unsure'];
    }

    private function isQuestion(string $query)
    {
        $searchPhrases = ['how do i', 'is it possible'];
        if ($query !== str_ireplace($searchPhrases, "XX", $query)) {
            return true;
        }
        if (str_ends_with($query, '?')) {
            return true;
        }

        return false;
    }

    private function isYellQuestion(string $query)
    {
        $queryLength = strlen($query);
        if (str_ends_with($query, '?') && strlen(preg_replace('![^A-Z]+!', '', $query)) > ($queryLength / 2) + 1) {
            return true;
        }
        if (preg_replace( '/[^a-zA-Z]+/', '', $query) && ctype_upper($query)) {
            return true;
        }

        return false;
    }

    private function isRude(string $query)
    {
        $searchPhrases = ['useless', 'idiot', 'crap'];
        if ($query !== str_ireplace($searchPhrases, "XX", $query)) {
            return true;
        }
        if (str_ends_with($query, '!')) {
            return true;
        }

        return false;
    }

    private function isGreeting(string $query)
    {
        // run numerous checks i.e. 'hi', 'hello'
        $searchPhrases = ['hi', 'hello', 'greetings', ':)'];
        return $query !== str_ireplace($searchPhrases, "XX", $query);
    }

    private function isBye(string $query)
    {
        // run numerous checks i.e. 'bye', 'cya', word length
        $searchPhrases = ['bye', 'cya', 'in a bit', 'goodbye'];
        return $query !== str_ireplace($searchPhrases, "XX", $query);
    }

    private function isRequestingHuman(string $query)
    {
        // run numerous checks i.e. 'swear words', 'ALL UPPERCASE', word length

        // check if mentions word 'person, human'
        $searchPhrases = ['person', 'human', 'agent'];
        if ($query !== str_ireplace($searchPhrases, "XX", $query)) {
            return !(date("H") > self::personAvailable);
        }

        return false;
    }

}
