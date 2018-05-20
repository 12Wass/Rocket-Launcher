<?php
session_start();

  if($_SESSION['userType'] == 'influencer') {
    header('Location: influProfile.php');

  }
  else if ($_SESSION['userType'] == 'brand') {
    header('Location: brandProfile.php');
  }
  else {
    echo 'Accès interdit. Redirection. <a href="index.php">Cliquez ici</a>';
  }
  ?>
