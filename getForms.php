<?php 
	include "jotform-api-php/JotForm.php";
	$apiKey= 'a4f7b7cac3d9a6b7e2c203755b8a462d'; // Your API Key 

	#Create a new Jotform Object
	$jotformAPI = new JotForm($apiKey);

		 try {
        
	        //filter Forms which is ENABLED only
	        $filter  = array("status" => "ENABLED");
	     
	        #Get all forms which owned by user
	        $forms = $jotformAPI->getForms(0,0, $filter ,null);
	    	//var_dump($forms);
		    
	    }
	    catch (Exception $e) {
	        var_dump($e->getMessage());
	    }



	

?>
