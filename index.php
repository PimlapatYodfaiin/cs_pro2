
<?php 

include 'page/dbconnect.php';

if (!isset($_SESSION['user_id'])) {

	echo '<script>window.location.href="login.php";</script>'; 
	
}

if (isset($_GET['logout'])) {
	session_destroy();

	echo '<script>window.location.href="login.php";</script>'; 
	
}



if(isset($_GET['page'])){
    include "view/head.php";
    include "view/navber.php";
    include "view/left_sidebar.php";
    include "page/".$_GET['page'].".php";
    // include "view/wrapper.php";
    // include "view/footer.php";
    include "view/end.php";
}
else{
include "view/head.php";
include "view/navber.php";
include "view/left_sidebar.php";
// include "view/wrapper.php";
// include "view/footer.php";
include "view/end.php";
}
?>