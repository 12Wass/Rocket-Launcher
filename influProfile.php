<?php
session_start();
require_once('admin/bddConnect.php');
if ($_SESSION['flag'] != true || !isset($_SESSION['flag']) || $_SESSION['userType'] != 'influencer'){
  echo 'Accès interdit, retournez au <a href="index.php">menu</a>';
}
else {
$email = $_SESSION['mail'];
$req = $bdd->prepare('SELECT * FROM Users WHERE email = ?');
$req->execute(array($email));
$userInfo = $req->fetch();

$userId = $userInfo['id'];

$getInflu = $bdd->prepare('SELECT * FROM Influencers WHERE idUser = ?');
$getInflu->execute(array($userId));
$influInfo = $getInflu->fetch();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil Influenceur - Rocket Launcher</title>
  </head>
  <body>
    <h2>Bienvenue, <?php echo $influInfo['firstName'];?>.</h2>
    <p>Ici vous pouvez modifier vos informations personnelles</p>

    <form action="influUpdate.php" method="post">
      <fieldset>
        <legend>Infos Influenceur</legend>
      <label for="firstNameEdit">Prénom</label>
        <input type="text" value="<?php echo $influInfo['firstName']; ?>" name="firstNameEdit"></input><br>
      <label for="lastNameEdit">Nom</label>
        <input type="text" value="<?php echo $influInfo['lastName']; ?>" name="lastNameEdit"></input><br>
      <label for="addressEdit">Address</label>
        <input type="text" value="<?php echo $influInfo['address']; ?>" name="addressEdit"></input><br>
      <label for="cityEdit">Ville</label>
        <input type="text" value="<?php echo $influInfo['city']; ?>" name="cityEdit"></input><br>
      <label for="postalCodeEdit">Code Postal</label>
        <input type="text" value="<?php echo $influInfo['postalCode']; ?>" name="postalCodeEdit"></input><br>
      <label for="themesEdit">Thèmes</label>
        <input type="text" value="<?php echo $influInfo['themes']; ?>" name="themesEdit"></input><br>
      <label for="bioEdit">Biographie</label>
        <input type="text" value="<?php echo $influInfo['bio']; ?>" name="bioEdit"></input><br>
      <label for="hobbiesEdit">Hobbies</label>
        <input type="text" value="<?php echo $influInfo['hobbies']; ?>" name="hobbiesEdit"></input><br>
      <label for="remunerationTypeEdit">Type de rémunération</label>
        <input type="text" value="<?php echo $influInfo['remunerationType']; ?>" name="remunerationTypeEdit"></input><br>
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
<input type="hidden" value="<?php echo $userInfo['id']; ?>" name="id"/>

      <button onclick="updateInfluencer()" value="Envoyer" placeholder="Envoyer"/>
  </form>
    <script src="functions.js"></script>
  </body>
</html>



<?php }?>
