<style>
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		nav{
			background: #00316b;
			width: 100%;
		}
		ul{
			width: 80%;
			margin: 0 auto;
			padding: 0;
		}

		ul li {
			list-style: none;
			display: inline-block;
			/*com o padding consegue criar "caixas" nos textos*/
			padding: 20px;
			cursor: pointer;
		}

		ul li:hover
		{
			background: #e91e63;
		}

		ul li a
		{
			color: #fff;
			text-decoration: none;
		}

		.toggle{
			width: 100%;
			padding: 10px 20px;
			background: #001f44;
			text-align: right;
			box-sizing: border-box;
			color: #fff;
			font-size: 20px;
			/*esconde o elemento da tela*/
			display: none;
		}
		
		@media(max-width: 768px){
			/*mantem o elemento em diplay block ate a largura maxima */
			.toggle{
				display: block;
			}

			ul li{
				display: block;
				text-align: center;
				
			}
			ul{
			width: 100%;
			display: none;
			}

			.active{
				display: block;
			}
		}
		</style>
<nav>
	<div>
		<?php use function src\Libs\route;
		
		?>
		<div class="toggle">
			<a class="menu">Menu</a>
		</div>
	</div>
	<ul class="ul">
		<li><a href="<?= route("cabeleleiro")?>">Home</a></li>
		<li><a href="<?= route("cabeleleiro/lancamentos")?>">Lançamentos</a></li>
	</ul>	
	</nav>
<script>
		
			var menu = document.querySelector(".menu")
			menu.addEventListener("click", click);

		function click(){
			var ul = document.querySelector(".ul");
			var nameClass = ul.className
			
			if(nameClass.indexOf("active") !== -1){			
					ul.classList.remove("active");				
			}else{			
				ul.classList.add("active");
			}			
			
		}
	</script>