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
<pre>





<?php

// Path to Requests library
include('/var/www/tt/library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();


function send()
{
  $data = array( 'email' => $_POST['email'] , 'password' => $_POST["password"] );
  //var_dump($data);
  $out = Requests::post('http://njit.tech/api/v0.1/user/login' , array(), $data, array());
  

  
  // echo   "\n------------------------------------------------\n"  ;
  //var_dump($out);
  // echo   "\n------------------------------------------------\n"  ;
  // var_dump($out->body);
  // 
   

  // echo   "\n------------------------------------------------\n"  ;


  $resp = json_decode($out->body);

  //var_dump($resp);

  echo $resp->{'response'}."\n";

 
  if (strpos($resp->{'response'}, 'succee')  !== FALSE){
    
    //
 
    $_SESSION["token"] = $resp->{'message'}->{'token'};

    echo "\n\n<a href=\"/qqq/edit.php\">Please click here edit your profile</a> ";
  }
  else
  {
    echo "\n".$resp->{'message'};
    echo "\n\n<a href=\"/qqq/login\">Please click here to try logging in again</a> ";

  }
}
if(isset($_POST['submit']))
{
   send();
  
} 

























// //Dhruva's code...
// $url = 'http://52.36.159.253/api/v0.1/user/login?'.'email='.$_POST["email"].'&password='.$_POST["password"];

// $opts = array(
// 	'http' => array(
//     	'method'  => 'POST'
//   )
// );

// $context  = stream_context_create($opts);
// $result = file_get_contents($url, false, $context, -1, 40000);

//echo $result;

//End Dhruva's code

// $jj = json_decode($result);



//echo   "\n------------------------------------------------\n"  ;

//var_dump($jj);

//print   "\n------------------------------------------------\n"  ;


// if ($jj != NULL){							//Checks if anyrthing is returned from the API as decoded var is empty if login failed

// print "\nLogin Successful";
// print "\nLogin Status = ";
// print $jj->{'status'};
// print "\nName = ";
// print $jj->{'message'}->{'user'}->{'name'};
// print "\nEmail = ";
// print $jj->{'message'}->{'user'}->{'email'};
// print "\nID = ";
// print $jj->{'message'}->{'user'}->{'id'};
// print "\nCompany Id = ";
// print $jj->{'message'}->{'user'}->{'company_id'};
// print "\nTwitter = ";
// print $jj->{'message'}->{'user'}->{'twitter'};
// print "\nLinkedin = ";
// print $jj->{'message'}->{'user'}->{'linkedin'};
// print "\nResume = ";
// print $jj->{'message'}->{'user'}->{'resume'};
// print "\nWebsite = ";
// print $jj->{'message'}->{'user'}->{'website'};
// print "\nRole = ";
// print $jj->{'message'}->{'user'}->{'role'};
// print "\nCompany = ";
// print $jj->{'message'}->{'user'}->{'company'};
// print "\nToken = ";
// print $jj->{'message'}->{'token'};

// $sess = $jj->{'message'}->{'token'};



// $_SESSION["token"] = $sess;



// echo"
// <form class=\"form-horizontal\" action=\"edit.php\" method=\"put\">
// <fieldset>

// <!-- Form Name -->
// <legend>Form Name</legend>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"name\">Name</label>  
//   <div class=\"col-md-4\">
//   <input id=\"name\" name=\"name\" value=\"";
//   print $jj->{'message'}->{'user'}->{'name'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"email\">Email</label>  
//   <div class=\"col-md-4\">
//   <input id=\"email\" name=\"email\" value=\"";
//   print $jj->{'message'}->{'user'}->{'email'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"company_id\">Company</label>  
//   <div class=\"col-md-4\">
//   <input id=\"company_id\" name=\"company_id\" value=\"";
//   print $jj->{'message'}->{'user'}->{'company'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"twitter\">Twitter</label>  
//   <div class=\"col-md-4\">
//   <input id=\"twitter\" name=\"twitter\" value=\"";
//   print $jj->{'message'}->{'user'}->{'twitter'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"linkedin\">Linkedin</label>  
//   <div class=\"col-md-4\">
//   <input id=\"linkedin\" name=\"linkedin\" value=\"";
//   print $jj->{'message'}->{'user'}->{'linkedin'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"resume\">Resume</label>  
//   <div class=\"col-md-4\">
//   <input id=\"resume\" name=\"resume\" value=\"";
//   print $jj->{'message'}->{'user'}->{'resume'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Text input-->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"website\">Website</label>  
//   <div class=\"col-md-4\">
//   <input id=\"website\" name=\"website\" value=\"";
//   print $jj->{'message'}->{'user'}->{'website'};

//   echo "\" class=\"form-control input-md\" type=\"text\">
    
//   </div>
// </div>

// <!-- Button -->
// <div class=\"form-group\">
//   <label class=\"col-md-4 control-label\" for=\"submit\"></label>
//   <div class=\"col-md-4\">
//     <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
//   </div>
// </div>

// </fieldset>
// </form>

// ";


//print "\n\n <a href=\"/qqq/edit.php\"> Please click here to edit your profile  </a> ";


// }
// else{
// 	print "\nLogin Error!";
// }




















?>
</pre>
</body>
</html>
