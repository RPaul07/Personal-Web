<?php

function db_connect($db){
	$hostname="localhost";
	$username="web_user";
	$password="V0z0K6W)c9J1.sgG";
	
	$dblink=new mysqli($hostname, $username, $password, $db);

	if(mysqli_connect_error())
	{
		die("<h2>Something went wrong with our initial database connection!!<br>".mysqli_connect_error()."</h2>");
	}
	return $dblink;
	
}

// create function to replace header(Location: )

function redirect($uri)
{?>
<script type="text/javascript">
	document.location.href="<?php echo $uri;?>";
</script>
<?php
 die;
	
}

?>