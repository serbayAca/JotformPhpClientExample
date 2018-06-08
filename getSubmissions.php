<?php
	include "jotform-api-php/JotForm.php";
	$apiKey= 'a4f7b7cac3d9a6b7e2c203755b8a462d'; // Your API Key 

	#Create a new Jotform Object
	$jotformAPI = new JotForm($apiKey);
	
	if( isset ($_POST['form'])){

		#Get form information from AJAX request
		$formID = $_POST['form'];
		//echo $formID;

		$html = "";

		#Get all submissions by form ID
		$submissionsData = $jotformAPI->getFormSubmissions($_POST['form']);
		//var_dump($submissionsData);
		
		# Get data form to HTML Table Model
		foreach ($submissionsData as $submission) {

	    	 if(count($submissionsData) > 0){

	    	 $html .= "<tr>";
		    	 $html .= '<td>'.$formID.'</td>';
		    	 $html .= '<td>'.$submission['id'].'</td>';
		    	 $html .= '<td>'.'</td>';
	    	 $html .= "</tr>";

	    	
	    	 	//$submissions = $submissionsData;
	    	    //var_dump($submissions);
	    	    
	    	 }

	    	foreach ($submission['answers'] as $submissionAnswer ) {


			    	 $html .= "<tr>";
				    	 $html .= '<td>'.'</td>';
				    	 $html .= '<td>'.'</td>';
				    	 $html .= '<td>'.$submissionAnswer['text'].'</td>';

				    	 #Some fields (like matrix radioselect ) returns as array , handle this
				    	 if(is_array($submissionAnswer['answer'])){
				    	 	$html .= '<td>'.implode(' ',$submissionAnswer['answer']).'</td>';
				    	 }
				    	 else{
				    	 	$html .= '<td>'.$submissionAnswer['answer'].'</td>';
				    	 }

				    	 
				    	 //$html .= '<td>'.implode(' ' , $submissionAnswer) .'</td>';
			    	 $html .= "</tr>";

			    	
			    	 	//$submissions = $submissionsData;
			    	    //var_dump($submissions);
		    }
	 
		 } 

		 echo $html;
		
	}
?>