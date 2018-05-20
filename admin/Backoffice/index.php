<?php
require('../bddConnect.php');

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard - Rocket Launcher</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
		<!-- Navigation, titre, recherche - Barre du haut -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Rocket Launcher</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Déconnexion</a>
        </li>
      </ul>
    </nav>


    <!-- Menu de navigation latéral  -->

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>
                  Administration <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#influenceurs">
                  <span data-feather="users"></span>
                  Influenceurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#entreprises">
                  <span data-feather="layers"></span>
                  Entreprises
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#missions">
                  <span data-feather="file"></span>
                  Missions
                </a>
              </li>
           <!--   <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  AJOUTER ICI
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  AJOUTER ICI
                </a>
              </li> -->
            </ul>
          </div>
        </nav>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Administration</h1>
             <h6>Bienvenue sur la page d'administration de Rocket Launcher.</h6>
          </div>


         <h2 id="influenceurs">Influenceurs</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Thèmes</th>
                  <th>Biographie</th>
                  <th>Adresse</th>
                  <th>Mail</th>
                  <th>Administration</th>
                </tr>
              </thead>
              <tbody>

<!-- Récupération des données Influenceur -->
                <?php
                    $req = $bdd->query('SELECT * FROM Influencers');
                      foreach($req AS $influ) {
                        $idInflu = $influ['idUser'];
                        $influReq = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
                        $influReq->execute(array($idInflu));
                          foreach($influReq AS $userInfo) {


  echo '<tr>
        <td>'. $influ['id'] . '</td>
        <td>'. $influ['firstName'] .  '</td>
        <td>'. $influ['lastName'] . '</td>
        <td>'. $influ['themes'] .'</td>
        <td>'. $influ['bio'] .'</td>
        <td>'. $influ['address'] .'</td>
        <td>'. $userInfo['email'] .'</td>
        <td>
          <form action="traitement.php" method="post">
            <select name="influenceurForm" id="influenceurForm">
                <option value="Supprimer">Supprimer</option>
                <option value="Valider">Valider</option>
                <option value="Modifier">Modifier</option>
          	</select>
        </td>
                    <input id="id" name="id" type="hidden" value="' . $influ['idUser'] . '">

        <td><input type="submit" value="Valider"/></td>
          </form>
    </tr>';
  }} ?>

              </tbody>
            </table>
          </div>


          <h2 id="entreprises">Entreprises</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Marque</th>
                  <th>Description</th>
                  <th>Site Internet</th>
                  <th>Nom du responsable</th>
                  <th>Prénom du responsable</th>
                  <th>Mail</th>
                  <th>Administration</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

<!-- Récupération des données de Marques -->
<?php
$req = $bdd->query('SELECT * FROM Brands');
foreach($req AS $brand) {
  $idBrand = $brand['idUser'];
  $brandReq = $bdd->prepare('SELECT email FROM Users WHERE id = ?');
  $brandReq->execute(array($idBrand));
  foreach($brandReq AS $userInfo) {

      echo      '<tr>
                  <td>' . $brand['id'] . '</td>
                  <td>' . $brand['name'] . '</td>
                  <td>' . $brand['description'] . '</td>
                  <td>' . $brand['url'] . '</td>
                  <td>' . $brand['lastNameRes'] . '</td>
                  <td>' . $brand['firstNameRes'] . '</td>
                  <td>' . $userInfo['email'] . '</td>

                  <form action="traitement.php" method="post">
                  <td><select name="entrepriseForm" id="entrepriseForm">
                  		<option value="Supprimer">Supprimer</option>
                  		<option value="Valider">Valider</option>
                  		<option value="Modifier">Modifier</option>
                  	</select>
                  </td>

                  <input id="id" name="id" type="hidden" value="' . $brand['idUser'] . '">
                  <td><input type="submit" value="Valider" /></td>
              </form>
                </tr>';
              }} ?>
              </tbody>
            </table>
          </div>




          <h2 id="missions">Missions</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Marque</th>
                  <th>Description</th>
                  <th>Followers Min.</th>
                  <th>Themes</th>
                  <th>Rémunération</th>
                  <th>Détails</th>
                  <th>Administration</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
<!-- Récupération des données Influenceur -->
<?php
$req = $bdd->query('SELECT * FROM Campaigns');
foreach($req AS $campaign) {
  $idBrand = $campaign['idBrand'];
  $brandReq = $bdd->prepare('SELECT name FROM Brand WHERE idUser = ?');
  $brandReq->execute(array($idBrand));
  $brandName = $brandReq->fetch();
  ?>

                <tr>
                  <td> <?php echo $campaign['id']; ?> </td>
                  <td> <?php echo $brandName['name']; ?></td>
                  <td><?php echo $campaign['description']; ?></td>
                  <td><?php echo $campaign['followersMin']; ?> </td>
                  <td><?php echo $campaign['themes']; ?></td>
                  <td><?php echo $campaign['gratificationType']; ?></td>
                  <td><?php echo $campaign['gratificationDetail']; ?></td>
                  <form action="traitement.php" method="post">
                  <td>
                  	<select name="missionForm" id="missionForm">
                  		<option value="Supprimer">Supprimer</option>
                  		<option value="Valider">Valider</option>
                  		<option value="Modifier">Modifier</option>
                  	</select>
                  </td>

                  <input id="id" name="id" type="hidden" value="<?php echo $campaign['id'];?>">
                  <td>
                  	<input type="submit" value="Valider" />
                  </td>
              </form>
            <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>

          <h2 id="missions">Utilisateurs</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Type d'utilisateur</th>
                  <th>Date d'inscription</th>
                  <th>Dernière connexion</th>
                  <th>Administration</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>


<!-- Récupération des données Utilisateur (tous confondu) -->
<?php
$req = $bdd->query('SELECT * FROM Users');
foreach($req AS $usersInfo) {

                ?>
                <tr>
                  <td> <?php echo $usersInfo['id']; ?> </td>
                  <td> <?php echo $usersInfo['email'];?> </td>
                  <td> <?php echo $usersInfo['userType'];?> </td>
                  <td> <?php echo $usersInfo['dateRegistration'];?> </td>
                  <td> <?php echo $usersInfo['dateLastConnection'];?> </td>
                  <form action="traitement.php" method="post">
                  <td>
                  	<select name="usersForm" id="usersForm">
                  		<option value="Supprimer">Supprimer</option>
                  		<option value="Valider">Valider</option>
                  		<option value="Modifier">Modifier</option>
                  	</select>
                  </td>

                  <input id="id" name="id" type="hidden" value="<?php echo $usersInfo['id']; ?>">
                  <td>
                  	<input type="submit" value="Valider" />
                  </td>
              </form>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
