<?php
  header('Location: brandProfile.php');
  session_start();
  require_once('admin/bddConnect.php');

  $userMail = $_SESSION['mail'];
  // require_once('admin/password_encryption.php');
  // On vérifie l'existence des variables :

  if (empty($_POST['lastNameRes']) ||
      empty($_POST['firstNameRes']) ||
      empty($_POST['description']) ||
      empty($_POST['image']) ||
      empty($_POST['url']) ||
      empty($_POST['name']))
      {
        include('erreurInscription.php?error=manquant');
      }
  else {
  // On initialise les variables :
    $lastNameRes = htmlspecialchars($_POST['lastNameRes']);
    $firstNameRes = htmlspecialchars($_POST['firstNameRes']);
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);
    $url = htmlspecialchars($_POST['url']);

  // On récupère l'ID de l'utilisateur grâce à son adresse mail

        $req = $bdd->prepare('SELECT id FROM Users WHERE email = ?');
        $req->execute(array($_SESSION['mail']));
        $idTemp = $req->fetch();
        $idUser = $idTemp[0];

        $req = $bdd->prepare('INSERT INTO Brands(idUser, name, description, firstNameRes, lastNameRes, image, url)
                                                      VALUES (?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($idUser, $name, $description, $firstNameRes, $lastNameRes, $image, $url));
                          }
                          $_SESSION['name'] = $data['name'];
                          $_SESSION['description'] = $data['description'];
                          $_SESSION['mail'] = $mail;
                          $_SESSION['firstNameRes'] = $data['firstNameRes'];
                          $_SESSION['lastNameRes'] = $data['lastNameRes'];
                          $_SESSION['flag'] = true;
  ?>
