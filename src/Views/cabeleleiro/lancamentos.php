<link href="<?= APP_HOST ?>css/lancamentos.css" rel="stylesheet">
<div class="container">
		<div class="card">
			<form action="" method="">
				<div id="grupo" class="input-group">
					<div class="produto" id="produto">
						<label>Produto</label>
						<select name="txt_produto[]">
							<option value="1">Corte 1</option>
							<option value="2">Corte 2</option>
							<option value="3">Corte 3</option>
							<option value="4">Pomada</option>
						</select>
					</div>
					<div class="valor">
						<label>Valor</label>
						<input type="text" name="txt_valor[]" id="valor" class="input-valor">
					</div>
					<div class="button">
						<i class="btn btn-mais" onclick="adicionar()">+</i>
						<i class="btn btn-menos" onclick="remover()">-</i>
					</div>					
				</div>
				<div class="novo"></div>
				<div class="salvar">
					<input class="btn-salvar" type="submit" name="" value="Salvar">
				</div>
			</form>
		</div>
	</div>
	<script>
		function adicionar(){
			var grupo = document.querySelector("#grupo");
			var g = grupo.cloneNode(true);
			var novo = document.querySelector(".novo");
			novo.appendChild(g);
		}

		function remover()
		{
			var novo = document.querySelector(".novo");
			var interno = novo.querySelector("#grupo");
			novo.removeChild(interno);

		}
	</script>