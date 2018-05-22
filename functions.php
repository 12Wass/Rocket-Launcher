<?php
session_start();
require_once('admin/bddConnect.php');
/* This file was created by Wassim Dahmane, Latif Diomande and Cosma Chevtchouk.
  It contains all of our used functions in Rocket Launcher, our yearly project.

  How it works -
    There's a 'function.js' file that creates a $_POST variable called function.
    This function is called by its name. It is the name which is
    assignated to the functions created right under this text.
    Here's a quick summary of this functions and their numbers :

  FUNCTIONS SUMMARY :
  0 - bddConnect : Connection script to Rocket Launcher's MYSQL database.
  1 - influUpdate : Registers an influencer's new informations into the database.
  2 - brandUpdate : Registers a brand's new informations into the database.
  3 - disconnect : Destroy the running session of a connected user, to disconnect him.
  4 - registerUser : Registers a non-registered user, put his informations into the database
  5 - redirectProfile : This functions redirects the user when he just connected to his profile page.
  6 - connectUser : Connects an user to Rocket Launcher.
  7 - sendInformationsInflu : Send newly registered Influencer informations (through a form)
  8 - sendInformationsBrand : Send newly registered Brand informations (through a form)
  9 - sendInformationsMarque : DASHBOARD : Sends new informations of an updated brand (by an admin)
  10 - sendUserUpdate : DASHBOARD : Sends new informations of an updated influencer (by an admin)
  11 - sendMissionUpdate: DASHBOARD : Sends new informations of an updated campaign (by an admin)
*/

// 0
switch ($_POST['functionSelect']) {
  case '0':
function bddConnect() {
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=rocketlauncher;charset=utf8', 'root', 'root');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }
}

break;

// 1

case 'updateInfluencer';

// This functions registers an user informations update into the database.
  if (isset($_POST['updateInfluencer']) && $_POST['updateInfluencer'] != '0') {
  header('Location: influProfile.php');
  $getEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
  $getEmail->execute(array($_POST['id']));
  $influEmail = $getEmail->fetch();
  $idUser = $_POST['id'];
  $req = $bdd->prepare('SELECT * FROM Influencers WHERE idUser = ?');
  $req->execute(array($_POST['id']));
  $influInfo = $req->fetch();

  /*  if ($_POST['emailEdit'] != $influEmail['email'] || !empty($_POST['emailEdit'])) {
      $query = $bdd->prepare('UPDATE Users SET email = ? WHERE idUser = ?');
      $query->execute(array($_POST['emailEdit'], $idUser));
    } */
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
  }


break;

// 2
case 'brandUpdate';

// This functions also takes the new informations of an user and puts it into the database.
  header('Location: brandProfile.php');
  $getEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
  $getEmail->execute(array($_POST['id']));
  $influEmail = $getEmail->fetch();

  $idUser = $_POST['id'];

  $req = $bdd->prepare('SELECT * FROM Brands WHERE idUser = ?');
  $req->execute(array($_POST['id']));
  $infoBrand = $req->fetch();

  /*  if ($_POST['emailEdit'] != $influEmail['email'] || !empty($_POST['emailEdit'])) {
      $query = $bdd->prepare('UPDATE Users SET email = ? WHERE idUser = ?');
      $query->execute(array($_POST['emailEdit'], $idUser));
    } */
    if ($_POST['nameEdit'] != $infoBrand['name'] || !empty($_POST['nameEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET name = ? WHERE idUser = ?');
      $query->execute(array($_POST['nameEdit'], $idUser));
    }
    if ($_POST['descriptionEdit'] != $infoBrand['description'] || !empty($_POST['descriptionEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET description = ? WHERE idUser = ?');
      $query->execute(array($_POST['descriptionEdit'], $idUser));
    }
    if ($_POST['urlEdit'] != $infoBrand['url'] || !empty($_POST['urlEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET url = ? WHERE idUser = ?');
      $query->execute(array($_POST['urlEdit'], $idUser));
    }
    if ($_POST['firstnamerespEdit'] != $infoBrand['firstNameRes'] || !empty($_POST['firstnamerespEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET firstNameRes = ? WHERE idUser = ?');
      $query->execute(array($_POST['firstnamerespEdit'], $idUser));
    }
    if ($_POST['lastnameresEdit'] != $infoBrand['lastNameRes'] || !empty($_POST['lastnameresEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET lastNameRes = ? WHERE idUser = ?');
      $query->execute(array($_POST['lastnameresEdit'], $idUser));
    }
break;

// 3
case '3';

function disconnect() { // This function completly destroys the running session of an user.
  header('Location: index.php');
  session_start();
  $_SESSION = array();
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  session_destroy();
}

break;

// 4

case 'registerUser'; // This functions adds an user into our databases
  // require_once('admin/password_encryption.php');
  // On vérifie l'existence des variables :
  if (empty($_POST['mail']) ||
      empty($_POST['mdpass']) ||
      empty($_POST['mdpassconfirm']))
      {
        include('erreurInscription.php?error=manquant');
      }
  else {
  // On initialise les variables :
  $mail = htmlspecialchars($_POST['mail']);
  $mdpass = htmlspecialchars($_POST['mdpass']);
  $mdpassconfirm = htmlspecialchars($_POST['mdpassconfirm']);

  // On fais le check-up

  $count = $bdd->prepare("SELECT COUNT(*) AS nbrMail FROM Users WHERE email = ?");
  $count->execute(array($mail));
  $req = $count->fetch(PDO::FETCH_ASSOC);

  if($req['nbrMail'] == 0) // L'adresse mail n'existe pas donc on peut vérifier le Pseudo
  {

      if ($mdpass == $mdpassconfirm)
      {
        $req = $bdd->prepare('INSERT INTO Users(email, password, userType, dateRegistration, dateLastConnection) VALUES (?, ?, ?, NOW(), NOW())');
        $req->execute(array($mail, password_hash($mdpass, PASSWORD_DEFAULT), $_POST['userType']));

        // Les informations sont correctes, on le redirige vers la complétion de son profil.
        if ($_POST['userType'] == "influencer") {
          header("Location: informationsInfluencer.php");
          $_SESSION['flag'] = true;
          $_SESSION['mail'] = $mail;
          $_SESSION['userType'] = 'influencer';
        }
        else {
          header("Location: informationsMarque.php");
          $_SESSION['flag'] = true;
          $_SESSION['mail'] = $mail;
          $_SESSION['userType'] = 'brand';
        }
      }
    }
      else if ($mdpass != $mdpassconfirm) // Les mots de passes ne correspondent pas
      {
        echo('Erreur, les mots de passes rentrés ne correspondent pas.');
      }

      else
      {
      include('errorInscription.php?mailExists');
      echo 'Erreur, adresse mail déjà existante.';
      }
    }

break;

// 5
case '5';

function redirectProfile() {
    if($_SESSION['userType'] == 'influencer') {
      header('Location: influProfile.php');

    }
    else if ($_SESSION['userType'] == 'brand') {
      header('Location: brandProfile.php');
    }
    else {
      echo 'Accès interdit. Redirection. <a href="index.php">Cliquez ici</a>';
    }
}

// 6

case 'connectUser';
  if (empty($_POST['mail']) || empty($_POST['mdpass']))
  {
    include('error/errorConnection.php?missingInput');
    echo 'Vous avez oublié de remplir un des champs.';
  }
  else {
    // On transforme les informations récupérées en variables locales en les protégeants
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = $_POST['mdpass'];
    // On récupére les données correspondante de la base de données
  $query = $bdd->prepare('SELECT * FROM Users WHERE email = :mail');
  $query->bindValue(':mail', $mail, PDO::PARAM_STR);
  $query->execute();
  $data = $query->fetch();
  $idUser = $data['id'];
  $passUser = $data['password'];

    // On vérifie l'existence d'une correspondance
    if (!password_verify($mdp, $passUser)) {

      // Si le mot de passe entré n'est pas le bon
      include('/error/errorConnection.php?wrongIdentifiers');
      echo 'Les identifiants rentrés sont incorrects.';
    }
    else {
    if ($data['userType'] == 'Influencer') {
      $query = $bdd->prepare('SELECT * FROM Influencers WHERE idUser = ?');
      $query->execute(array($idUser));
      $data = $query->fetch();
      $lastConnection = $bdd->prepare('UPDATE Users SET dateLastConnection = NOW() WHERE id = ?');
      $lastConnection->execute(array($idUser));

      $_SESSION['firstName'] = $data['firstName'];
      $_SESSION['lastName'] = $data['lastName'];
      $_SESSION['address'] = $data['address'];
      $_SESSION['city'] = $data['city'];
      $_SESSION['mail'] = $mail;
      $_SESSION['flag'] = true;
      $_SESSION['userType'] = 'influencer';
      header('Location: influProfile.php');
    }

    else {
      $query = $bdd->prepare('SELECT * FROM Brands WHERE idUser = ?');
      $query->execute(array($idUser));
      $data = $query->fetch();
      $lastConnection = $bdd->prepare('UPDATE Users SET dateLastConnection = NOW() WHERE id = ?');
      $lastConnection->execute(array($idUser));

      $_SESSION['name'] = $data['name'];
      $_SESSION['description'] = $data['description'];
      $_SESSION['mail'] = $mail;
      $_SESSION['firstNameRes'] = $data['firstNameRes'];
      $_SESSION['lastNameRes'] = $data['lastNameRes'];
      $_SESSION['flag'] = true;
      $_SESSION['userType'] = 'brand';
      header('Location: brandProfile.php');
        }
      }
    }

break;


// 7

case '7';

function sendInformationsInflu() {
  $userMail = $_SESSION['mail'];
  // require_once('admin/password_encryption.php');
  // On vérifie l'existence des variables :
  if (empty($_POST['lastName']) ||
      empty($_POST['firstName']) ||
      empty($_POST['address']) ||
      empty($_POST['postalCode']) ||
      empty($_POST['city']) ||
      empty($_POST['bio']) ||
      empty($_POST['hobbies']) ||
      empty($_POST['remunerationType']))
      {
        include('erreurInscription.php?error=manquant');
      }
  else {
  // On initialise les variables :
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $address = htmlspecialchars($_POST['address']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $city = htmlspecialchars($_POST['city']);
    $bio = htmlspecialchars($_POST['bio']);
    $hobbies = htmlspecialchars($_POST['hobbies']);
    $remunerationType = htmlspecialchars($_POST['remunerationType']);
    $themes = htmlspecialchars($_POST['themes']);

    // En fonction de ce que l'utilisateur à coché, on créer les variables.

  if (isset($_POST['instagram'])) {
    $instagram = htmlspecialchars($_POST['instagram']);
  }
  else {
    $instagram = 0;
    }

    if (isset($_POST['facebook'])) {
    $facebook = htmlspecialchars($_POST['facebook']);
  }
  else {
    $facebook = 0;
  }

   if (isset($_POST['instagram'])) {
    $twitter = htmlspecialchars($_POST['twitter']);
  }
  else {
    $twitter = 0;
  }

  if (isset($_POST['youtube'])) {
    $youtube = htmlspecialchars($_POST['youtube']);
  }
  else {
    $youtube = 0;
  }


  // On récupère l'ID de l'utilisateur grâce à son adresse mail
        $req = $bdd->prepare('SELECT id FROM Users WHERE email = ?');
        $req->execute(array($_SESSION['mail']));
        $idTemp = $req->fetch();
        $idUser = $idTemp[0];

        $req = $bdd->prepare('INSERT INTO Influencers(idUser, lastName, firstName, address, postalCode, city, bio, hobbies,
                                                      remunerationType, Instagram, Facebook, Twitter, Youtube, themes)
                                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($idUser, $lastName, $firstName, $address, $postalCode, $city, $bio, $hobbies, $remunerationType,
                            $instagram, $facebook, $twitter, $youtube, $themes));
                          }

                          $_SESSION['firstName'] = $data['firstName'];
                          $_SESSION['lastName'] = $data['lastName'];
                          $_SESSION['address'] = $data['address'];
                          $_SESSION['city'] = $data['city'];
                          $_SESSION['mail'] = $mail;
                          $_SESSION['flag'] = true;
}
break;


// 8

case '8';

function sendInformationsBrand() {
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
}
break;

// 9
case '9';
function sendInformationsMarque() {}
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
    if ($brandInfo['image'] != $_POST['imageEdit'] || !empty($_POST['imageEdit'])) {
      $query = $bdd->prepare('UPDATE Brands SET image = ? WHERE idUser = ?');
      $query->execute(array($_POST['imageEdit'], $idUser));
    }
    if ($brandEmail['email'] != $_POST['emailEdit'] || !empty($_POST['emailEdit'])) {
      $query = $bdd->prepare('UPDATE Users SET email = ? WHERE id = ?');
      $query->execute(array($_POST['emailEdit'], $idUser));
    }
    break;


// 10

case '10';

function sendUserUpdate() {
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
}
break;


// 11

case '11';
  // sendMissionUpdate : 11
  $req = $bdd->prepare('SELECT * FROM Campaigns WHERE id = ?');
  $req->execute(array($_POST['id']));
  $campaign = $req->fetch();

  $idBrand = $campaign['idBrand'];
  $brandCampaign = $bdd->prepare('SELECT name FROM Brands WHERE id = ? ');
  $brandCampaign->execute(array($campaign['idBrand']));
  $brandName = $brandCampaign->fetch();

    if ($campaign['description'] != $_POST['descriptionEdit'] || !empty($_POST['descriptionEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET description = ? WHERE id = ?');
      $query->execute(array($_POST['descriptionEdit'], $_POST['id']));
    }
    if ($campaign['followersMin'] != $_POST['followersMinEdit'] || !empty($_POST['followersMinEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET followersMin = ? WHERE id = ?');
      $query->execute(array($_POST['followersMinEdit'], $_POST['id']));
    }
    if ($campaign['followersMax'] != $_POST['followersMaxEdit'] || !empty($_POST['followersMaxEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET followersMax = ? WHERE id = ?');
      $query->execute(array($_POST['followersMaxEdit'], $_POST['id']));
    }
    if ($campaign['themes'] != $_POST['themesEdit'] || !empty($_POST['themesEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET themes = ? WHERE id = ?');
      $query->execute(array($_POST['themesEdit'], $_POST['id']));
    }
    if ($campaign['gratificationType'] != $_POST['gratificationTypeEdit'] || !empty($_POST['gratificationTypeEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET gratificationType = ? WHERE id = ?');
      $query->execute(array($_POST['gratificationTypeEdit'], $_POST['id']));
    }
    if ($campaign['gratificationDetail'] != $_POST['gratificationDetailEdit'] || !empty($_POST['gratificationDetailEdit'])) {
      $query = $bdd->prepare('UPDATE Campaigns SET gratificationDetail = ? WHERE id = ?');
      $query->execute(array($_POST['gratificationDetailEdit'], $_POST['id']));
    }
  break;

case 'sendMessage':
  $req = $bdd->prepare('INSERT INTO messages(idSender, idReceiver, content, date) VALUES ?, ?, ?, ?');
  $req = $bdd->execute(array($_POST['idSender'], $_POST['idReceiver'], $_POST['content'], NOW()));
break;

case 'registerFacebook';

// On initialise les variables :
// On fais le check-up

$count = $bdd->prepare("SELECT COUNT(*) AS nbrMail FROM facebook WHERE userid = ?");
$count->execute(array($_POST['userid']));
$req = $count->fetch(PDO::FETCH_ASSOC);

if($req['nbrMail'] == 0) // L'adresse mail n'existe pas donc on peut vérifier le Pseudo
{
      $req = $bdd->prepare('INSERT INTO facebook(idInfluencer, username, userphoto, useremail, userid) VALUES (?, ?, ?, ?, ?)');
      $req->execute(array(9, $_POST['username'], $_POST['userphoto'], $_POST['useremail'], $_POST['userid']));
      var_dump($_POST);
}
else
{
    include('errorInscription.php?facebookCreated');
    echo 'Erreur, compte Facebook déjà utilisé.';
}
  break;

  default:
      http_response_code(500);
    break;
}








  ?>
