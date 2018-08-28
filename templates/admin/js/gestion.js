/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#siteName").change(function(event){
	if($("#siteName").val()!=0)
	{
		window.location.href ="index.php?page=Pgestion&idSite="+$("#siteName").val();
	}
	else
	{
		window.location.href ="index.php?page=Pgestion";
	}
});

$("#date").change(function(event){
	if($("#date").val()!=0)
	{
		window.location.href ="index.php?page=Pgestion&date="+$("#date").val();
	}
	else
	{
		window.location.href ="index.php?page=Pgestion";
	}
});

$("#emailSucess").change(function (event){
	emailSucess = $("#emailSucess").val();
	emailError = $("#emailError").val();
	emailInfo = $("#emailInfo").val();
	autoBackup = $("#activateAutoBackup").val();
	if(emailSucess == 1)
	{
		$("#emailSucess").val(0);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{
				eval(data); // show response from the php script.
			}
		});
	}
	else if(emailSucess == 0)
	{
		$("#emailSucess").val(1);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{
				eval(data); // show response from the php script.
			}
		});
	}
});

$("#emailError").change(function (event){
	emailSucess = $("#emailSucess").val();
	emailError = $("#emailError").val();
	emailInfo = $("#emailInfo").val();
	autoBackup = $("#activateAutoBackup").val();
	if(emailError == 1)
	{
		$("#emailError").val(0);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{

				eval(data); // show response from the php script.
			}
		});
	}
	else if(emailError == 0)
	{
		$("#emailError").val(1);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{
				eval(data); // show response from the php script.
			}
		});
	}
});
$("#emailInfo").change(function (event){
	emailSucess = $("#emailSucess").val();
	emailError = $("#emailError").val();
	emailInfo = $("#emailInfo").val();
	autoBackup = $("#activateAutoBackup").val();
	if(emailInfo == 1)
	{
		$("#emailInfo").val(0);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{

				eval(data); // show response from the php script.
			}
		});
	}
	else if(emailInfo == 0)
	{
		$("#emailInfo").val(1);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{
				eval(data); // show response from the php script.
			}
		});
	}
});

$("#activateAutoBackup").change(function (event){
	emailSucess = $("#emailSucess").val();
	emailError = $("#emailError").val();
	emailInfo = $("#emailInfo").val();
	autoBackup = $("#activateAutoBackup").val();
	if(autoBackup == 1)
	{
		$("#activateAutoBackup").val(0);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{

				eval(data); // show response from the php script.
			}
		});
	}
	else if(autoBackup == 0)
	{
		$("#activateAutoBackup").val(1);
		emailSucess = $("#emailSucess").val();
		emailError = $("#emailError").val();
		emailInfo = $("#emailInfo").val();
		autoBackup = $("#activateAutoBackup").val();
		$.ajax({
			type: "POST",
			url: "crlGestion.php",
			data: "emailSucess="+emailSucess+"&emailError="+emailError+"&emailInfo="+emailInfo+"&autoBackup="+autoBackup,
			success: function(data)
			{
				eval(data); // show response from the php script.
			}
		});
	}
});

$("#launchBackup").click(function (event){
		$.ajax({
			type: "POST",
			url: "../backup.php",
			data: "",
			success: function(data)
			{
				swal("Error!", "Les backup ont été effectuer!", "success");
			}
		});
});
