<?php require 'connection.php';
$conn    = Connect();
$firstname    = $conn->real_escape_string($_POST['firstname']);
$airline   = $conn->real_escape_string($_POST['airlineCompany']);
$flightyear    = $conn->real_escape_string($_POST['flightYear']);
$issue = $conn->real_escape_string($_POST['issue']);
$query   = "INSERT into tb_issues (firstname,airline,flighyear,issue) VALUES('" . $firstname . "','" . $airline . "','" . $flightyear . "','" . $issue . "')";
$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
echo "Your issue has been created <br>";
echo "<a href='index.php'>Back to page</a>"
$conn->close();
 