<?php require 'lib/functions.php'; ?>
<?php require 'layout/header.php'; ?>
<?php

// d($_SERVER);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
  else {
    $name = '';
  }
  if (isset($_POST['breed'])) {
    $breed = $_POST['breed'];
  }
  else {
    $breed = '';
  }
  if (isset($_POST['weight'])) {
    $weight = $_POST['weight'];
  }
  else {
    $weight = '';
  }
  if (isset($_POST['bio'])) {
    $bio = $_POST['bio'];
  }
  else {
    $bio = '';
  }

  $pets = get_pets();
  $newPet = array(
    'name' => $name,
    'breed' => $breed,
    'weight' => $weight,
    'bio' => $bio,
    'age' => '',
    'image' => ''
  );

  $pets[] = $newPet;

  $json = json_encode($pets);
  file_put_contents('data/pets.json', $json);

  // d($name, $breed, $weight, $bio);
}
?>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1>Add your pet!!! Squirrel!!!</h1>
          <form action="/pets_new.php" method="post">
            <div class="form-group">
              <label for="pet-name" class="control-label">Pet Name</label>
              <input type="text" name="name" id="pet-name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="pet-breed" class="control-label">Breed</label>
              <input type="text" name="breed" id="pet-breed" class="form-control" />
            </div>
            <div class="form-group">
              <label for="pet-weight" class="control-label">Weight</label>
              <input type="text" name="weight" id="pet-weight" class="form-control" />
            </div>
            <div class="form-group">
              <label for="pet-bio" class="control-label">Bio</label>
              <input type="text" name="bio" id="pet-bio" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">
              <span class="glyphicon glyphicon-heart"></span>
              Add
            </button>
          </form>
        </div>
      </div>


<?php require 'layout/footer.php'; ?>