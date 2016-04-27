<!DOCTYPE html>
<html>

<body>
<pre>



<?php
//Dhruva's code...
// $url = 'http://52.36.159.253/api/v0.1/user/register?name='.$_POST["name"].'&email='.$_POST["email"].'&password='.$_POST["password"];

// $opts = array(
// 	'http' => array(
//     	'method'  => 'POST'
//   )
// );

// $context  = stream_context_create($opts);
// $result = file_get_contents($url, false, $context, -1, 40000);

//echo $result; 

//End Dhruva's code




// Path to Requests library
include('/var/www/tt/library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();


function send()
{
	$data = array( 'name' => $_POST["name"] , 'email' => $_POST['email'] , 'password' => $_POST["password"] );
	//var_dump($data);
	$out = Requests::post('http://njit.tech/api/v0.1/user/register' , array(), $data, array());
	

	
	// echo   "\n------------------------------------------------\n"  ;
	// var_dump($out);
	// echo   "\n------------------------------------------------\n"  ;
	// var_dump($out->body);
	// 
	 

	// echo   "\n------------------------------------------------\n"  ;


	$resp = json_decode($out->body);

	echo $resp->{'response'}."\n";


	if (strpos($resp->{'response'}, 'fail')  !== FALSE){
		
		echo "\n".$resp->{'message'};

		echo "\n\n<a href=\"/qqq/register\">Please click here to try and register again</a> ";
	}
	else
	{
		echo "\n\n<a href=\"/qqq/login\">Please click here to login</a> ";

	}
}
if(isset($_POST['submit']))
{
   send();
	
} 









//$jj = json_decode($result);




//echo   "\n------------------------------------------------\n"  ;

// var_dump($jj);

// //print   "\n------------------------------------------------\n"  ;




// if ($jj != NULL){							

// print "\nRegistration Successful";
// print "\nRegistration Status = ";
// print $jj->{'status'};
// print "\nName = ";
// print $jj->{'message'}->{'user'}->{'name'};
// print "\nEmail = ";
// print $jj->{'message'}->{'user'}->{'email'};
// print "\nID = ";
// print $jj->{'message'}->{'user'}->{'id'};
// print "\nToken = ";
// print $jj->{'message'}->{'token'};

// print "\n\n <a href=\"/qqq/login\"> Please click here to login  </a> ";

// }
// else{
// 	print "\nRegistration Error!";
// }




?>
</pre>
</body>
</html>
