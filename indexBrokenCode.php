<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Complane Airlines</title>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.css" />
  
  <meta name="google-signin-client_id" content="746680919151-4ifu25o2611uflnfo7mf10a2n5c0vg6m.apps.googleusercontent.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
  <style>
    #welcome_section {
      background-color: #efefef;
      padding: 10px;
    }

    #signin_section {
      padding: 10px;
    }

    #flight_info_section {
      background-color: #efefef;
      display: none;
      padding: 10px;
    }
  </style>
</head>

<body>
  <div id="welcome_section">
    <h1>Welcome to Complane Airlines</h1>
    <p>You have been victim of a delay of more than 2 hours in Europe?
      <br /> Your flight has been canceled at the last minute?
      <br /> You are struggling to find help?</p>

    <h2>You are not alone!</h2>
    <p>Find some feedback from other passengers
      <br /> Find other passengers who experience the same problems</p>
  </div>

  <div id="signin_section">
    <h2>Ready to stand up for your rights?</h2>
    <!-- <p>First login with your Gmail account</p> -->
    <div id="signin_button" class="g-signin2" data-onsuccess="onSignIn"></div>

    <p>
      <span id="bienvenue"></span>
      <br />
      <a href="#" onclick="signOut();" id="signout_button">Sign out</a>
    </p>
  </div>

  <div id="flight_info_section">
    <div id="write_your_issue">
      <h2>Write your issue!</h2>
      <p>In order to help people to give you some feedback, please provide information about your flight issue.</p>

      <form action="created.php" method="post">
        First Name:<br>
        <input type="text" name="firstname"><br>
        Airline Company:<br>
        <input type="text" name="airlineCompany"><br>
        Flight Year:<br>
        <input type="number" name="flightYear"><br>
        Write yourIssue (Specify at the Beginning if it is a Cancelation, +2 hours delay or Other):<br>
        <input type="text" name="issue"><br>
      </form>>
      <!-- form to connect to a database import firebase from '../../firebase'; class AddUser extends Component { constructor() { super();
        this.state = { first_name: '', Airline: '', Date of the flight: '', Issue: 'delay / cancellation / other', users: []
        }; -->
    </div>

    <div id="find_an_answer">
      <h2>Find an answer!</h2>
      <p>In order to help people to give you some feedback, please provide information about your flight issue</p>
      <!-- form to connect to a database import firebase from '../../firebase'; class AddUser extends Component { constructor() { super();
        this.state = { first_name: '', Airline: '', Date of the flight: '', Issue: 'delay / cancellation / other', users: []
        }; this.handleChange = this.handleChange.bind(this); this.handleSubmit = this.handleSubmit.bind(this);Find an answer -->
    </div>

    <div id="your_results">
      <h2>Read your answer(s)</h2>
      <p>We hope you can benefit from the other travelers experience below
        <br /> If not try to adjust your criteria in Find an answer section</p>
    </div>
	  <div>
	<?php  
		require 'connection.php';
		$sql = "SELECT id, firstname, airline, flightyear, issue FROM tb_issues";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " Airline " . $row["airline"]. " flightyear " . 			$row["flightyear"]. " Issue " . $row["issue"] . "<br>";
    	}
		} else {
    	echo "0 results";
		}
		$conn->close();
		?>
	  </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/4.8.0/firebase.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyA-KQRhSpzocBzjZ6E6mHoVr4h9Q2-oP8Q",
      authDomain: "benjamin-188511.firebaseapp.com",
      databaseURL: "https://benjamin-188511.firebaseio.com",
      projectId: "benjamin-188511",
      storageBucket: "",
      messagingSenderId: "923552377239"
    };
    firebase.initializeApp(config);

    var provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth().getRedirectResult().then(function (result) {
      if (result.credential) {
        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = result.credential.accessToken;
        // ...
      }
      // The signed-in user info.
      var user = result.user;
    }).catch(function (error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });

    document.getElementById("signout_button").style.display = "none";

    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      document.getElementById("bienvenue").innerHTML = "Welcome " + profile.getName() + " ! You are logged in!";
      document.getElementById("signin_button").style.display = "none";
      document.getElementById("signout_button").style.display = "inline-block";
      document.getElementById("flight_info_section").style.display = "block";

      // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      // console.log('Name: ' + profile.getName());
      // console.log('Image URL: ' + profile.getImageUrl());
      // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    }

    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      document.getElementById("signin_button").style.display = "inline-block";
      document.getElementById("signout_button").style.display = "none";
      document.getElementById("bienvenue").innerHTML = "";
      document.getElementById("flight_info_section").style.display = "none";
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
      
      
      string mysql_real_escape_string ( string $unescaped_string [, resource $link_identifier = NULL ] )
    }
  </script>

  <!-- <script>
    var dbRef = firebase.database().ref().child('text');

    // Google OAuth Client ID, needed to support One-tap sign-up.
    // Set to null if One-tap sign-up is not supported.
    var CLIENT_ID = 'YOUR_OAUTH_CLIENT_ID';
  </script> -->

  <!-- <script src="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.js"></script> -->

  <!-- <script type="text/javascript">
    // FirebaseUI config.
    var uiConfig = {
      signInSuccessUrl: '<url-to-redirect-to-on-success>',
      signInOptions: [
        // Leave the lines as is for the providers you want to offer your users.
        firebase.auth.GoogleAuthProvider.PROVIDER_ID,
      ],
      // Terms of service url.
      tosUrl: '<your-tos-url>'
    };

    // Initialize the FirebaseUI Widget using Firebase.
    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    // The start method will wait until the DOM is loaded.
    ui.start('#firebaseui-auth-container', uiConfig);
  </script> -->
</body>

</html>