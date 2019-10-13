<?php
	$tituloPagina = "Lista usuários";
	include_once('menu.php');
?>  
    <section class="wrapper"  style='margin-left:10%;'>
        <div class="inner">
            <h3>Usuários</h3>
            <button type="button" data-toggle="modal" data-target="#dialogCadastrarUsuarioSuporte" class="primary">Cadastrar</button>
            <form method="post" id="form-filtrar-usuario-suporte">
                <input type="hidden" name="acao" id="acao" value="filtrar"/>
                <div style="width:80%;">
                    <div class="form-group"  style="width:80%">
                        <label for="filtroUsuarios"  class="col-form-label">Filtro:</label>
                        <input type="text" class="form-control" id="filtroUsuarios"/>
                    </div>
                    <div class="form-group">
						<label for="tipoFiltro" class="col-form-label">Filtrar por:</label>
						<select name="tipoFiltro" class="form-control" id="tipoFiltro">
							<option value="nome">Nome</option>
							<option value="id">Código</option>
							<option value="perfil_usuario">Perfil</option>
						</select>
					</div>
                    <button type="button" style="width:20%" id="btn_filtrar_usuarios"><img src="https://img.icons8.com/metro/26/000000/search.png"></button>
                </div>
            </form>
            <div class="table-wrapper">
                <table id="tabelaUsuarios">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Perfil</th>
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
	$acao = "alterar";
    include('form.php');
    $acao = "cadastrar";
	include('form.php');
	include_once('../rodape.php');
?>