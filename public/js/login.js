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