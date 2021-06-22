<?php

	echo "bem vindo ao Json index.";
	$link = "http://localhost/public/json/dados";
?>


<button id="button" onclick="request('<?php echo $link;?>', 0)" >jsonIndex</button>