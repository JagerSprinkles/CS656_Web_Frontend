<?php
session_start();
?>

<!DOCTYPE html>
<html>

<body>
<pre>





<?php
//Dhruva's code...
$url = 'http://52.36.159.253/api/v0.1/user/edit?'.'name='.$_POST["name"].'&email='.$_POST["email"].'&company_id='.$_POST["company_id"].'&twitter='.$_POST["twitter"].'&linkedin='.$_POST["linkedin"].'&resume='.$_POST["resume"].'&website='.$_POST["website"];

$opts = array(
	'http' => array(
    	'method'  => 'PUT'
  )
);

$context  = stream_context_create($opts);
$result = file_get_contents($url, false, $context, -1, 40000);

echo $result;

//End Dhruva's code

$jj = json_decode($result);



echo   "\n------------------------------------------------\n"  ;

var_dump($jj);

print   "\n------------------------------------------------\n"  ;


if ($jj != NULL){							//Checks if anything is returned from the API as nothing is returned upon error.



echo"
<form class=\"form-horizontal\" action=\"edit.php\" method=\"put\">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"name\">Name</label>  
  <div class=\"col-md-4\">
  <input id=\"name\" name=\"name\" value=\"";
  print $jj->{'message'}->{'user'}->{'name'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"email\">Email</label>  
  <div class=\"col-md-4\">
  <input id=\"email\" name=\"email\" value=\"";
  print $jj->{'message'}->{'user'}->{'email'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"company_id\">Company</label>  
  <div class=\"col-md-4\">
  <input id=\"company_id\" name=\"company_id\" value=\"";
  print $jj->{'message'}->{'user'}->{'company'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"twitter\">Twitter</label>  
  <div class=\"col-md-4\">
  <input id=\"twitter\" name=\"twitter\" value=\"";
  print $jj->{'message'}->{'user'}->{'twitter'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"linkedin\">Linkedin</label>  
  <div class=\"col-md-4\">
  <input id=\"linkedin\" name=\"linkedin\" value=\"";
  print $jj->{'message'}->{'user'}->{'linkedin'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"resume\">Resume</label>  
  <div class=\"col-md-4\">
  <input id=\"resume\" name=\"resume\" value=\"";
  print $jj->{'message'}->{'user'}->{'resume'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"website\">Website</label>  
  <div class=\"col-md-4\">
  <input id=\"website\" name=\"website\" value=\"";
  print $jj->{'message'}->{'user'}->{'website'};

  echo "\" class=\"form-control input-md\" type=\"text\">
    
  </div>
</div>

<!-- Button -->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"submit\"></label>
  <div class=\"col-md-4\">
    <button type=\"submit\" id=\"submit\" name=\"submit\" class=\"btn btn-primary\">Submit</button>
  </div>
</div>

</fieldset>
</form>

";


}
else{
	print "\nError!";
}




















?>
</pre>






</body>
</html>
