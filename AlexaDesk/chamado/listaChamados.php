<?php
	session_start();
    $tituloPagina = "Lista chamados";
    include_once('../'.$_SESSION['tipoLogin'].'/menu.php');
?>  
    <section class="wrapper" style='margin-left:10%;'>
        <div class="inner">
            <h3>Chamados</h3>
            <button type="button" data-toggle="modal" id="btn_form_cadastrar_chamado" data-target="#dialogCadastrarChamado" class="primary">Registrar chamado</button>
            <form method="post" id="form-filtrar-chamado" style="width:100%">
                <input type="hidden" name="acao" id="acao" value="filtrar"/>
                <div style="width:50%;">
                    <div class="form-group" style="width:70%">
                        <label for="filtroChamados"  class="col-form-label">Filtro:</label>
                        <input type="text" class="form-control" id="filtroChamados"/>
                    </div>
                    <div class="form-group" style="width:70%">
						<label for="tipoFiltro" class="col-form-label">Filtrar por:</label>
						<select name="tipoFiltro" class="form-control" id="tipoFiltro">
                            <option value="chamado_id">Código</option>
                            <option value="motivo_descricao">Motivo</option>
							<option value="motivo_prioridade">Prioridade</option>
							<option value="chamado_flag_status">Status</option>
                        </select>
                        <button type="button" style="margin-top:5px;width:30%" id="btn_filtrar_chamados"><span  style="width:80%" class="ui-icon ui-icon-search"></span></button>
					</div>
                   
                </div>
            </form>
            <div class="table-wrapper">
                <table id="tabelaChamados">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Assunto</th>
                            <th>Motivo</th>
                            <th>Cliente</th>
                            <th>Prioridade</th>
                            <th>Status</th>
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