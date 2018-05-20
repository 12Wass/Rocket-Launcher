<?php $action = "influenceur";
require('../bddConnect.php');
// Récupération de l'e-mail de l'utilisateur (stockée dans une autre table)
$userEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
$userEmail->execute(array($_POST['id']));

$influEmail = $userEmail->fetch();

//Récupération des infos 'Brands'
$req = $bdd->prepare('SELECT * FROM Influencers WHERE idUser = ?');
$req->execute(array($_POST['id']));
$influInfo = $req->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifier un influenceur</title>
    <meta charset="utf-8">
    <style></style>
  </head>

  <body>
    <h1>Modification de l'influenceur</h1>
      <form action="sendUserUpdate.php" method="post">
        <label for="emailEdit">E-Mail</label>
          <input type="text" value="<?php echo $influEmail['email']; ?>" name="emailEdit"></input><br>
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
          <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id"/>



        <input type="submit" value="Envoyer" />
    </form>

  </body>
</html>
