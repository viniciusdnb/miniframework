<di class="conteudo">
<ul>
	<?php
		foreach($data["dados"] as $value)
		{
			echo '<li>'.$value["marca"].'</li>';
		}
	?>
</ul>
<a href="http://<?php echo APP_HOST;?>">voltar</a>
</di>