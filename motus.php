<?php

$mots = ["chaise", "banane", "soleil", "livres", "cactus"];
$mot_mystere = $mots[array_rand($mots)];
$longueur = strlen($mot_mystere);
$essais_max = 6;

echo "Bienvenue dans le jeu Motus !\n";
echo "Devinez le mot mystère de $longueur lettres.\n";
echo "Vous avez $essais_max essais.\n";
echo "Les lettres bien placées seront en majuscule et les lettres présentes mais mal placées seront en minuscule.\n";
echo "Bonne chance !\n\n";

echo "Première lettre : " . strtoupper($mot_mystere[0]) . "\n";

for ($essai = 1; $essai <= $essais_max; $essai++) {
    echo "\nEssai $essai : ";
    $mot_joueur = trim(fgets(STDIN));

    if (strlen($mot_joueur) != $longueur) {
        echo "Le mot doit comporter $longueur lettres !\n";
        $essai--;
        continue;
    }

    $resultat = "";
    for ($i = 0; $i < $longueur; $i++) {
        if ($mot_joueur[$i] === $mot_mystere[$i]) {
            $resultat .= strtoupper($mot_joueur[$i]);
        } elseif (strpos($mot_mystere, $mot_joueur[$i]) !== false) {
            $resultat .= strtolower($mot_joueur[$i]);
        } else {
            $resultat .= ".";
        }
    }

    echo "Résultat : $resultat\n";

    if (strtolower($mot_joueur) === $mot_mystere) {
        echo "\nBravo ! Vous avez trouvé le mot '$mot_mystere' en $essai essais !\n";
        exit;
    }
}

echo "\nDommage ! Le mot mystère était : $mot_mystere\n";
