
const form = document.querySelector("#login");

form.addEventListener("submit", login)


	function login(e)
	{
		e.preventDefault();
		let user = form.querySelector("#user").value;
		let pass = form.querySelector("#pass").value;

		verify(user, pass);

	}

	function verify(user, pass)
	{
	
		
		if(user && pass)
		{

			const json = JSON.stringify({"user": user, "pass":pass});
			const xmlhttp = new XMLHttpRequest;
			xmlhttp.onload = function()
			{
				
				if(xmlhttp.status == 200)
				{ //ao vir a resposta correta do servidor. vai inserir os dados vindo dentro da tag passada na querySelect;
					document.querySelector(".main").innerHTML = this.responseText;
					
				}
			
			}
			xmlhttp.open(form.method, form.action);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x="+json);
			
		}else{
			alert("Atençao insira o nome do usuario e senha")
		}
	}