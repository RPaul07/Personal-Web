<?php


$dblink=db_connect("site_data");
$sql="Select * from `menu` where `status`='active'";
$result=$dblink->query($sql) or 
	die("<h2> Something went wrong with $sql<br>".$dblink->error."</h2>");

$menu= array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
{
	$menu[$data['page']] = array("page"=>$data['page'],"title"=>$data['title'],"content"=>$data['content']);
}

//cycle through array and compare to current values of page from GET 

foreach($menu as $key=>$value){
	if ($page == $key)
		echo '<li class="active"><a href="index.php?page='.$value['page'].'" class = "smoothscroll">'. $value['title']. '</a></li>';
	else
		echo '<li><a href="index.php?page='.$value['page'].'" class = "smoothscroll">'. $value['title']. '</a></li>';
}



//$currentPage = isset($page) ? $page : 'home';
//
//$navLinks = [
//    'home' => 'Home',
//    'aboutme' => 'About',
//    'school' => 'School',
//    'work' => 'Work',
//    'hobbies' => 'Hobbies',
//    'contact' => 'Contact',
//	'results' => 'Results'
//	
//];
//
//foreach ($navLinks as $pageKey => $label) {
//    $activeClass = ($currentPage === $pageKey) ? 'class="active"' : '';
//    echo "<li $activeClass><a href=\"index.php?page=$pageKey\" class=\"smoothScroll\">$label</a></li>";
//}
?>
