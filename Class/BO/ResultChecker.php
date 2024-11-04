<?php

class ResultChecker {
    private $motMystere;

    public function __construct($motMystere) {
        $this->motMystere = $motMystere;
    }

    public function checkGuess($guess) {
        $result = "";
        for ($i = 0; $i < $this->motMystere->getLength(); $i++) {
            if ($this->motMystere->isLetterCorrect($guess[$i], $i)) {
                $result .= strtoupper($guess[$i]);
            } elseif ($this->motMystere->contains($guess[$i])) {
                $result .= strtolower($guess[$i]);
            } else {
                $result .= ".";
            }
        }
        return $result;
    }

    public function isCorrect($guess) {
        return strtolower($guess) === $this->motMystere->getWord();
    }
}
