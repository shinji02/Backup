<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>{if isset($vars.nameSiteWeb)}{$vars.nameSiteWeb}{else}Sans titre{/if}</title>

		<!-- Bootstrap core CSS -->
		<link href="../templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="../templates/css/fontawesomepro/css/all.css" rel="stylesheet">
		<script src="../templates/libs/jquery/jquery-3.2.1.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="../templates/admin/css/sb-admin.css" rel="stylesheet">
		<link href="../templates/admin/css/switch.css" rel="stylesheet">
		<script src="../../libs/sweetAlert/sweetalert.min.js"></script>
		<link href="../../libs/sweetAlert/sweetalert.css" rel="stylesheet">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<body id="page-top">
		<nav class="navbar navbar-expand navbar-dark bg-primary static-top">
			<a class="navbar-brand mr-1" href="index.html">{$vars.nameSiteWeb}</a>
			<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
			</button>
			<div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<a title="Deconnection" class="nav-link text-light" href="../index.php?deconnect=1"><i class="far fa-power-off"></i></a>
			</div>

		</nav>
	<div id="wrapper">
		  <ul class="sidebar navbar-nav custom-na color_nav_cus">
			  <li class="nav-item">
				  <a class="nav-link" href="index.php">
					  <i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item active">
				  <a class="nav-link" href="index.php?page=PsiteWeb">
					  <i class="far fa-browser"></i> Gestion des sites <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Psrv">
					  <i class="far fa-server"></i> Gestion des serveurs de sauvegarde <span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Pgestion">
					  <i class="far fa-history"></i> Gestion des sauvegardes<span class="sr-only">(current)</span>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a class="nav-link" href="index.php?page=Pcontrol">
					  <i class="fas fa-cog"></i> Controle Avancée
				  </a>
			  </li>
		  </ul>
		  <div id="content-wrapper">
			  <div class="container-fluid">
				  <h1>Liste des sites</h1>
					<div class="table-Gestion col-xs-12">
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">id</th>
								<th scope="col">Nom</th>
								<th scope="col">Addresse</th>
								<th scope="col">Option</th>
								<th scope="col">Auto Backup</th>
							</tr>
						</thead>
						<tbody>
							<div id="listeSire">
								{foreach from=$vars.listSite item=foo}
									<tr>
										<th scope="row">{$foo.id}</th>
										<td>{$foo.name}</td>
										<td>{$foo.addr}</td>
										<td>
											<button id="backupManual{$foo.id}" title="Lancer une backup" class="btn btn-backup" idSite="{$foo.id}"><i class="fas fa-file-download"></i></button>
											<a href="index.php?page=PsiteWeb&modif=1&idSite={$foo.id}" title="Modifier le site"  class="btn btn-light"><i class="far fa-cogs"></i></a>
											<button id="delete{$foo.id}" class="btn btn-danger btn-delete" role="button" title="Supprimer le site" value="{$foo.id}" ><i class="fas fa-trash-alt"></i></button>
										</td>
                                        <td>
                                            <div class="col-4 text-center">
                                                <label class="label-switch switch-success">
                                                    <input type="checkbox" class="switch-square switch-bootstrap status jsSelect" name="site" id="site-{$foo.id}" value="{$foo.allow_backup_auto}" {if $foo.allow_backup_auto == 1}checked="checked" {/if}>
                                                    <span class="lable"></span></label>
                                            </div>
                                        </td>
									</tr>
								{/foreach}
							</div>
						</tbody>
					</table>
					</div>
				<br>
				<hr>
				<form name="{if isset($infoSite)}sendFormModifSite{else}sendFormNewSite{/if}" id="{if isset($infoSite)}sendFormModifSite{else}sendFormNewSite{/if}" action="" method="POST">
					{if isset($infoSite)}
						<input type="hidden" class="form-control" name="id" id="id" value="{$infoSite[0]['id']}">
					{/if}
					<div class="form-group">
					  <label for="nameSite">Non du site</label>
					  <input type="text" class="form-control" name="nameSite" id="nameSite" placeholder="Non du site" value="{if isset($infoSite)}{$infoSite[0]['name']}{/if}">
					</div>
					<div class="form-group">
					  <label for="addrSite">Addresse du site</label>
					  <input type="text" class="form-control" name="addrSite" id="addrSite" placeholder="Addresse du site" value="{if isset($infoSite)}{$infoSite[0]['addr']}{/if}">
					</div>
					<div class="form-group">
					<label for="selectServeur">Choix du serveur</label>
					<select class="form-control select_custom" name="selectServeur" id="selectServeur">
						{foreach from=$srv item=foo}
							<option value="{$foo.id}" {if isset($infoSite)}{if $foo.id == $infoSite[0]['id']}{/if}selected{/if}>{if isset($infoSite)}{if $foo.id == $infoSite[0]['id']}{$ftpInfo['name__srv']}{else}{$foo.name__srv}{/if}{else}{$foo.name__srv}{/if}</option>
						{/foreach}

					</select>
				  </div>
					{if isset($infoSite)}
						<button type="submit" class="btn btn-dark"><i class="far fa-chevron-circle-right"></i> Modification du site web</button>
					{else}
						<button type="submit" class="btn btn-dark"><i class="far fa-plus-circle"></i> Ajouter un site web</button>
					{/if}
				</form>
		  </div>
		</div>
		<script>

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
						eval(data); // show response from the php script.
						$("#"+id).prop("disabled",false);
					}
				});
			});
			$(".btn-delete").click(function(e){
				var id = $(this).attr('id');
				e.preventDefault();
				swal({
					title: "Confirmez la suprresion?",
					text: "Vous voulez surppimer le site?!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				 })
				.then((willDelete) => {
					if (willDelete) {
					  swal("Supprimer! Le site web à été supprimer!", {
						icon: "success",
					  });
					  window.location.href = "index.php?page=PsiteWeb&delete=1&idSite="+$("#"+id).val();
					}
				});
			});
		</script>


		<script src="../templates/admin/js/popper.min.js"></script>
		<script src="../templates/admin/js/bootstrap.min.js"></script>
        <script src="../templates/admin/js/gestion.js"></script>
	  </body>
	</html>
	</html>
