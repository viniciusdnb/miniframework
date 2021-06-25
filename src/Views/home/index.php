
<div class="home">
<div class="titulo">
	<h1>BEM VINDO</h1>
</div>
<?php

use function src\Libs\route;


?>
	<div class="opcoes">
		
		<div class="btn portifolio">
			<a href="<?= route('produto')?>">Portifolio</a>
		</div>
		<div class="btn restrito">
			<a href="<?php echo APP_HOST ?>produto/dados/1">Area Restrita</a>
		</div>


	</div>
</div>
