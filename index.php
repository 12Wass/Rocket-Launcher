<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index - Rocket Launcher</title>
  </head>
  <body>
    <?php
    if (isset($_SESSION['flag'])) { ?>
      <a href="disconnect.php">Deconnexion</a>

  <?php   } else { ?>
    <a href="newConnexion.php">Connexion</a>
    <a href="newInscription.php">Inscription</a>
  <?php } ?>
  </body>
</html>
