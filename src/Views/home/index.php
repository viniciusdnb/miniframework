<?php
	echo "bem vindo ao HomeController -> index";
$url = "http://localhost/public/json/index";

	
?>

<button id="button" onclick="request('<?php echo $url?>',1)">jsonIndex</button>