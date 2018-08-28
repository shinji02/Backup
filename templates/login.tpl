<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">
		<script type='text/javascript' src='templates/libs/jquery.particleground.js'></script>
		<script type='text/javascript' src='templates/libs/demo.js'></script>
		<title>SiteConseil BackupMaganement</title>

		<!-- Bootstrap core CSS -->
		<link href="templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="templates/css/cssPage/signin.css" rel="stylesheet">
		<script src="templates/libs/jquery/jquery-3.2.1.min.js"></script>
		<script src="../libs/sweetAlert/sweetalert.min.js"></script>
		<link rel="stylesheet" href="../libs/sweetAlert/sweetalert.css"/>
		<link rel="stylesheet" href="templates/css/style.css"/>
		<link rel="stylesheet" href="templates/css/flat-ui.css"/>
		<link rel="stylesheet" href="templates/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="templates/css/mystyle.css"/>
	</head>
	<body>
		<div id="particles" class="back_cus">
			<div id="intro" class="intro">
				<form id="formConnect" class="form-signin" action="" method="POST">
					<h2> Site Conseil <br> BackupManagement</h2>
					<hr class="style-three">
					<label for="usernameConnect" class="sr-only">Email address</label>
					<input id="usernameConnect" name="usernameConnect" type="text" class="form-control" placeholder="Utilisateur" required autofocus><br>
					<label for="passwordConnect" class="sr-only">Email address</label>
					<input id="passwordConnect" name="passwordConnect" type="password" class="form-control" placeholder="Mot de pase" required autofocus><br>
					<button class="btn btn-lg btn-primary btn-block" id="formConnectSend" type="submit">Connection</button>
				</form>
				<p class="text-center font-italic">Version 1.0</p>
			</div>
		</div>
	</body>
		
	<script>
		$("#formConnect").submit(function(e) {
			var url = "index.php?connect=1"; // the script where you handle the form input.

			$.ajax({
				   type: "POST",
				   url: url,
				   data: $("#formConnect").serialize(), // serializes the form's elements.
				   success: function(data)
				   {
					   eval(data); // show response from the php script.
				   }
				 });

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
	</script>-
</html>

