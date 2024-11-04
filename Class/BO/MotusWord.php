<?php

class MotusWord {
    private $word;

    public function __construct($word) {
        $this->word = strtolower($word);
    }

    public function getLength() {
        return strlen($this->word);
    }

    public function getFirstLetter() {
        return $this->word[0];
    }

    public function getWord() {
        return $this->word;
    }

    public function contains($letter) {
        return strpos($this->word, $letter) !== false;
    }

    public function isLetterCorrect($letter, $position) {
        return $this->word[$position] === $letter;
    }
}
