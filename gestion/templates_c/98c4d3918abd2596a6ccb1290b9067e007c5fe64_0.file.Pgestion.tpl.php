<?php
/* Smarty version 3.1.32, created on 2018-08-09 10:57:53
  from '/var/www/backup/templates/admin/Pgestion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b6c02115a9e40_43239621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98c4d3918abd2596a6ccb1290b9067e007c5fe64' => 
    array (
      0 => '/var/www/backup/templates/admin/Pgestion.tpl',
      1 => 1533805056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b6c02115a9e40_43239621 (Smarty_Internal_Template $_smarty_tpl) {
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
			<div id="listeSire">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['site']->value, 'foo', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['foo']->value) {
?>
					<div class="d-flex p-2 bg-light text-white fexwid" >
						<div class="p-2 bg-dark">
							<button id="site" role="button" class="btn btn-light" value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"><h4>Site: <?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</h4></button>
							<table  id="table-<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"class="table" style="display: none;">
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['backup']->value, 'foo2', false, 'k2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k2']->value => $_smarty_tpl->tpl_vars['foo2']->value) {
?>
										
										<?php if ($_smarty_tpl->tpl_vars['foo2']->value['id_site'] == $_smarty_tpl->tpl_vars['foo']->value['id']) {?>
											<tr>
												 <th class="text-white" scope="row"><?php echo $_smarty_tpl->tpl_vars['foo2']->value['id'];?>
</th>
												 <td class="text-white"><?php echo $_smarty_tpl->tpl_vars['foo2']->value['date'];?>
</td>
												 <td class="text-white"><?php echo $_smarty_tpl->tpl_vars['foo2']->value['name_file'];?>
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
" class="btn btn-light" style="width:100%"><i class="fa fa-download" download></i> Download</a>
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
								</tbody>
							</table>
						</div>
					
					</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
        </main>
      </div>
    </div>
	<?php echo '<script'; ?>
>
		
		$("#listeSire").on('click','button',function(e){
			e.preventDefault();
			var id = $(this).attr('value');
			var tabs = "#table-"+id;
			if($(tabs).is(":hidden"))
			{
				$(tabs).show();
			}
			else
			{
				$(tabs).hide();
			}
		});
	<?php echo '</script'; ?>
>
	  
    <?php echo '<script'; ?>
 src="../templates/admin/js/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../templates/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>

  </body>
</html>
</html>
<?php }
}
