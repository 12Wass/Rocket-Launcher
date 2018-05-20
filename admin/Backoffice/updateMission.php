<?php $action = "mission";
require('../bddConnect.php');
// Récupération du nom de la marque et des informations de la mission sélectionnée
$req = $bdd->prepare('SELECT * FROM Campaigns WHERE id = ?');
$req->execute(array($_POST['id']));
$campaign = $req->fetch();

$idBrand = $campaign['idBrand'];
$brandCampaign = $bdd->prepare('SELECT name FROM Brands WHERE id = ? ');
$brandCampaign->execute(array($campaign['idBrand']));
$brandName = $brandCampaign->fetch();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Modifier une mission/campagne</title>
    <meta charset="utf-8">
    <style></style>
  </head>

  <body>
    <h1>Modification de la campagne</h1>
      <form action="sendMissionUpdate.php" method="post">
        <?php echo '<h2>Marque : ' . $brandName['name'] . '</h2>'; ?>
        <label for="descriptionEdit">Description</label>
          <input type="text" value="<?php echo $campaign['description']; ?>" name="descriptionEdit"></input><br>
        <label for="followersMinEdit">Followers Min.</label>
          <input type="text" value="<?php echo $campaign['followersMin']; ?>" name="followersMinEdit"></input><br>
        <label for="followersMaxEdit">Followers Max.</label>
          <input type="text" value="<?php echo $campaign['followersMax']; ?>" name="followersMaxEdit"></input><br>
        <label for="themesEdit">Description</label>
          <input type="text" value="<?php echo $campaign['themes']; ?>" name="themesEdit"></input><br>
        <label for="gratificationTypeEdit">Type de rémunération</label>
          <input type="text" value="<?php echo $campaign['gratificationType']; ?>" name="gratificationTypeEdit"></input><br>
        <label for="gratificationDetailEdit">Détails de la rémunération</label>
          <input type="text" value="<?php echo $campaign['gratificationDetail']; ?>" name="gratificationDetailEdit"></input><br>

          <input type="hidden" value="<?php echo $campaign['id']; ?>" name="id"/>
        <input type="submit" value="Envoyer" />
    </form>

  </body>
</html>
