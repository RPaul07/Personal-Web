<script src="assets/js/jquery-3.5.1.js"></script>
<section id="feature">
	  <div class="container">
		   <div class="row">
				<div class="col-md-12 col-sm-12">

					<?php
						//include("functions.php");
						//$dblink=db_connect("contact_data");
					
						echo '<table class="table table-stripped">';
						echo '<thead>';
						echo '<tr>';
						echo '<th>ID</th>';
						echo '<th>First Name</th>';
						echo '<th>Last Name</th>';
						echo '<th>Email</th>';
						echo '<th>Phone</th>';
						echo '<th>Username</th>';
						echo '<th>Password</th>';
						echo '<th>Comments</th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody id= "results">';
						
						echo '</tbody>';
						echo '</table>';
					
					?>


				</div>
			</div>
		</div>
</section>

<script>
	function refresh_data(){
		$.ajax({
			type: 'post',
			url: 'https://ec2-18-118-24-9.us-east-2.compute.amazonaws.com/hw19/query_contacts.php',
			success: function(data){
				$('#results').html(data);
			}
			
		});
	}
	setInterval(function(){refresh_data();},500);
</script>