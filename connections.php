<?php
session_start();
?>
<!DOCTYPE html>
<html >
<style type="text/css">
	h3 {text-align:center;color:white;}
	p {text-align:center;color:white;}
</style>
<body style="background-color:#365C8C">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<p style="background-color:#365C8C">


<?php

// Path to Requests library
include('/var/www/tt/library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();


$gett = array( 'token' => $_SESSION["token"]);

$out = Requests::request('http://njit.tech/api/v0.1/relationship/list', array(), $gett, 'GET', array());



//var_dump($out);

$resp = json_decode($out->body);



//var_dump( $resp);


$qq = $resp->response;
echo"<img src=\"ico.png\" style=\"width:128px;height:128px;\">";
print "<h3 style=\"color:white\" >Here are your current connections</h3><p>";

foreach ($qq as $conn) {
	//var_dump($conn);
	echo"<br>";
	echo $conn->name . "<br>";
	echo $conn->email . "<br>";
}


echo "</p><p><br><br><a class=\"btn btn-success\" href=\"/qqq/edit.php\">Edit Your Profile</a></p>";








?>

</p>
</body>
</html>

