
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="image/Logo.png">
  <title>Rejoignez-nous !</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="js/navbar-ontop.js"></script>
  <script src="js/Backtop.js"></script>
</head>

<body class="text-center">
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <div class="container">
      <div class="navbar-collapse justify-content-center">
        <ul class="navbar-nav">
          <li class="nav-item mx-2 underline">
            <a class="nav-link text-white" href="#entreprise.php">Entreprise</a>
          </li>
          <li class="nav-item mx-2">
            <a class="btn navbar-btn mx-2 btn-primary" href="index.html">Accueil</a>
          </li>
          <li class="nav-item mx-2 underline">
            <a class="nav-link text-white" href="#influencer.php">Influencer</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Formulaire -->
  <div id="divIns" class="background cover">
    <div class="container">
      <div class="row">
        <div class="mt-md-5 col-12">
          <div >
            <h1 class="title">Ouups...</h1>
            <hr> </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="mx-auto my-5 col-6 px-3">
          <div class="card text-white bg-primary text-left shadowed">
            <div class="card-body">
              <p class="text-center"><?php
              switch($_GET['Erreur'])
              {
                 case '400':
                 echo 'Échec de l\'analyse HTTP.';
                 break;
                 case '401':
                 echo 'Le pseudo ou le mot de passe n\'est pas correct !';
                 break;
                 case '402':
                 echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
                 break;
                 case '403':
                 echo 'Requête interdite !';
                 break;
                 case '404':
                 echo 'La page n\'existe pas ou plus !';
                 break;
                 case '405':
                 echo 'Méthode non autorisée.';
                 break;
                 case '500':
                 echo 'Erreur interne au serveur ou serveur saturé.';
                 break;
                 case '501':
                 echo 'Le serveur ne supporte pas le service demandé.';
                 break;
                 case '502':
                 echo 'Mauvaise passerelle.';
                 break;
                 case '503':
                 echo ' Service indisponible.';
                 break;
                 case '504':
                 echo 'Trop de temps à la réponse.';
                 break;
                 case '505':
                 echo 'Version HTTP non supportée.';
                 break;
                 default:
                 echo 'Erreur !';
              }
              ?>
              </p>
              <a class="text-center text-white" title="Titre du lien" href="index.html">Ceci est un lien</a>
            </div>
          </div>
          <footer>
            <div class="row">
              <div class="fixed-bottom col-12">
                <p class="text-dark">© Copyright 2018 rocket Launcher - All rights reserved. </p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
