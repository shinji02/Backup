<?php
/* Smarty version 3.1.32, created on 2018-07-26 09:48:42
  from 'C:\wamp64\www\BackupManagement\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b5998fa4cb6c9_41287357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '409777cfd8539a80e3ecdcc92f6bb51c79bf9132' => 
    array (
      0 => 'C:\\wamp64\\www\\BackupManagement\\templates\\login.tpl',
      1 => 1532595771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5998fa4cb6c9_41287357 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>SiteConseil.fr BackupMaganement</title>

		<!-- Bootstrap core CSS -->
		<link href="templates/css/bootstrap/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="templates/css/cssPage/signin.css" rel="stylesheet">
		<?php echo '<script'; ?>
 src="templates/libs/jquery/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
	</head>

	<body class="text-center">
		<form id="formConnect" class="form-signin" action="" method="POST">
			<h1 class="h3 mb-3 font-weight-normal">
				Site Conseil<br>
				Backup Management
			</h1>
			<label for="passwordConnect" class="sr-only">Email address</label>
			<input id="passwordConnect" name="passwordConnect" type="text" class="form-control" placeholder="Mot de pase" required autofocus><br>
			<button class="btn btn-lg btn-primary btn-block" id="formConnectSend" type="submit">Connection</button>
		</form>
	</body>
	<?php echo '<script'; ?>
>
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
	<?php echo '</script'; ?>
>
</html>

<?php }
}
