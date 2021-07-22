<?php use function src\Libs\route; ?>

<div class="container-login"> 
	<div class="card-login">
		<div class="title-login">Bem Vindo</div>
		<div class="card-login-box">
			
			<form id="login" action="<?= route("login/auth")?>" method="POST">
				<div class="input-login-control">
					<label class="label-login">Usuario:</label>
					<input class="input-login-form" id="user"type="text" name="user" placeholder="seu nome">
				</div>
				<div class="input-login-control">
					<label class="label-login">Senha:</label>
					<input class="input-login-form" id="pass"type="password" name="pass" placeholder="sua senha" required>
				</div>
				<div class="footer-login">
					<input class="btn-login" type="submit" value="Entrar">
				</div>
			</form>
		</div>
			<script src="<?= APP_HOST; ?>js/login.js"></script>		
	</div>
</div>