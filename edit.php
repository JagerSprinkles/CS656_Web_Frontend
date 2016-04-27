<?php
session_start();
?>
<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<body>


<?php




// Path to Requests library
include('/var/www/tt/library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();



//. '&email='

function send()
{
	$data = array( 'token' => $_SESSION["token"] , 'name' => $_POST["name"] , 'email' => $_POST['email'] ,  'twitter' => $_POST['twitter'], 'linkedin' => $_POST["linkedin"] , 'resume' => $_POST["resume"] , 'website' => $_POST["website"] );
	// var_dump($data);
	$out = Requests::put('http://njit.tech/api/v0.1/user/edit' , array(), $data );

	//var_dump($out);
	$resp = json_decode($out->body);
	return $resp->response;

}

if(isset($_POST['submit']))
{

   
   page(send());
} 
else page();


//var_dump($response->body);








// var_dump($resp);

// echo $resp->response->name;



// echo   "\n------------------------------------------------\n"  ;

//var_dump(explode(',', $response->body));

// print   "\n------------------------------------------------\n"  ;

// $hh =(str_replace('"', '', explode(',', $response->body)));
// $hh = str_replace('{', '', $hh);
// $hh = str_replace('}', '', $hh);
// $hh = str_replace('response:', '', $hh);

// //var_dump($hh);

// // print   "\n------------------------------------------------\n"  ;


// $info = array ();

// for ($i=0; $i < sizeof($hh); $i++) { 
	

// 	//var_dump(strstr($hh[$i], ':', true));
// 	//var_dump( substr(strstr($hh[$i], ':'), 1));


// 	if (substr(strstr($hh[$i], ':'), 1) == "null") $info[strstr($hh[$i], ':', true)] = "";
// 	elseif (substr(strstr($hh[$i], ':'), 1) == "") $info[strstr($hh[$i], ':', true)] = "";
// 	else $info[strstr($hh[$i], ':', true)] = substr(strstr($hh[$i], ':'), 1);
	
// }
// var_dump($info);

// print   "\n------------------------------------------------\n"  ;


// print   "\n------------------------------------------------\n"  ;
function page($info){

$gett = array( 'token' => $_SESSION["token"]);

$response = Requests::request('http://njit.tech/api/v0.1/user/get', array(), $gett, 'GET', array());


$out = Requests::request('http://njit.tech/api/v0.1/user/get', array(), $gett, 'GET', array());

$resp = json_decode($out->body);


echo"
 <div class=\"container\">    
        <div id=\"loginbox\" style=\"margin-top:50px;\" class=\"mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2\">    
<form class=\"form-horizontal\" action=\"edit.php\" method=\"post\" input type=\"submit\">
<fieldset>

<!-- Form Name -->
<legend>Edit Profile</legend>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"name\">Name</label>  
  <div class=\"col-md-4\">
  <input id=\"name\" name=\"name\" value=\"";
  print $resp->response->name;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"email\">Email</label>  
  <div class=\"col-md-4\">
  <input id=\"email\" name=\"email\" value=\"";
  print $resp->response->email;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>
";


  echo "

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"twitter\">Twitter</label>  
  <div class=\"col-md-4\">
  <input id=\"twitter\" name=\"twitter\" value=\"";
  print $resp->response->twitter;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"linkedin\">Linkedin</label>  
  <div class=\"col-md-4\">
  <input id=\"linkedin\" name=\"linkedin\" value=\"";
  print $resp->response->linkedin;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"resume\">Resume</label>  
  <div class=\"col-md-4\">
  <input id=\"resume\" name=\"resume\" value=\"";
  print $resp->response->resume;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"website\">Website</label>  
  <div class=\"col-md-4\">
  <input id=\"website\" name=\"website\" value=\"";
  print $resp->response->website;

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Button -->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"submit\"></label>
  <div class=\"col-md-4\">
    <button type=\"submit\" id=\"submit\" name=\"submit\" class=\"btn btn-primary\">Submit</button>
</div>";





echo $info;




echo "
</div>

</fieldset>
</form>
</div>
</div>
";


}










?>

<?php

function upda(){

$resp = json_decode($out->body);

echo $resp->{'response'}."\n";



}


?>



</body>
</html>

