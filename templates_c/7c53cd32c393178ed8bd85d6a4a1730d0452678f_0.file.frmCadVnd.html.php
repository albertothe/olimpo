<?php
/* Smarty version 3.1.30, created on 2019-09-23 09:26:47
  from "/var/www/html/olimpo/templates/frmCadVnd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d88ba0742bc42_03345004',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c53cd32c393178ed8bd85d6a4a1730d0452678f' => 
    array (
      0 => '/var/www/html/olimpo/templates/frmCadVnd.html',
      1 => 1569241406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d88ba0742bc42_03345004 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Olimpo - Sistema de controle
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="../stylos/font-awesome.min.css" rel="stylesheet">
	<link href="../stylos/frmCadVnd.css" rel="stylesheet">
	<?php echo '<script'; ?>
 src="jquery-ui.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="jquery-1.12.4.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../stylos/jquery.ui.datepicker-pt-br.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../js/autoCliente.js"><?php echo '</script'; ?>
>
</head>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Olimpo Teresina</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Buscar...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
			  <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://45.79.24.109/olimpo/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="frmCadUsua.php?operacao=ver&codusuario=<?php echo $_smarty_tpl->tpl_vars['session_codUsuarioLogado']->value;?>
">Perfil</a>
                  <a class="dropdown-item" href="logout.php">Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">
      </div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
				
			<div id="LayerCorpo">
			<div id="wb_TextNovaVnd">
			<span style="color:#808080;font-family:'PT Sans';font-size:19px;"><strong>Nova Vendas - Nº. </strong></span></div>
			<div id="wb_TextIdVnd">
			<span style="color:#1E90FF;font-family:'PT Sans';font-size:19px;"><strong><?php echo $_smarty_tpl->tpl_vars['codmovimento']->value;?>
</strong></span></div>
			<hr id="LineDados">
			<div id="wb_FrmDadosVnd">
			<form name="frmBuscar" method="get" action="" id="FrmDadosVnd">
			<div id="wb_TextData">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Data</span></div>
			<input type="text" id="EditboxData" name="data" value="<?php echo $_smarty_tpl->tpl_vars['dataMov']->value;?>
" disabled spellcheck="true" title="Data">
			<div id="wb_TextVendedor">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Vendedor</span></div>
			<select name="vendedor" size="1" id="ComboboxVendedor">
			<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['codVendedor']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['codVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['nomeVendedor']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
			<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
			</select>
			<div id="wb_TextPlano">
			<span style="color:#808080;font-family:Arial;font-size:16px;">FormaPagamento</span></div>
			<select name="formapagamento" size="1" id="ComboboxPlano">
			<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['codForma']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['codForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['nomeForma']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</option>
			<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
			</select>
			<div id="wb_TextCliente">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Cliente</span></div>
			<input type="text" id="EditboxCliente" name="cliente" value="" spellcheck="true" title="Procurar cliente">
			<div id="wb_TextStatus">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Status:</span></div>
			<div id="wb_TextSit">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">Pendente</span></div>
			<input type="submit" id="ButtonCriarVnd" name="" value="Criar Venda">
			</form>
			</div>
			<hr id="LineItens">
			<div id="wb_FormItensVnd">
			<form name="frmBuscar" method="get" action="" id="FormItensVnd">
			<div id="wb_TextProduto">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Produto</span></div>
			<input type="text" id="EditboxProduto" name="codproduto" value="" spellcheck="false">
			<div id="wb_TextGrade">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Grade</span></div>
			<select name="grade" size="1" id="ComboboxGrade">
			<option value="36">36</option>
			<option value="38">38</option>
			<option value="40">40</option>
			</select>
			<div id="wb_TextQuantidade">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Quantidade</span></div>
			<input type="text" id="EditboxQuantidade" name="qntmov" value="" spellcheck="false">
			<div id="wb_TextVlrUnit">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Valor Unit.</span></div>
			<input type="text" id="EditboxVlrUnit" name="vlrunit" value="" spellcheck="false">
			<div id="wb_TextTotalItem">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Total:</span></div>
			<div id="wb_TextVlrItem">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">1.000,00</span></div>
			<input type="submit" id="ButtonIncluirItem" name="" value="Incluir Item">
			<div id="wb_TextDescPerc">
			<span style="color:#808080;font-family:Arial;font-size:16px;">$ Desconto</span></div>
			<input type="text" id="EditboxDescPerc" name="desc_perc" value="" spellcheck="false">
			<div id="wb_TextDescVlr">
			<span style="color:#808080;font-family:Arial;font-size:16px;">% Desconto</span></div>
			<input type="text" id="EditboxDescVlr" name="desc_valor" value="" spellcheck="false">
			</form>
			</div>
			<hr id="LineTabela">
			<table id="tblItens">
			<tr>
			<td class="cell0"><span style="color:#000000;"><strong>Seq.</strong></span></td>
			<td class="cell1"><span style="color:#000000;"><strong> Cod</strong></span></td>
			<td class="cell2"><span style="color:#000000;"><strong>Descrição</strong></span></td>
			<td class="cell3"><span style="color:#000000;"><strong>Grad</strong></span></td>
			<td class="cell4"><span style="color:#000000;"><strong>Qnt</strong></span></td>
			<td class="cell5"><span style="color:#000000;"><strong> Vlr Unit.</strong></span></td>
			<td class="cell6"><span style="color:#000000;"><strong>Vlr Tot</strong></span></td>
			</tr>
			<tr>
			<td class="cell7"><span style="color:#000000;">1</span></td>
			<td class="cell1"><span style="color:#000000;">2</span></td>
			<td class="cell8"><span style="color:#000000;"> ADIDAS TENIS</span></td>
			<td class="cell9"><span style="color:#000000;">36</span></td>
			<td class="cell10"><span style="color:#000000;">3</span></td>
			<td class="cell11"><span style="color:#000000;"> 100,00</span></td>
			<td class="cell12"><span style="color:#000000;"> 100,00</span></td>
			</tr>
			<tr>
			<td colspan="7" class="cell13">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="5" class="cell14">&nbsp;</td>
			<td class="cell15"><span style="color:#000000;"><strong>TOTAL VND</strong></span></td>
			<td class="cell16"><span style="color:#000000;"><strong>1.000,00</strong></span></td>
			</tr>
			<tr>
			<td colspan="7" class="cell13">&nbsp;</td>
			</tr>
			<tr>
			<td colspan="3" class="cell17">&nbsp;</td>
			<td colspan="2" class="cell18"><input type="submit" id="ButtonCancelar" onclick="window.location.href='index.php';return false;" name="" value="Cancelar">
			</td>
			<td colspan="2" class="cell18"><input type="submit" id="ButtonFinalizar" onclick="window.location.href='index.php';return false;" name="" value="Finalizar">
			</td>
			</tr>
			</table>
			</div>
			<div id="wb_TextResulTel">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">(86) 99903-3050</span></div>
			<div id="wb_TextCidade">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Cidade:</span></div>
			<div id="wb_TextResultCid">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">Teresina</span></div>
			<div id="wb_TextBairro">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Bairro:</span></div>
			<div id="wb_TextResultBai">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">Parque Sul</span></div>
			<div id="wb_TextUF">
			<span style="color:#808080;font-family:Arial;font-size:16px;">UF:</span></div>
			<div id="wb_TextResultUF">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">PI</span></div>
			<div id="wb_TextTelefone">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Telefone:</span></div>
			<div id="wb_TextEndereco">
			<span style="color:#808080;font-family:Arial;font-size:16px;">Endereço:</span></div>
			<div id="wb_TextResultEnd">
			<span style="color:#1E90FF;font-family:Arial;font-size:16px;">QUADRA AD CASA 32</span></div>

          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <?php echo '<script'; ?>
>
                  document.write(new Date().getFullYear())
                <?php echo '</script'; ?>
> - 7Nove Tecnologia
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  
  <?php echo '<script'; ?>
 src="../assets/js/core/popper.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../assets/js/core/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"><?php echo '</script'; ?>
>
  <!--  Google Maps Plugin    -->
  <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"><?php echo '</script'; ?>
>
  <!-- Chart JS -->
  <?php echo '<script'; ?>
 src="../assets/js/plugins/chartjs.min.js"><?php echo '</script'; ?>
>
  <!--  Notifications Plugin    -->
  <?php echo '<script'; ?>
 src="../assets/js/plugins/bootstrap-notify.js"><?php echo '</script'; ?>
>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <?php echo '<script'; ?>
 src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"><?php echo '</script'; ?>
>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <?php echo '<script'; ?>
 src="../assets/demo/demo.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
