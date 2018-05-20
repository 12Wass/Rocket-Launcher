<?php
require_once('../bddConnect.php');
header('Location: index.php');
$userEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
$userEmail->execute(array($_POST['id']));
$brandEmail = $userEmail->fetch();

$idUser = $_POST['id'];

$req = $bdd->prepare('SELECT * FROM Brands WHERE idUser = ?');
$req->execute(array($_POST['id']));
$brandInfo = $req->fetch();

  if ($_POST['nameEdit'] != $brandInfo['name'] || !empty($_POST['nameEdit'])) {
    $query = $bdd->prepare('UPDATE Brands SET name = ? WHERE idUser = ?');
    $query->execute(array($_POST['nameEdit'], $idUser));
  }
  if ($brandInfo['firstNameRes'] != $_POST['firstNameResEdit'] || !empty($_POST['firstNameResEdit'])) {
    $query = $bdd->prepare('UPDATE Brands SET firstNameRes = ? WHERE idUser = ?');
    $query->execute(array($_POST['firstNameResEdit'], $idUser));
  }
  if ($brandInfo['lastNameRes'] != $_POST['lastNameResEdit'] || !empty($_POST['lastNameResEdit'])) {
    $query = $bdd->prepare('UPDATE Brands SET lastNameRes = ? WHERE idUser = ?');
    $query->execute(array($_POST['lastNameResEdit'], $idUser));
  }
  if ($brandInfo['description'] != $_POST['descriptionEdit'] || !empty($_POST['descriptionEdit'])) {
    $query = $bdd->prepare('UPDATE Brands SET description = ? WHERE idUser = ?');
    $query->execute(array($_POST['descriptionEdit'], $idUser));
  }
  if ($brandInfo['url'] != $_POST['urlEdit'] || !empty($_POST['urlEdit'])) {
    $query = $bdd->prepare('UPDATE Brands SET url = ? WHERE idUser = ?');
    $query->execute(array($_POST['urlEdit'], $idUser));
  }
  if ($brandEmail['email'] != $_POST['emailEdit'] || !empty($_POST['emailEdit'])) {
    $query = $bdd->prepare('UPDATE Users SET email = ? WHERE id = ?');
    $query->execute(array($_POST['emailEdit'], $idUser));
  }

?>
