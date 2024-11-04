<?php

class Player {
    private $wordLength;

    public function __construct($wordLength) {
        $this->wordLength = $wordLength;
    }

    public function getGuess() {
        return trim(fgets(STDIN));
    }

    public function isValidLength($guess) {
        return strlen($guess) === $this->wordLength;
    }
}
