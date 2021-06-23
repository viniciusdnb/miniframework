<di class="conteudo">
<ul>
	<?php
		foreach($data["dados"] as $value)
		{
			echo '<li>'.$value["marca"].'</li>';
		}
	?>
</ul>
<a href="<?php echo APP_HOST;?>produto">voltar</a>
</di>