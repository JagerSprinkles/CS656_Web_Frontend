<!DOCTYPE html>
<html>
<style type="text/css">
  h3 {text-align:center;}
  p {text-align:center;}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<body style="background-color:#1aa3ff">
<p>



<?php





// Path to Requests library
include('/var/www/tt/library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();


function send()
{
	$data = array( 'name' => $_POST["name"] , 'email' => $_POST['email'] , 'password' => $_POST["password"] );
	//var_dump($data);
	$out = Requests::post('http://njit.tech/api/v0.1/user/register' , array(), $data, array());
	


echo"<img src=\"ico.png\" style=\"width:128px;height:128px;\"><br>";

	$resp = json_decode($out->body);

	echo $resp->{'response'}."\n<br><br>";


	if (strpos($resp->{'response'}, 'fail')  !== FALSE){
		
		echo "\n".$resp->{'message'}."<br>";

		//echo "\n\n<a href=\"/qqq/register\">Please click here to try and register again</a> ";
		echo "<br><p><a class=\"btn btn-success\" href=\"/qqq/register\">Please click here to try and register again</a></p>";
	}
	else
	{
		// echo "\n\n<a href=\"/qqq/login\">Please click here to login</a> ";
		echo "<p><a class=\"btn btn-success\" href=\"/qqq/login\">Please click here to login</a></p>";

	}
}
if(isset($_POST['submit']))
{
   send();
	
} 









?>
</p>
</body>
</html>
