function registerUser() {
  var e = document.getElementById('email_field').value;
  var p = document.getElementById('password_field').value;
  var pc = document.getElementById('password_confirm_field').value;
  var usr = document.getElementById('userType');
  var userType = usr.options[usr.selectedIndex].value;
  var functionSelect = 'registerUser';

  if(e.length > 0 && p.length > 0 && p.value == pc.value) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if(request.readyState == 4 && request.status == 200) {
        console.log(request.responseText);
      }
    };
    request.open('POST', 'functions.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`mail=${e}&mdpass=${p}&userType=${userType}&functionSelect=${functionSelect}`);
  }
  else {
    alert('Mauvais identifiants/Identifiant vide');
  }
}

function connectUser() {
  var e = document.getElementById('email_field').value;
  var p = document.getElementById('password_field').value;
  var functionSelect = 'connectUser';

  if(e.length > 0 && p.length > 0) { 
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        document.write(request.responseText);
      }
    };
    request.open('POST', 'functions.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`mail=${e}&mdpass=${p}&functionSelect=${functionSelect}`);
  }
  else {
    alert('Mauvais identifiants');
  }
}


function updateInfluencer() {
  var id = document.getElementById('id').value;
  var fName = document.getElementById('firstNameEdit').value;
  var lName = document.getElementById('lastNameEdit').value;
  var addr = document.getElementById('addressEdit').value;
  var city = document.getElementById('cityEdit').value;
  var postal = document.getElementById('postalCodeEdit').value;
  var themes = document.getElementById('themesEdit').value;
  var bio = document.getElementById('bioEdit').value;
  var hobbies = document.getElementById('hobbiesEdit').value;
  var remuneration = document.getElementById('remunerationTypeEdit').value;
  var functionSelect = 'updateInfluencer';

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        document.write(request.responseText);
      }
    };
    request.open('POST', 'functions.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`id=${id}&firstNameEdit=${fName}&lastNameEdit=${lName}
                  &addressEdit=${addr}&cityEdit=${city}&postalCodeEdit=${postal}
                  &themesEdit=${themes}&bioEdit=${bio}&hobbiesEdit=${hobbies}
                  &remunerationType=${remuneration}&updateInfluencer=${updateInfluencer}
                  &functionSelect=${functionSelect}`);
}

function brandUpdate() {
  var id = document.getElementById('id').value;
  var name = document.getElementById('nameEdit').value;
  var desc = document.getElementById('descriptionEdit').value;
  var url = document.getElementById('urlEdit').value;
  var fNameRes = document.getElementById('firstnamerespEdit').value;
  var lNameRes = document.getElementById('lastnameresEdit').value;
  var functionSelect = 'brandUpdate';

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState == 4 && request.status == 200) {
        console.log(request.responseText);
      }
    };
    request.open('POST', 'functions.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(`id=${id}&nameEdit=${name}&descriptionEdit=${desc}
                  &urlEdit=${url}&firstnamerespEdit=${fNameRes}&lastnameresEdit=${lNameRes}
                  &functionSelect=${functionSelect}`);
}
