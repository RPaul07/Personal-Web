<?php

	session_start();
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	include("functions.php");

	if (isset($_GET['page']))
		$page=$_GET['page'];
	else
		$page="home";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Website - <?php echo $page?> Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/templatemo-style.css">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

  <!-- MENU -->
  <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
        <a href="#top" class="navbar-brand">Rahul Paul</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-nav-first">
          <?php
			include("navigation.php");
			
			?>
        </ul>
      </div>
    </div>
  </section>

  <!-- HOME SECTION -->
  <section id="home">
    <div class="container">
      <div class="row">
		  
		  <?php
		  
		  	
		  
		  	switch($page){
				
					
				case "contact":
					include("contact.php");
					break;
					
				case "results":
					include ("results.php");
					break;
				
				default:
					foreach($menu as $key=>$value){
						if($page==$key)
							echo $value['content'];
						//else
						//	echo $menu['home']['content'];
					}
					break;
			}
		  
		  
		  ?>
	
		  
      </div>
    </div>
  </section>


</body>
</html>
