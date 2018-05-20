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
        <form action="sendInformationsMarque.php" method="POST">
          <input type="text" placeholder="Nom..." id="name" name="name" height="500"/> <br>
          <input type="text" placeholder="Nom du responsable..." id="lastNameRes" name="lastNameRes" height="500"/> <br>
          <input type="text" placeholder="Prénom du responsable..." id="firstNameRes" name="firstNameRes" height="500"/> <br>
          <input type="text" placeholder="Description..." id="description" name="description"/><br>
          <input type="text" placeholder="Image (Lien externe)" id="image" name="image"/><br>
          <input type="text" placeholder="Site internet... (ex: monsite.fr)" id="url" name="url"/><br>
          <input type="submit" value="Envoyer" />
        </form>
    </div>
  </body>
</html>
<?php } ?>
