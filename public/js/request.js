function request(url, type)
{	
	//url chama a classe e a funcao
	//type 0 = pra dados
	//type 1 = pra paginas
	const xhttp = new XMLHttpRequest;

	
	xhttp.open("GET", url+"/?r=1");
	console.log(xhttp);
	//requisição do tipo pagina
	if(type == 1)
	{		
		xhttp.onload = function()
		{
			if(xhttp.status == 200){
				//coloca os dados no elemento 
				document.getElementById("main").innerHTML = xhttp.responseText;
			}else{
				console.log(xhttp.status);
			}
		}

	}else{
		//requisição para dados
		xhttp.onload = function()
		{
			if(xhttp.status == 200)
			{
				console.log(xhttp);
				//cria variavel com os dados que vem do servidor em formato json
				document.getElementById("main").innerHTML = xhttp.responseText;
				//const json = JSON.parse(this.responseText);
				//console.log(json);
			}
		}
	}
	xhttp.send();

}