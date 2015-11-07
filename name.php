<?php 

$name = array("first name" => "John", "middle name" => "Kyle", "surname" => "Connor", 
		   "age" => "30","sex" => "male", "rank" => " the Resistance leader");

	  echo "for method <br/>" ;

for (reset($name); ($key = key($name)); next($name))
	{

	  echo $key. " : " .$name[$key] . "<br>";

	}	

	 echo "foreach method <br/>";

foreach($name as $key => $value) 
   { 

      echo "$key : $value <br/>"; 

   } 

    
?>