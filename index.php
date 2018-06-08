<?php 
	include "getForms.php";

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>

<h2>Forms</h2>

<div id="formsList">
	<ul>
		
		<?php 

			foreach ($forms as $form ) {
				echo '<li><a type=\'button\' href=\'javascript:getSubmissions('.$form["id"].');\' >'.$form["title"] .'</a></li>';
			}

		?>



	</ul>
	

</div>

	
	<h2>Submission Table</h2>

	<table>
		<thead>
			 <tr>
			    <th>Form Name</th>
			    <th>Submissions ID</th>
			    <th>Fields</th>
			    <th>Answers</th>
			  </tr>
		</thead>
		<tbody id="submissionData">
				
				<tr>
				    <td>Example Name</td>
				    <td>000000000000</td>
				    <td>Fields is here</td>
				    <td>Answers is here</td>
				</tr>
				
			
		</tbody>
 
  
	</table>

</body>

<script type="text/javascript">
	

	function getSubmissions( formID  ) {

		$.ajax({
		  type: "POST",
		  url: 'getSubmissions.php',
		  data: {form: formID },
		  success: function (result){
		  	console.log(result);
		  	$('#submissionData').html('');
		  	$('#submissionData').html(result);
		  }
		});

	} 


</script>


</html>
