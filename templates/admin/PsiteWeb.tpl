
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
					<li class="nav-item">
						<a class="nav-link text-white" href="index.php?page=Pcontrol">
							<i class="fas fa-cog"></i> Controle Avancée
						</a>
					</li>					
				</ul>        
			</div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des sites web</h1>
			</div>
				<div class="table-height col-xs-12">				
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
							{foreach from=$vars.listSite item=foo}
								<tr>
									<th scope="row">{$foo.id}</th>
									<td>{$foo.name}</td>
									<td>{$foo.addr}</td>
									<td>
										<button id="backupManual{$foo.id}" title="Lancer une backup" class="btn btn-backup" idSite="{$foo.id}"><i class="fas fa-file-download"></i></button>
										<a href="index.php?page=PsiteWeb&modif=1&idSite={$foo.id}" title="Modifier le site"  class="btn btn-light"><i class="far fa-cogs"></i></a>
										<button id="delete{$foo.id}" class="btn btn-danger btn-delete" role="button" value="{$foo.id}" ><i class="fas fa-trash-alt"></i></button>
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
					<input type="hidden" class="form-control" name="id" id="id" value="{$infoSite['id']}">
				{/if}
				<div class="form-group">
				  <label for="nameSite">Non du site</label>
				  <input type="text" class="form-control" name="nameSite" id="nameSite" placeholder="Non du site" value="{if isset($infoSite)}{$infoSite['name']}{/if}">
				</div>
				<div class="form-group">
				  <label for="addrSite">Addresse du site</label>
				  <input type="text" class="form-control" name="addrSite" id="addrSite" placeholder="Addresse du site" value="{if isset($infoSite)}{$infoSite['addr']}{/if}">
				</div>
				<div class="form-group">
				<label for="selectServeur">Choix du serveur</label>
				<select class="form-control select_custom" name="selectServeur" id="selectServeur">
					{foreach from=$srv item=foo}
						<option value="{$foo.id}" {if $foo.id == $infoSite['id']}selected{/if}>{if $foo.id == $infoSite['id']}{$ftpInfo['name__srv']}{else}{$foo.name__srv}{/if}</option>
					{/foreach}
				  
				</select>
			  </div>
				{if isset($infoSite)} 
					<button type="submit" class="btn btn-dark"><i class="far fa-chevron-circle-right"></i> Modification du site web</button>
				{else}
					<button type="submit" class="btn btn-dark"><i class="far fa-plus-circle"></i> Ajouter un site web</button>
				{/if}				
			</form>
		</main>
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
