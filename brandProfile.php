<?php
session_start();
require_once('admin/bddConnect.php');
if ($_SESSION['flag'] != true || !isset($_SESSION['flag']) || $_SESSION['userType'] != 'brand'){
  echo 'Accès interdit, retournez au <a href="index.php">menu</a>';
}
else {
$email = $_SESSION['mail'];
$req = $bdd->prepare('SELECT * FROM Users WHERE email = ?');
$req->execute(array($email));
$userInfo = $req->fetch();

$userId = $userInfo['id'];

$getBrand = $bdd->prepare('SELECT * FROM Brands WHERE idUser = ?');
$getBrand->execute(array($userId));
$infoBrand = $getBrand->fetch();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil Marque/Entreprise - Rocket Launcher</title>
  </head>
  <body>
    <h2>Bienvenue, <?php echo $infoBrand['name'];?>.</h2>
    <p>Ici vous pouvez modifier vos informations personnelles</p>

    <form method="post">
      <fieldset><legend>Infos Marque/Entreprise</legend>
      <label for="nameEdit">Nom</label>
        <input type="text" value="<?php echo $infoBrand['name']; ?>" name="nameEdit" id="nameEdit"></input><br>
      <label for="descriptionEdit">Description</label>
        <input type="text" value="<?php echo $infoBrand['description']; ?>" name="descriptionEdit" id="descriptionEdit"></input><br>
      <label for="urlEdit">url</label>
        <input type="text" value="<?php echo $infoBrand['url']; ?>" name="urlEdit" id="urlEdit"></input><br>
      <label for="firstnamerespEdit">Prénom Responsable</label>
        <input type="text" value="<?php echo $infoBrand['firstNameRes']; ?>" name="firstnamerespEdit" id="firstnamerespEdit"></input><br>
      <label for="lastnameresEdit">Nom Responsable</label>
        <input type="text" value="<?php echo $infoBrand['lastNameRes']; ?>" name="lastnameresEdit" id="lastnameresEdit"></input><br>
</fieldset>

      <!--  <fieldset><legend>Infos Utilisateur</legend>
          <label for="emailEdit">E-Mail</label>
            <input type="text" value="<?php echo $userInfo['email']; ?>" name="emailEdit"></input><br>
          <label for="emailEdit">Mot de passe</label>
            <input type="text" value="<?php echo $userInfo['password']; ?>" name="emailEdit"></input><br>
          <label for="emailEdit">E-Mail</label>
            <input type="text" value="<?php echo $userInfo['email']; ?>" name="emailEdit"></input><br>
          <label for="emailEdit">E-Mail</label>
            <input type="text" value="<?php echo $userInfo['email']; ?>" name="emailEdit"></input><br>
</fieldset> -->

      <input type="hidden" value="<?php echo $userInfo['id']; ?>" name="id" id="id"></input>
      <input type="button" onclick="brandUpdate()" value="Envoyer"></input>
  </form>
    <a href="index.php">Retourner à l'accueil</a>
        <script src="functions.js"></script>
  </body>
</html>



<?php }?>
