<?php

if((isset($_GET['page']) AND (is_file('controllers/'.$_GET['page'].'.php')))){
	include("controllers/".$_GET['page'].'.php');
}
else{
	echo 'Page not found!';
}

?>