<?php
	if (!isset($_SESSION)) {
		echo 'Vous devez être connecté pour accéder à cette page';
		}
	else {
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facebook Authentification</title>
</head>
<body>
	<button type="button" name="button" onclick="loginFacebook()">Login via Facebook</button>
	<button type="button" name="button" onclick="logoutFacebook()">logout</button>
	<script src="https://www.gstatic.com/firebasejs/5.0.2/firebase.js"></script>
	<script>
		var config = {
			apiKey: "AIzaSyCydJcL7t0lomGFt0pyEO1JupPej92pnBk",
	    authDomain: "rocket-launcher-1212.firebaseapp.com",
	    databaseURL: "https://rocket-launcher-1212.firebaseio.com",
	    projectId: "rocket-launcher-1212",
	    storageBucket: "rocket-launcher-1212.appspot.com",
	    messagingSenderId: "520948627688"
		};
		firebase.initializeApp(config);
		var provider = new firebase.auth.FacebookAuthProvider();
			function loginFacebook() {
				firebase.auth().signInWithPopup(provider)
				.then(function(result){
					var token = result.credential.accessToken;
					var user = result.user;
					console.log(token);
					if (user != null) {
  user.providerData.forEach(function (profile) {
		var username = profile.displayName;
		var useremail = profile.email;
		var userphoto = profile.photoURL;
		var userid = profile.uid;
		var functionSelect = 'registerFacebook';
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState == 4 && request.status == 200){
				console.log(request.responseText);
			}
		};
		request.open('POST', 'functions.php');
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		request.send(`functionSelect=${functionSelect}&username=${username}&useremail=${useremail}&userphoto=${userphoto}&userid=${userid}`)
  });
}
				}).catch(function(error){
					console.log(error.code);
					console.log(error.message);
				});
			}
			function logoutFacebook() {
				firebase.auth().signOut()
				.then(function() {
					console.log('Signout Success')
				}, function(error) {
					console.log('Signout Failed');
				})
			}
	</script>
</body>
</html>
<?php } ?>
