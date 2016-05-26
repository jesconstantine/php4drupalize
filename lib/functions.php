<?php

// load composer packages automatically
require './vendor/autoload.php';

function get_connection() {
  $config = require 'lib/config.php';

  $pdo = new PDO(
    $config['database_dsn'],
    $config['database_user'],
    $config['database_pass']
  ); // PDO class, returns pdo object which we return

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //d($pdo);die;
  return $pdo;
}

function get_pets($limit = null) {
  $pdo = get_connection();
  // address having variable in sql query (vulnerable to injection IE ; TRUNCATE pet;) by using prepared statements
  $query = 'SELECT * FROM pet';
  if ($limit) {
    $query .= ' LIMIT :resultLimit';

  }
  $stmt = $pdo->prepare($query);
  $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
  //d($rows);die;
  return $pets;
}

function get_pet($id) {
  $pdo = get_connection();
  // address having variable in sql query (vulnerable to injection IE ; TRUNCATE pet;) by using prepared statements
  $query = 'SELECT * FROM pet WHERE id = :idVal';
  $stmt = $pdo->prepare($query); // returns pdo object
  $stmt->bindParam('idVal', $id); // bind $id to idVal
  $stmt->execute();

  return $stmt->fetch();

}

function save_pets($petsToSave) {
  //d($petsToSave); die;
  $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
  file_put_contents('data/pets.json', $json);
}