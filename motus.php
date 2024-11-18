<?php

require_once 'Class/BO/MotusGame.php';

$mots = ["chaise", "banane", "soleil", "livres", "cactus",
    "orange", "papaye", "valise", "fenetre", "voiture",
    "canard", "tomate", "guitare", "nuage", "elephant",
    "ballon", "plante", "crayon", "cuisine", "chateau"];
$game = new MotusGame($mots);
$game->start();
