<?php
require_once('../bddConnect.php');
// On déclare le formulaire modifié
if (isset($_POST['influenceurForm'])) {
  $choice = $_POST['influenceurForm'];
  $action = 'influenceur';
}
else if (isset($_POST['missionForm'])){
  $choice = $_POST['missionForm'];
  $action = 'mission';
}
else if (isset($_POST['entrepriseForm'])) {
  $choice = $_POST['entrepriseForm'];
  $action = 'entreprise';
}
else if (isset($_POST['usersForm'])) {
  $choice = $_POST['usersForm'];
  $action = 'users';
}
if (isset($_POST['email'])) {
  $mail = $_POST['email'];
}
if (isset($_POST['id'])) {
  $id = $_POST['id'];
}

// Si la modification est demandée sur un influenceur

if ($action == 'influenceur') {
if ($choice == 'Modifier' && $choice == $_POST['influenceurForm']) {
    include('updateUser.php');
}

else if ($choice == 'Supprimer' && $choice == $_POST['influenceurForm']) {
  header('Location: index.php');
  $query = $bdd->prepare('DELETE FROM Influencers WHERE idUser = :id');
  $query->bindValue(':id', $id, PDO::PARAM_STR);
  $query->execute();
 }
}



// Si la modification est demandée sur une mission
if ($action == 'mission'){
if ($choice == 'Modifier' && $choice == $_POST['missionForm']) {
    include('updateMission.php');
}

else if ($choice == 'Supprimer' && $choice == $_POST['missionForm']) {
  header('Location: index.php');
  $query = $bdd->prepare('DELETE FROM Campaigns WHERE id = :id');
  $query->bindValue(':id', $id, PDO::PARAM_STR);
  $query->execute();
 }
}

// Si la modification est demandée sur entreprise
if ($action == 'entreprise'){
if ($choice == 'Modifier' && $choice == $_POST['entrepriseForm']) {
    include('updateEntreprise.php');
}

else if ($choice == 'Supprimer' && $choice == $_POST['entrepriseForm']) {
  header('Location: index.php');
  $query = $bdd->prepare('DELETE FROM Brands WHERE idUser = :id');
  $query->bindValue(':id', $id, PDO::PARAM_STR);
  $query->execute();
 }
}

// Si la modification est demandée sur entreprise
if ($action == 'users'){
if ($choice == 'Modifier' && $choice == $_POST['usersForm']) {
    include('updateEntreprise.php');
}

else if ($choice == 'Supprimer' && $choice == $_POST['usersForm']) {
  header('Location: index.php');
  $query = $bdd->prepare('DELETE FROM Users WHERE id = :id');
  $query->bindValue(':id', $id, PDO::PARAM_STR);
  $query->execute();
 }
}
