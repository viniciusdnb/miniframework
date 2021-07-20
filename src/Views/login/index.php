<?php use function src\Libs\route; ?>

<style>
	
</style>
<div class="container">
	<div class="box">
		<div class="form">
			<form id="login" action="<?= route("login/auth") ?>" method="POST">
		<div >
			<label>usuario</label>
			<input class="form-control" id="txt_user" type="text" name="txt_user">
		</div>
		<div >
			<label>senha</label>
			<input class="form-control" id="txt_pass" type="password" name="txt_pass">
		</div>
		<div >
			<input class="btn"type="submit" name="entrar" value="Entrar">
		</div>
		
	</form>
		</div>

	</div>
	
</div>
<script>
	const form = document.querySelector("#login");
	form.addEventListener("submit", login);

	function login(e)
	{
		e.preventDefault();
		let user = form.querySelector("#txt_user").value;
		let pass = form.querySelector("#txt_pass").value;

		verify(user, pass);

	}

	function verify(user, pass)
	{
		if(!user.empty && !pass.empty)
		{

			const json = JSON.stringify({"user": user, "pass":pass});
			const xmlhttp = new XMLHttpRequest;
			xmlhttp.onload = function()
			{
				
				if(xmlhttp.status == 200)
				{ //ao vir a resposta correta do servidor. vai inserir os dados vindo dentro da tag passada na querySelect;
					document.querySelector(".container").innerHTML = this.responseText;
				}
			}
			xmlhttp.open(form.method, form.action);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x="+json);
			
		}
	}
</script>