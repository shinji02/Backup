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
	<link href="../templates/admin/css/circle.css" rel="stylesheet">
	<script src="../../libs/sweetAlert/sweetalert.min.js"></script>
	<link href="../../libs/sweetAlert/sweetalert.css" rel="stylesheet">
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
	<ul class="sidebar navbar-nav color_nav_cus">
		<li class="nav-item">
			<a class="nav-link" href="index.php">
				<i class="far fa-home"></i> Panel administration <span class="sr-only">(current)</span>
			</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="index.php?page=PsiteWeb">
				<i class="far fa-book"></i> Gestion des sites <span class="sr-only">(current)</span>
			</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="index.php?page=Psrv">
				<i class="far fa-book"></i> Gestion des serveurs de sauvegarde <span class="sr-only">(current)</span>
			</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="index.php?page=Pgestion">
				<i class="far fa-book"></i> Gestion des sauvegardes <span class="sr-only">(current)</span>
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
			<h1 class="h2">Gestion des serveurs de sauvegarde</h1>
			<div class="table-height">
				{if isset($ftp)}
					<table class="table table-dark table-striped">
						<thead>
						<tr>
							<th>Non du serveur</th>
							<th>Addresse du serveur</th>
							<th>Utilisateur de connection</th>
							<th>Action</th>
						</tr>
						</thead>
						<body>

						{foreach from=$ftp item=foo}
							<tr>
								<td>{$foo['name__srv']}</td>
								<td>{$foo['addr_srv']}</td>
								<td>{$foo['ftp_user']}</td>
								<td>
									<a class="btn btn-light" href="index.php?page=Psrv&modif=1&idSrv={$foo['id']}" role="button" title="Modifier le serveur"><i class="far fa-cog"></i></a>
									<button id="delete" class="btn btn-danger" role="button" title="Surppimer le serveur"><i class="far fa-trash-alt"></i></button>
									<!--<a class="btn btn-danger" href="index.php?page=Psrv&delete=1&idSrv={$foo['id']}" role="button" title="Supprimer le serveur"><i class="far fa-trash-alt"></i></a>-->
								</td>
							</tr>
						{/foreach}
						</body>
					</table>
				</div>
				{else}
				<div class="col-sm">
				</div>
				<div class="col-sm-2">
					<div class="card bg-info text-white">
						<div class="card-body"><strong>Attention -> </strong>{$info}</div>
					</div>
				</div>
				<div class="col-sm">
				</div>
			{/if}
				<h3>Ajouter un serveur de sauvegarde</h3>
				<form class="form-horizontal" action="" method="POST" id="{if isset($srvMofif)}sendFormModifSrv{else}sendFormNewSrv{/if}">
					<input type="hidden" class="form-control" name="idSrv" id="idSrv" value="{if isset($srvMofif)}{$srvMofif[0]['id']}{/if}">
					<div class="form-group">
						<label class="control-label col-sm-2" for="srvName">Non du serveur:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="srvName" id="srvName" placeholder="Entrée un nom" value="{if isset($srvMofif)}{$srvMofif[0]['name__srv']}{/if}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="srvAddr">Addresse du serveur:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="srvAddr" id="srvPassword" placeholder="Entrée l'addresse du serveur" value="{if isset($srvMofif)}{$srvMofif[0]['addr_srv']}{/if}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="srvUser">Utilisateur du serveur:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="srvUser" id="srvUser" placeholder="Entrée l'utilisateur du serveur" value="{if isset($srvMofif)}{$srvMofif[0]['ftp_user']}{/if}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="srvPassword">Mot de passe du serveur:</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="srvPassword" id="srvPassword" placeholder="Entrée le mot de passe du serveur" value="{if isset($srvMofif)}{$srvMofif[0]['ftp_password']}{/if}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-5" for="pwd">Port du serveur:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="srvPort" id="srvPort" placeholder="Entrée le port du serveur" value="{if isset($srvMofif)}{$srvMofif[0]['ftp_port']}{else}22{/if}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{if isset($srvMofif)}
								<button type="submit" class="btn btn-dark"><i class="fas fa-sync-alt"></i> Modifier le serveur</button>
							{else}
								<button type="submit" class="btn btn-dark"><i class="far fa-plus-circle"></i> Crée un serveur</button>
							{/if}
						</div>
					</div>
				</form>
			</div>
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
                        window.location.href = "index.php?page=PsiteWeb&delete=1&idSite="+$("#"+id).val();
                    }
                });
        });
	</script>


	<script src="../templates/admin/js/popper.min.js"></script>
	<script src="../templates/admin/js/bootstrap.min.js"></script>

</body>
</html>
</html>
