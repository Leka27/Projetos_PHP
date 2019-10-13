<?php
	$tituloPagina = "Lista clientes";
	include_once('../suporte/menu.php');
?>  
    <section class="wrapper"  style='margin-left:10%;'>
        <div class="inner">
            <h3>Clientes</h3>
            <button type="button" data-toggle="modal" data-target="#dialogCadastrarCliente" class="primary">Cadastrar</button>
            <form method="post" id="form-filtrar-cliente">
                <input type="hidden" name="acao" id="acao" value="filtrar"/>
                <div style="width:80%;">
                    <div class="form-group"  style="width:80%">
                        <label for="filtroClientes"  class="col-form-label">Filtro:</label>
                        <input type="text" class="form-control" id="filtroClientes"/>
                    </div>
                    <div class="form-group">
						<label for="tipoFiltro" class="col-form-label">Filtrar por:</label>
						<select name="tipoFiltro" class="form-control" id="tipoFiltro">
							<option value="nome">Nome</option>
							<option value="id">Código</option>
							<option value="cpf">CPF</option>
							<option value="login">Login</option>
						</select>
					</div>
                    <button type="button" style="width:20%" id="btn_filtrar_clientes"><img src="https://img.icons8.com/metro/26/000000/search.png"></button>
                </div>
            </form>
            <div class="table-wrapper">
                <table id="tabelaClientes">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Login</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php
    $acaoLink = "acoes.php";
	$acao = "alterar";
    include('form.php');
    $acao = "cadastrar";
	include('form.php');
	include_once('../rodape.php');
?>