<?php
session_start();
?>
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
<body style="background-color:#1aa3ff">
<p>
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

echo"<img src=\"ico.png\" style=\"width:128px;height:128px;\"><br>";

echo "\n" . $resp->{'response'}."\n";


      if (strpos($resp->{'response'}, 'succee')  !== FALSE){

    //

        $_SESSION["token"] = $resp->{'message'}->{'token'};

    //echo "\n\n<a href=\"/qqq/edit.php\">Please click here edit your profile</a> ";
// echo "
// <form class=\"form-horizontal\" action=\"/qqq/edit.php\" method=\"post\">
// 
// <button id=\"button1id\" name=\"button1id\" class=\"btn btn-success\">Edit Profile</button>
// </form>
// <form class=\"form-horizontal\"  action=\"/qqq/connections.php\" method=\"post\">
// <button id=\"button2id\" name=\"button2id\" class=\"btn btn-success\">View Connections</button>
// </form>
// ";

echo "
<p><a class=\"btn btn-success\" href=\"/qqq/edit.php\">Edit Your Profile</a></p>
<p><a class=\"btn btn-success\" href=\"/qqq/connections.php\">View Connections</a></p>";

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

























   ?>
 </p>
</body>
</html>
