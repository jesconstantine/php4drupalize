<?php

// load composer packages automatically
require './vendor/autoload.php';

function get_pets() {
    $petsJson = file_get_contents('data/pets.json');
    $pets = json_decode($petsJson, true);
    return $pets;
}