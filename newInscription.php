<?php
session_start();
if (isset($_SESSION['mail']))
{
  echo 'Vous êtes déjà inscrit/connecté';
}
else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription - Rocket Launcher</title>
    <link rel="stylesheet" type="text/css" href="newConnexion.css">
  </head>
  <body>
    <div id="login_div" class="main-div">
      <h3>Inscription - Rocket Launcher</h3>

    <form method="POST">
      <input type="email" placeholder="Email..." id="email_field" name="mail"/>
      <input type="password" placeholder="Mot de passe..." id="password_field" name="mdpass"/>
      <input type="password" placeholder="Confirmation..." id="password_confirm_field" name="mdpassconfirm"/>
      <label for="userType">Type d'utilisateur</label>
      <select name="userType" id="userType">
        <option>Influencer</option>
        <option>Marque</option>
      </select>

      <input type="button" onclick="registerUser()" value="S'inscrire"></input>
    </form>
    <script src='functions.js'></script>
    </div>
  </body>
</html>
<?php } ?>
