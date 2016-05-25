<?php

// load composer packages automatically
require './vendor/autoload.php';

function get_pets() {
    $petsJson = file_get_contents('data/pets.json');
    $pets = json_decode($petsJson, true);
    return $pets;
}

function save_pets($petsToSave) {
  //d($petsToSave); die;
  $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
  file_put_contents('data/pets.json', $json);
}