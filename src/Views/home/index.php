
<div class="home">
<div class="titulo">
	<h1>BEM VINDO</h1>
</div>

<?php use function src\Libs\route; ?>



	<div class="opcoes">
		
		<div class="btn portifolio">
			<a href="<?= route('portifolio/portifolio')?>">Portifolio</a>
		</div>	

		<div class="btn portifolio">
			<a href="<?= route('portifolio')?>">Portifolio index</a>
		</div>	
		<div>
			<a href="<?= route("login")?>">Restrito</a>
		</div>
		<div>
			<a href="<?= route("login/r")?>">Restrito</a>
		</div>

	</div>
</div>
