<?php
	$tituloPagina = "Lista usuários";
	include_once('menu.php');
?>  
    <section class="wrapper"  style='margin-left:10%;'>
        <div class="inner">
            <h3>Usuários</h3>
            <button type="button" data-toggle="modal" data-target="#dialogCadastrarUsuarioSuporte" class="primary">Cadastrar</button>
            <form method="post" id="form-filtrar-usuario-suporte" style="width:100%">
                <input type="hidden" name="acao" id="acao" value="filtrar"/>
                <div style="width:70%;">
                    <div class="form-group"  style="width:70%">
                        <label for="filtroUsuarios"  class="col-form-label">Filtro:</label>
                        <input type="text" class="form-control" id="filtroUsuarios"/>
                    </div>
                    <div class="form-group" style="width:70%;">
						<label for="tipoFiltro" class="col-form-label">Filtrar por:</label>
						<select name="tipoFiltro" class="form-control" id="tipoFiltro">
							<option value="nome">Nome</option>
							<option value="id">Código</option>
							<option value="perfil_usuario">Perfil</option>
						</select>
					</div>
                    <button type="button" style="width:20%" id="btn_filtrar_usuarios"><span  style="width:48%" class="ui-icon ui-icon-search"></span></button>
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