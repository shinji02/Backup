<?php
/* Smarty version 3.1.32, created on 2018-08-09 09:27:09
  from '/var/www/backup/templates/admin/PsiteWeb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b6beccd984232_83022060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd98e41077a211265cef6239daab64953089ca72b' => 
    array (
      0 => '/var/www/backup/templates/admin/PsiteWeb.tpl',
      1 => 1533799610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b6beccd984232_83022060 (Smarty_Internal_Template $_smarty_tpl) {
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
	
	<?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
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
					  <a class="nav-link text-white blueac" href="index.php?page=PsiteWeb">
						  <i class="far fa-book"></i> Gestion des sites
					  </a>
					</li>		  
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Psrv">
						  <i class="far fa-cog"></i> Gestion des serveurs de sauvegarde
					  </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link text-white" href="index.php?page=Pgestion">
						  <i class="far fa-history"></i> Gestion des sauvegardes
					  </a>
					</li>			  
				</ul>        
			</div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des sites web</h1>
			</div>
			<div class="row">				
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Nom</th>
							<th scope="col">Addresse</th>
							<th scope="col">Option</th>
						</tr>
					</thead>
					<tbody>
						<div id="listeSire">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vars']->value['listSite'], 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
?>
								<tr>
									<th scope="row"><?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
</th>
									<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['addr'];?>
</td>
									<td>
										<button id="backupManual<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" title="Lancer une backup" class="btn btn-backup" idSite="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"><i class="fas fa-file-download"></i></button>
										<a href="index.php?page=PsiteWeb&modif=1&idSite=<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" title="Modifier le site"  class="btn btn-light"><i class="far fa-cogs"></i></a>
										<button id="delete" class="btn btn-danger" role="button" value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" ><i class="fas fa-trash-alt"></i></button>
									</td>
								</tr>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>
					</tbody>
				</table>
			</div>
			<br>
			<hr>
			<form name="<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {?>sendFormModifSite<?php } else { ?>sendFormNewSite<?php }?>" id="<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {?>sendFormModifSite<?php } else { ?>sendFormNewSite<?php }?>" action="" method="POST">
				<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {?>
					<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['infoSite']->value['id'];?>
">
				<?php }?>
				<div class="form-group">
				  <label for="nameSite">Non du site</label>
				  <input type="text" class="form-control" name="nameSite" id="nameSite" placeholder="Non du site" value="<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {
echo $_smarty_tpl->tpl_vars['infoSite']->value['name'];
}?>">
				</div>
				<div class="form-group">
				  <label for="addrSite">Addresse du site</label>
				  <input type="text" class="form-control" name="addrSite" id="addrSite" placeholder="Addresse du site" value="<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {
echo $_smarty_tpl->tpl_vars['infoSite']->value['addr'];
}?>">
				</div>
				<div class="form-group">
				<label for="selectServeur">Choix du serveur</label>
				<select class="form-control select_custom" name="selectServeur" id="selectServeur">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['srv']->value, 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['foo']->value['id'] == $_smarty_tpl->tpl_vars['infoSite']->value['id']) {?>selected<?php }?>><?php if ($_smarty_tpl->tpl_vars['foo']->value['id'] == $_smarty_tpl->tpl_vars['infoSite']->value['id']) {
echo $_smarty_tpl->tpl_vars['ftpInfo']->value['name__srv'];
} else {
echo $_smarty_tpl->tpl_vars['foo']->value['name__srv'];
}?></option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				  
				</select>
			  </div>
				<?php if (isset($_smarty_tpl->tpl_vars['infoSite']->value)) {?> 
					<button type="submit" class="btn btn-dark"><i class="far fa-chevron-circle-right"></i> Modification du site web</button>
				<?php } else { ?>
					<button type="submit" class="btn btn-dark"><i class="far fa-plus-circle"></i> Ajouter un site web</button>
				<?php }?>				
			</form>
		</main>
      </div>
    </div>
	<?php echo '<script'; ?>
>	
		
		$("#sendFormModifSite").submit(function(e) {
			var url = "addSite.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: "modifSite.php",
				   data: $("#sendFormModifSite").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
		$("#sendFormNewSite").submit(function(e) {
			var url = "addSite.php"; // the script where you handle the form input.
			
			$.ajax({
				   type: "POST",
				   url: "addSite.php",
				   data: $("#sendFormNewSite").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
		
		$(".btn-backup").click(function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			var idSite = $(this).attr('idSite');
			$("#"+id).prop("disabled",true);
			$.ajax({
				type: "POST",
				url: "backup.php",
				data:{
					id : idSite
				},
				success: function(data)
				{
					alert(id);
					eval(data); // show response from the php script.
					$("#"+id).prop("disabled",false);
				}
			});
		});
		$("#delete").click(function(e){
			e.preventDefault();
			swal({
				title: "Confirmez?",
				text: "Vous voulez surppimer le site?!",
				icon: "info",
				buttons: true,
				dangerMode: true,
			 })
			.then((willDelete) => {
				if (willDelete) {
				  swal("Supprimer! Le site web à été supprimer!", {
					icon: "success",
				  });
				  window.location.href = "index.php?page=PsiteWeb&delete=1&idSite="+$("#delete").val();
				}
			});
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
