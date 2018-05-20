<?php
if ($_SESSION['flag'] != true || !isset($_SESSION['flag']))
{
  'Vous devez nouvellement inscrit pour accéder à cette page';
}
else {
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion - Rocket Launcher</title>
    <link rel="stylesheet" type="text/css" href="newConnexion.css">
  </head>
  <body>
    <div>
      <h3>Complétez votre profil - Rocket Launcher</h3>
      <p>Bienvenue sur Rocket Launcher, <?php echo $_SESSION['mail'] ?> ! <br>
          Vous devez vous en douter, nous ne savons rien de vous, et nous n'allons pas éternellement vous appeler par votre <br>
          adresse mail! <br>
        Nous vous invitons donc à remplir les champs ci-dessous avant de continuer votre navigation.</p>
        <form action="sendInformations.php" method="POST">
          <input type="text" placeholder="Nom..." id="lastName" name="lastName" height="500"/> <br>
          <input type="text" placeholder="Prénom..." id="lastName" name="firstName"/><br>
          <input type="text" placeholder="Adresse (Numéro de rue, nom de rue...)" id="address" name="address"/><br>
          <input type="text" placeholder="Code Postal... (ex: 75000)" id="postalCode" name="postalCode"/><br>
          <input type="text" placeholder="Ville (ex: Paris)" id="city" name="city"/><br>
          <input type="text" placeholder="Biographie (parlez nous de vous!)" id="bio" name="bio"/><br>
          <input type="text" placeholder="Vos hobbies" id="hobbies" name="hobbies"/> <br>
          <input type="text" placeholder="Thèmes abordés" id="themes" name="themes"/> <br>
          <input type="text" placeholder="Moyen de rémunération" id="remunerationType" name="remunerationType"/> <br>
          <input type="checkbox" name="Instagram" value="Instagram">Instagram</input><br>
          <input type="checkbox" name="Twitter" value="Twitter">Twitter</input><br>
          <input type="checkbox" name="Facebook" value="Facebook">Facebook</input><br>
          <input type="checkbox" name="Youtube" value="Youtube">Youtube</input><br>
          <input type="submit" value="Envoyer"/>
        </form>
    </div>
  </body>
</html>
<?php } ?>
