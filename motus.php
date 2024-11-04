<?php

require_once 'Class/BO/MotusGame.php';

$mots = ["chaise", "banane", "soleil", "livres", "cactus"];
$game = new MotusGame($mots);
$game->start();
