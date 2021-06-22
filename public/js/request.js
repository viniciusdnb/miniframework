function request(url, type)
{	
	//url chama a classe e a funcao
	//type 0 = pra dados
	//type 1 = pra paginas
	const xhttp = new XMLHttpRequest;

	xhttp.open("GET", url+"/?a=1");
	
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
				//cria variavel com os dados que vem do servidor em formato json
				const json = JSON.parse(this.responseText);
				console.log(json);
			}
		}
	}
	xhttp.send();

}