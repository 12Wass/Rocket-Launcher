<?php
require_once('../bddConnect.php');
header('Location: index.php');
$getEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
$getEmail->execute(array($_POST['id']));
$influEmail = $getEmail->fetch();

$idUser = $_POST['id'];

$req = $bdd->prepare('SELECT * FROM Influencers WHERE idUser = ?');
$req->execute(array($_POST['id']));
$influInfo = $req->fetch();

echo $idUser;

  if ($_POST['emailEdit'] != $influEmail['email'] || !empty($_POST['emailEdit'])) {
    $query = $bdd->prepare('UPDATE Users SET email = ? WHERE idUser = ?');
    $query->execute(array($_POST['emailEdit'], $idUser));
  }
  if ($_POST['firstNameEdit'] != $influInfo['firstName'] || !empty($_POST['firstNameEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET firstName = ? WHERE idUser = ?');
    $query->execute(array($_POST['firstNameEdit'], $idUser));
  }
  if ($_POST['lastNameEdit'] != $influInfo['lastName'] || !empty($_POST['lastNameEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET lastName = ? WHERE idUser = ?');
    $query->execute(array($_POST['lastNameEdit'], $idUser));
  }
  if ($_POST['addressEdit'] != $influInfo['address'] || !empty($_POST['addressEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET address = ? WHERE idUser = ?');
    $query->execute(array($_POST['addressEdit'], $idUser));
  }
  if ($_POST['cityEdit'] != $influInfo['city'] || !empty($_POST['cityEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET city = ? WHERE idUser = ?');
    $query->execute(array($_POST['cityEdit'], $idUser));
  }
  if ($_POST['postalCodeEdit'] != $influInfo['postalCode'] || !empty($_POST['postalCodeEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET postalCode = ? WHERE idUser = ?');
    $query->execute(array($_POST['postalCodeEdit'], $idUser));
  }
  if ($_POST['themesEdit'] != $influInfo['themes'] || !empty($_POST['themesEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET themes = ? WHERE idUser = ?');
    $query->execute(array($_POST['themesEdit'], $idUser));
  }
  if ($_POST['bioEdit'] != $influInfo['bio'] || !empty($_POST['bioEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET bio = ? WHERE idUser = ?');
    $query->execute(array($_POST['bioEdit'], $idUser));
  }
  if ($_POST['hobbiesEdit'] != $influInfo['hobbies'] || !empty($_POST['hobbiesEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET hobbies = ? WHERE idUser = ?');
    $query->execute(array($_POST['hobbiesEdit'], $idUser));
  }
  if ($_POST['remunerationTypeEdit'] != $influInfo['remunerationType'] || !empty($_POST['remunerationTypeEdit'])) {
    $query = $bdd->prepare('UPDATE Influencers SET remunerationType = ? WHERE idUser = ?');
    $query->execute(array($_POST['remunerationTypeEdit'], $idUser));
  }

?>
