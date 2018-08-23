<?php
/* Smarty version 3.1.32, created on 2018-08-22 16:56:47
  from '/var/www/BackupManagement/templates/admin/Pgestion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b7d79af124bf7_84273812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e3cb6e215d05610ae1062b0da6084d179c4461d' => 
    array (
      0 => '/var/www/BackupManagement/templates/admin/Pgestion.tpl',
      1 => 1534949806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7d79af124bf7_84273812 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/BackupManagement/libs/smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
	
    <title><?php if (isset($_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'])) {
echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];
} else { ?>Sans titre<?php }?></title>

    <!-- Bootstrap core CSS -->
    <link href="../templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="../templates/css/fontawesomepro/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../templates/admin/css/dashboard.css" rel="stylesheet">
	<?php echo '<script'; ?>
 src="../templates/libs/jquery/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><?php echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];?>
</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link text-light" href="../index.php?deconnect=1"><i class="far fa-power-off"></i> Deconnection</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar bg-blue">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">
							<i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="index.php">
						<i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=PsiteWeb">
						  <i class="far fa-book"></i> Gestion des sites
					  </a>
					</li>		  
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Psrv">
						  <i class="far fa-cog"></i> Gestion des serveurs de sauvegarde
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white blueac" href="index.php?page=Pgestion">
						  <i class="far fa-history"></i> Gestion des sauvegardes
					  </a>
					</li>			  
				</ul>        
			</div>
        </nav>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
				<h1 class="h2">Gestion  des sauvegarde</h1>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="" class="col-2 col-form-label">Site</label>
						<div class="col-10">
							<select id="siteName" class="form-control" name="nameSite">
								<option value="0" selected>Tout les sites</option>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listSite']->value, 'nameSite', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['nameSite']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['nameSite']->value['id'];?>
"<?php if (isset($_GET['idSite']) && ($_GET['idSite'] == $_smarty_tpl->tpl_vars['nameSite']->value['id'])) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['nameSite']->value['name'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="example-date-input" class="col-2 col-form-label">Date</label>
						<div class="col-10">
							<input id="date" class="form-control" value="<?php if (isset($_GET['date'])) {
echo smarty_modifier_date_format($_GET['date'],"%Y-%m-%d");
} else {
echo smarty_modifier_date_format(time(),"%Y-%m-%d");
}?>" type="date">
						</div>
					</div>
				</div>
			</div>
			<div id="listeSire">
				<div class="d-flex p-2 bg-light text-white fexwid table-Gestion" >
					<table class="table borderTable">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Date</th>
								<th scope="col">Fichier</th>
								<th scope="col">Status</th>
								<th scope="col">Gestion</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['site']->value, 'foo', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['foo']->value) {
?>
								<tr>
									<td class="siteTitle" colspan="5"><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</td>
								</tr>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['backup']->value, 'foo2', false, 'k2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k2']->value => $_smarty_tpl->tpl_vars['foo2']->value) {
?>

									<?php if ($_smarty_tpl->tpl_vars['foo2']->value['id_site'] == $_smarty_tpl->tpl_vars['foo']->value['id']) {?>
										<tr>
											<th class="" scope="row"><?php echo $_smarty_tpl->tpl_vars['foo2']->value['id'];?>
</th>
											<td class=""><?php echo $_smarty_tpl->tpl_vars['foo2']->value['date'];?>
</td>
											<td class=""><?php echo $_smarty_tpl->tpl_vars['foo2']->value['name_file'];?>
</td>
											<td class="text-white">
												<?php if ($_smarty_tpl->tpl_vars['foo2']->value['status'] == "ok") {?> 
													<button type="button" class="btn btn-success">Réussie</button>
												<?php } else { ?>
													<button type="button" class="btn btn-danger">Echec</button>
												<?php }?>
											</td>
											<td>
												<div class="row">
													<div class="col-sm-12">
														<?php if ($_smarty_tpl->tpl_vars['foo2']->value['status'] == "ok") {?> 													
															<a href="<?php echo $_smarty_tpl->tpl_vars['foo2']->value['link_file'];?>
" class="btn btn-dark" style="width:100%"><i class="fa fa-download" download></i></a>
														<?php }?>
													</div>
												</div>
											</td>
										</tr>
									<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>			
						</tbody>
					</table>
				</div>					
			</div>
        </main>
      </div>
    <?php echo '<script'; ?>
 src="../templates/admin/js/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../templates/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../templates/admin/js/gestion.js"><?php echo '</script'; ?>
>
  </body>
</html>
</html>
<?php }
}
