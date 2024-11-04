<?php

require_once 'MotusWord.php';
require_once 'Player.php';
require_once 'ResultChecker.php';

class MotusGame {
    private $motMystere;
    private $player;
    private $checker;
    private $essaisMax;

    public function __construct($mots, $essaisMax = 6) {
        $this->motMystere = new MotusWord($mots[array_rand($mots)]);
        $this->player = new Player($this->motMystere->getLength());
        $this->checker = new ResultChecker($this->motMystere);
        $this->essaisMax = $essaisMax;
    }

    public function start() {
        echo "Bienvenue dans le jeu Motus !\n";
        echo "Devinez le mot mystère de {$this->motMystere->getLength()} lettres.\n";
        echo "Vous avez {$this->essaisMax} essais.\n";
        echo "Les lettres bien placées seront en majuscule et les lettres présentes mais mal placées seront en minuscule.\n";
        echo "Bonne chance !\n\n";
        echo "Première lettre : " . strtoupper($this->motMystere->getFirstLetter()) . "\n";

        for ($essai = 1; $essai <= $this->essaisMax; $essai++) {
            echo "\nEssai $essai : ";
            $motJoueur = $this->player->getGuess();

            if (!$this->player->isValidLength($motJoueur)) {
                echo "Le mot doit comporter {$this->motMystere->getLength()} lettres !\n";
                $essai--;
                continue;
            }

            $result = $this->checker->checkGuess($motJoueur);
            echo "Résultat : $result\n";

            if ($this->checker->isCorrect($motJoueur)) {
                echo "\nBravo ! Vous avez trouvé le mot '{$this->motMystere->getWord()}' en $essai essais !\n";
                return;
            }
        }

        echo "\nDommage ! Le mot mystère était : {$this->motMystere->getWord()}\n";
    }
}
