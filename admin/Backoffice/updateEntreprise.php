<?php $action = "entreprise";
require('../bddConnect.php');
// Récupération de l'e-mail de l'utilisateur (stockée dans une autre table)
$userEmail = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
$userEmail->execute(array($_POST['id']));

$brandEmail = $userEmail->fetch();

//Récupération des infos 'Brands'
$req = $bdd->prepare('SELECT * FROM Brands WHERE idUser = ?');
$req->execute(array($_POST['id']));
$brandInfo = $req->fetch();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modifier une entreprise</title>
    <meta charset="utf-8">
    <style></style>
  </head>
  <body>
    <h1>Modification de l'entreprise</h1>
    <form action="sendEntrepriseUpdate.php" method="post">
      <label for="emailEdit">E-Mail</label>
        <input type="text" value="<?php echo $brandEmail['email']; ?>" name="emailEdit"></input><br>
      <label for="lastNameResEdit">Nom du responsable</label>
        <input type="text" value="<?php echo $brandInfo['lastNameRes']; ?>" name="lastNameResEdit"></input><br>
      <label for="firstNameResEdit">Prénom du responsable</label>
        <input type="text" value="<?php echo $brandInfo['firstNameRes']; ?>" name="firstNameResEdit"></input><br>
      <label for="descriptionEdit">Description</label>
        <input type="text" value="<?php echo $brandInfo['description']; ?>" name="descriptionEdit"></input><br>
      <label for="nameEdit">Nom de la marque</label>
        <input type="text" value="<?php echo $brandInfo['name']; ?>" name="nameEdit"></input><br>
      <label for="urlEdit">Site de la marque</label>
        <input type="text" value="<?php echo $brandInfo['url']; ?>" name="urlEdit"></input><br>
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>"/>
        <input type="submit" value="Envoyer" />
    </form>

  </body>
</html>
