<?php
$name = array("first name" => "John", "middle name" => "Kyle", "surname" => "Connor", 
		   "age" => "30","sex" => "male", "rank" => " the Resistance leader");

while(list($key, $value) = each($name))
	{

	 echo $key . " : " . $value . "<br>";	

	}


?>