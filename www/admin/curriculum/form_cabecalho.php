<?php
$PERMISSAO_DE_ACESSO = "Administradores";
require("../includes/permissao_documento.php");
require("../../includes/conectar_mysql.php");

	if ($_POST["modo"] == "update"){
		$query = "UPDATE parametros SET ";
		$query .= "parametro='" . $_POST["conteudo"] . "' where nome='cabecalho_curriculo'";
		$result = mysql_query($query) or die("Erro ao gravar registros no Banco de dados: " . mysql_error());
		if($result) $notificacao = "Dados Gravados com sucesso!";
	}

	$query = "SELECT parametro FROM parametros WHERE nome='cabecalho_curriculo'";
	$result = mysql_query($query) or die("Erro ao acessar registros no Banco de dados: " . mysql_error());
	$contatos = mysql_fetch_array($result, MYSQL_ASSOC);	
?>
<html>
	<head>
		<title>Cadastro de Not�cia</title>
		<style type="text/css">
			<!--
			@import url(../includes/forms.css);
			-->
		</style>
		<script language="JavaScript">
		<?php if ($_POST["modo"] == "update") echo("alert('". $notificacao . "');"); ?>
			function editaconteudo(){
				window.open('../../editor.php', 'Editor', 'width=750,height=400,status=no,resizable=no,top=20,left=20,dependent=yes,alwaysRaised=yes,scrollbars=no');
			}
		</script>
	</head>
	<body leftmargin="0" bottommargin="0" rightmargin="0" topmargin="0" marginheight="0" marginwidth="0">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<table class="tabela_form" width="100%">
					<form name="frm1" method="post" action="form_cabecalho.php">
						<tr> 
							<td colspan="3" style="border: 1px solid #FFFFFF; text-align: center;"><b>Cabe�alho do Formul�rio de Curr�culo</b></td>
						</tr>
						<tr> 
						  <td width="11%" class="label">Conte�do<br><br><br><br><br><br><br><br><br><br><input type="button" value="Editar Conte�do" name="edita_conteudo" class="botao" onClick="javascript: editaconteudo();"></td>
						  <td width="89%" colspan="2" class="cell">
								<textarea name="conteudo" id="conteudo" class="textarea" rows="10" style="width: 440;"><?=$contatos['parametro']?></textarea>
							</td>
						</tr>
						<tr> 
						  <td colspan="2" align="right"><input type="submit" value="Salvar" class="botao"></td>
						</tr>
						<input type="hidden" name="modo" value="update">
					  </form>
					</table>
				</td>
			</tr>
		</table>
		<?php require("../../includes/desconectar_mysql.php"); ?>
	</body>
</html>
