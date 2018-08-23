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
    <!-- Custom styles for this template -->
    <link href="../templates/admin/css/dashboard.css" rel="stylesheet">
	<script src="../templates/libs/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">{$vars.nameSiteWeb}</a>
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
					  <a class="nav-link text-white blueac" href="index.php?page=Psrv">
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
				<h1 class="h2">Gestion des serveurs de sauvegarde</h1>
			</div>
			<div class="row">
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
									<button id="delete" class="btn btn-danger" role="button"><i class="far fa-trash-alt"></i></button>
									<!--<a class="btn btn-danger" href="index.php?page=Psrv&delete=1&idSrv={$foo['id']}" role="button" title="Supprimer le serveur"><i class="far fa-trash-alt"></i></a>-->
								</td>
							</tr>
							{/foreach}
					  </body>
					</table>
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
				<div class="col-sm-3">					
				</div>
					<div class="col-sm-7">	
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
        </main>
      </div>
    </div>
	<script>
	$( document ).ready(function() {
		$("#sendFormNewSrv").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			$.ajax({
				   type: "POST",
				   url: "addSrv.php",
				   data: $("#sendFormNewSrv").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });

			
		});
		$("#sendFormModifSrv").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			$.ajax({
				   type: "POST",
				   url: "modifSrv.php",
				   data: $("#sendFormModifSrv").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });			
		});
		$("#delete").click(function(e) {
			e.preventDefault();
			swal({
				title: "Confirmez?",
				text: "Vous voulez surppimer ce serveur de sauvegarde?!",
				icon: "info",
				buttons: true,
				dangerMode: true,
			 })
			.then((willDelete) => {
				if (willDelete) {
				  swal("Supprimer! Le serveur de sauvegarde à été suprimer!", {
					icon: "success",
				  });
				  window.location.href = "index.php?page=PsiteWeb&delete=1&idSite="+$("#delete").val();
				}
			});
		});
	});
	</script>
	<script>window.jQuery || document.write('<script src="../templates/admin/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../templates/admin/js/popper.min.js"></script>
    <script src="../templates/admin/js/bootstrap.min.js"></script>

  </body>
</html>
</html>
