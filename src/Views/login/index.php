<?php use function src\Libs\route; ?>
<div>
	<form action="<?= route("login/auth") ?>" method="POST">
		<div>
			<label>usuario</label>
			<input type="text" name="txt_user">
		</div>
		<div>
			<label>senha</label>
			<input type="password" name="txt_pass">
		</div>
		<input type="submit" name="entrar">
	</form>
</div>