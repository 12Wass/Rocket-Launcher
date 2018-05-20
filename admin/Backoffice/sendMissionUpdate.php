<?php
require('../bddConnect.php');
// Récupération du nom de la marque et des informations de la mission sélectionnée
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
?>
