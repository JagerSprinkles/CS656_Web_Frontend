<!DOCTYPE html>
<html>

<body>
<pre>



<?php
//Dhruva's code...
$url = 'http://52.36.159.253/api/v0.1/user/login?'.'email='.$_POST["email"].'&password='.$_POST["password"];

$opts = array(
	'http' => array(
    	'method'  => 'POST'
  )
);

$context  = stream_context_create($opts);
$result = file_get_contents($url, false, $context, -1, 40000);

//echo $result;

//End Dhruva's code

$jj = json_decode($result);



//echo   "\n------------------------------------------------\n"  ;

//var_dump($jj);

//print   "\n------------------------------------------------\n"  ;


if ($jj != NULL){							//Checks if anyrthing is returned from the API as nothing is returned upon error.

print "\nLogin Successful";
print "\nLogin Status = ";
print $jj->{'status'};
print "\nName = ";
print $jj->{'message'}->{'user'}->{'name'};
print "\nEmail = ";
print $jj->{'message'}->{'user'}->{'email'};
print "\nID = ";
print $jj->{'message'}->{'user'}->{'id'};
print "\nCompany Id = ";
print $jj->{'message'}->{'user'}->{'company_id'};
print "\nTwitter = ";
print $jj->{'message'}->{'user'}->{'twitter'};
print "\nLinkedin = ";
print $jj->{'message'}->{'user'}->{'linkedin'};
print "\nResume = ";
print $jj->{'message'}->{'user'}->{'resume'};
print "\nWebsite = ";
print $jj->{'message'}->{'user'}->{'website'};
print "\nRole = ";
print $jj->{'message'}->{'user'}->{'role'};
print "\nCompany = ";
print $jj->{'message'}->{'user'}->{'company'};



}
else{
	print "\Login Error!";
}




















?>
</pre>
</body>
</html>
