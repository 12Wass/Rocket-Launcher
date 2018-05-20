<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facebook Authentification</title>
</head>
<body>
	<button type="button" name="button" onclick="loginFacebook()">Login YourFacebook</button>
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
		provider.addScope('user_birthday');
		provider.addScope('user_managed_groups');
		provider.addScope('user_posts');
			function loginFacebook() {
				firebase.auth().signInWithPopup(provider)
				.then(function(result){
					var token = result.credential.accessToken;
					var user = result.user;
					console.log(token);
					console.log(user);
				}).catch(function(error){
					console.log(error.code);
					console.log(error.message);
				});
			}
			{
}
			function logoutFacebook() {
				firebase.auth().signOut()
				.then(function() {
					console.log('signout success')
				}, function(error) {
					console.log('signout failed');
				})
			}
	</script>
</body>
</html>
