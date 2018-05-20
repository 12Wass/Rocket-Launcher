<?php
session_start();
  if (isset($_SESSION['flag']) == true || !empty($_SESSION)) {
    header('Refresh:5; url=index.php');
    echo 'Vous êtes déjà connecté, redirection dans 5 secondes';
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
    <div id="login_div" class="main-div">
      <h3>Authentification - Rocket Launcher</h3>

    <form method="post">
      <input type="email" placeholder="Email..." id="email_field" name="mail"/>
      <input type="password" placeholder="Mot de passe..." id="password_field" name="mdpass"/>
      <input type="button" onclick="connectUser()" value="Connexion"></input>
    </form>
    <button onclick = "twitterSignin()">Twitter Signin</button>
    </div>
    <a href="index.php">Retourner à l'accueil</a>
<script src="https://www.gstatic.com/firebasejs/5.0.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCydJcL7t0lomGFt0pyEO1JupPej92pnBk",
    authDomain: "rocket-launcher-1212.firebaseapp.com",
    databaseURL: "rocket-launcher-1212.firebaseio.com",
    projectId: "rocket-launcher-1212",
    storageBucket: "rocket-launcher-1212.appspot.com",
    messagingSenderId: "520948627688"
  };

  firebase.initializeApp(config);
  var provider = new firebase.auth.TwitterAuthProvider();
function twitterSignin() {
  firebase.auth().signInWithPopup(provider).then(function(result) {
    // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
    // You can use these server side with your app's credentials to access the Twitter API.
    var token = result.credential.accessToken;
    var secret = result.credential.secret;
    // The signed-in user info.
    var user = result.user;
    // ...
  }).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });
}
</script>
<script src="functions.js"></script>
<!-- Firebase application call -->
<script src="https://www.gstatic.com/firebasejs/5.0.1/firebase-app.js"></script>
<!-- Additional services (we only use Auth) -->
<script src="https://www.gstatic.com/firebasejs/5.0.1/firebase-auth.js"></script>

</body>
</html>

<?php } ?>
