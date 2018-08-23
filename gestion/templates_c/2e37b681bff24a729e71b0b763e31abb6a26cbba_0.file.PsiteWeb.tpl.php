<?php
/* Smarty version 3.1.32, created on 2018-07-26 09:23:28
  from 'C:\wamp64\www\BackupManagement\templates\admin\PsiteWeb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b59931003dca3_44632208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e37b681bff24a729e71b0b763e31abb6a26cbba' => 
    array (
      0 => 'C:\\wamp64\\www\\BackupManagement\\templates\\admin\\PsiteWeb.tpl',
      1 => 1532597003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b59931003dca3_44632208 (Smarty_Internal_Template $_smarty_tpl) {
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
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><?php echo $_smarty_tpl->tpl_vars['vars']->value['nameSiteWeb'];?>
</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.php?deconnect=1"><i class="far fa-power-off"></i> Deconnection</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=PsiteWeb">
					<i class="far fa-book"></i> Gestion des site
				</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=Pbackup">
					<i class="fas fa-file-download"></i> Gestion des sauvegarde
				</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=HistoricsBackup">
					<i class="far fa-history"></i> Historique des sauvegarde
                </a>
              </li>			  
			  <li class="nav-item">
                <a class="nav-link" href="index.php?page=Psettings">
					<i class="far fa-cog"></i> Paramétrage
                </a>
              </li>
            </ul>
        
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des liste</h1>
			</div>
			<div class="row">				
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Nom</th>
							<th scope="col">Addresse</th>
							<th scope="col">backup</th>
						</tr>
					</thead>
					<tbody>
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
								<td><button data-id="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" class="btn"><i class="fas fa-file-download"></i></button></td>
							</tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</tbody>
				</table>
			</div>
			<br>
			<hr>
			<form name="sendFormNewSite" id="sendFormNewSite" action="" method="POST">
				<div class="form-group">
				  <label for="nameSite">Non du site</label>
				  <input type="text" class="form-control" name="nameSite" id="nameSite" placeholder="Non du site">
				</div>
				<div class="form-group">
				  <label for="addrSite">Addresse du site</label>
				  <input type="text" class="form-control" name="addrSite" id="addrSite" placeholder="Addresse du site">
				</div>
				<div class="form-group">
				  <label for="ftpAddr">Addresse FTP</label>
				  <input type="text" class="form-control" name="ftpAddr" id="ftpAddr" placeholder="Addresse FTP ">
				</div>
				<div class="form-group">
				  <label for="ftpUser">Utilisateur FTP</label>
				  <input type="text" class="form-control" name="ftpUser" id="ftpUser" placeholder="Utilisateur FTP ">
				</div>
				<div class="form-group">
				  <label for="ftpPassword">Mot de passe FTP</label>
				  <input type="password" class="form-control" name="ftpPassword" id="ftpPassword" placeholder="Mot de passe FTP ">
				</div>
				<div class="form-group">
				  <label for="ftpPassword">Port FTP</label>
				  <input type="text" class="form-control" name="ftpPort" id="ftpPort" placeholder="FTP Port" value="21">
				</div>
				<button type="submit" class="btn btn-dark"><i class="far fa-plus-circle"></i> Ajouter un site web</button>
			</form>
		</main>
      </div>
    </div>
	<?php echo '<script'; ?>
>
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
