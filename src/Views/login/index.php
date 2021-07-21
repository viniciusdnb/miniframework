<?php use function src\Libs\route; ?>

<div class="container-login"> 
	<div class="card-login">
		<div class="title-login">Bem Vindo</div>
		<div class="card-login-box">
			
			<form action="<?= route("login/auth")?>" method="POST">
				<div class="input-login-control">
					<label class="label-login">Usuario:</label>
					<input class="input-login-form" type="text" name="user" placeholder="seu nome">
				</div>
				<div class="input-login-control">
					<label class="label-login">Senha:</label>
					<input class="input-login-form" type="password" name="pass" placeholder="sua senha">
				</div>
				<div class="footer-login">
					<input class="btn-login" type="submit" value="Entrar">
				</div>
			</form>
		</div>
	</div>
</div>