<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Looking for your next job in Israel? - לוח הדרושים שמרכז את כל המשרות בישראל באתר אחד">
  <meta name="keywords" content="jobs972, recruitment, hr, Israel, job, find, אחד, הדרושים, career, בישראל, high, salary">

  <title>Jobs972 - Recruitment in Israel | Where to Find Jobs in Israel? | How to Find a Job in Israel?</title>
  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
  <link href="assets/css/font-awesome.css" rel="stylesheet">	
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,300" rel='stylesheet' type='text/css'>
  <link href='assets/css/jobs972.css' rel='stylesheet' type='text/css'>
	
  <?php

	// some reCaptcha :)
	$a = rand(1, 10);
	$b = rand(2, 9);

  ?>  

<script>
				
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}	

function doSubscribeByEmail()
{
	var nErrors =0;
										
	// check email
	if (document.getElementById("subscr_email").value==null || document.getElementById("subscr_email").value=="")
	{
		document.getElementById("subscr_email").style.borderColor = "red";
		document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";			
		nErrors++;
	}	
	else if (!validateEmail(document.getElementById("subscr_email").value))
	{			
		document.getElementById("subscr_email").style.borderColor = "red";
		document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";	
		nErrors++;			
	}		
	else 
	{
		document.getElementById("subscr_email").style.borderColor = "green";
		document.getElementById("subscr_email").style.boxShadow = "2px 2px 2px lightgray";
	}		

	// captcha
	if (document.getElementById("captcha_subsc").value==null || document.getElementById("captcha_subsc").value=="")
	{		
		document.getElementById("captcha_subsc").style.borderColor = "red";
		document.getElementById("captcha_subsc").style.boxShadow = "3px 3px 3px lightgray";
		nErrors++;
	}	
	else if (document.getElementById("captcha_subsc").value!=<?php echo $a+$b; ?>)
	{
		document.getElementById("captcha_subsc").style.borderColor = "red";
		document.getElementById("captcha_subsc").style.boxShadow = "3px 3px 3px lightgray";
		nErrors++;			
	}
	else
	{
		document.getElementById("captcha_subsc").style.borderColor = "green";
		document.getElementById("captcha_subsc").style.boxShadow = "2px 2px 2px lightgray";
	}			
						
	if (nErrors==0)
	{					
		var url = "subscribe_email.php";
					
		var oData = new FormData(document.forms.namedItem("frmSubscribeByEmail"));
		
		var oReq = new XMLHttpRequest();
		  oReq.open("POST", url, true);
		  oReq.onload = function(oEvent) {
								
			if (oReq.status == 200) 
			{			
				// alert('>>'+oReq.responseText);					
				$('#SubscribeEmail').modal('hide');
				$('#SubscribeEmailOk').modal('show');
				document.getElementById("subscr_email").value="";
				document.getElementById("subsc_email_onform").value="";
				document.getElementById("subsc_fname").value="";
				document.getElementById("subsc_lname").value="";
				document.getElementById("subsc_phone").value="";
				document.getElementById("subsc_city").value="";
				document.getElementById("captcha_subsc").value="";
				document.getElementById("captcha_subsc").style.borderColor = "lightgray";
				document.getElementById("captcha_subsc").style.boxShadow = "none";
				document.getElementById("subscr_email").style.borderColor = "lightgray";
				document.getElementById("subscr_email").style.boxShadow = "none";				
				document.getElementById('subsc_allow').checked = false;
				$('#subscribe_button').addClass('disabled');
				$('#subscribe_button').prop('disabled', true);				
				return;
				
			} else {
			  alert("Error " + oReq.status + " occurred.<br \/>");
			}
		  };

		oReq.send(oData); 
	}

}

function clickAllowSubscr()
{	
	
	if (document.getElementById('subsc_allow').checked)
	{
		$('#subscribe_button').removeClass('disabled');
		$('#subscribe_button').prop('disabled', false);
	}
	else
	{
		$('#subscribe_button').addClass('disabled');
		$('#subscribe_button').prop('disabled', true);
	}
}

function SubscribeToEmail()
{
	var nErrors =0;

	if (document.getElementById("subscr_email").value==null || document.getElementById("subscr_email").value=="")
	{
		document.getElementById("subscr_email").style.borderColor = "red";
		document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";			
		nErrors++;
	}	
	else if (!validateEmail(document.getElementById("subscr_email").value))
	{			
		document.getElementById("subscr_email").style.borderColor = "red";
		document.getElementById("subscr_email").style.boxShadow = "3px 3px 3px lightgray";	
		nErrors++;			
	}		
	else 
	{
		document.getElementById("subscr_email").style.borderColor = "green";
		document.getElementById("subscr_email").style.boxShadow = "2px 2px 2px lightgray";
	}		

	if (nErrors==0)
	{	
		document.getElementById("subsc_email_onform").readOnly=true;
		document.getElementById("subsc_email_onform").value=document.getElementById("subscr_email").value;
		$('#SubscribeEmail').modal('show');		
	}
}
	
function ajax_post()
{
	var nErrors =0;
	
	
	if (document.getElementById("firstname").value==null || document.getElementById("firstname").value=="")
	{
	
		document.getElementById("inp_first_name").className = "form-group has-error";
		nErrors++;
	}
	else
	{
		document.getElementById("inp_first_name").className = "form-group";
	}
	
	if (document.getElementById("lastname").value==null || document.getElementById("lastname").value=="")
	{
	
		document.getElementById("inp_last_name").className = "form-group has-error";
		nErrors++;
	}	
	else
	{
		document.getElementById("inp_last_name").className = "form-group";
	}
	
	if (document.getElementById("email").value==null || document.getElementById("email").value=="")
	{
	
		document.getElementById("inp_email").className = "form-group has-error";
		nErrors++;
	}	
	else if (!validateEmail(document.getElementById("email").value))
	{			
		document.getElementById("inp_email").className = "form-group has-error";
		nErrors++;			
	}		
	else 
	{
		document.getElementById("inp_email").className = "form-group";
	}				
	
	if (document.getElementById("subject").value==null || document.getElementById("subject").value=="")
	{
	
		document.getElementById("inp_subject").className = "form-group has-error";
		nErrors++;
	}	
	else
	{
		document.getElementById("inp_subject").className = "form-group";
	}		
	
	if (document.getElementById("message").value==null || document.getElementById("message").value=="")
	{
	
		document.getElementById("inp_message").className = "form-group has-error";
		nErrors++;
	}	
	else
	{
		document.getElementById("inp_message").className = "form-group";
	}

	if (document.getElementById("captcha").value==null || document.getElementById("captcha").value=="")
	{
	
		document.getElementById("inp_captcha").className = "form-group has-error";
		nErrors++;
	}	
	else if (document.getElementById("captcha").value!=<?php echo $a+$b; ?>)
	{
		document.getElementById("inp_captcha").className = "form-group has-error";
		nErrors++;			
	}
	else
	{
		document.getElementById("inp_captcha").className = "form-group";
	}	
	
	if (nErrors==0)
	{
		
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "send_email_contact_us.php";
		var fn = document.getElementById("firstname").value;
		var ln = document.getElementById("lastname").value;
		var em = document.getElementById("email").value;
		var sb = document.getElementById("subject").value;
		var ms = document.getElementById("message").value;
		
		var vars = "fn="+fn+"&ln="+ln+"&em="+em+"&sb="+sb+"&ms="+ms;
		hr.open("POST", url, true);
		// Set content type header information for sending url encoded variables in the request
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
											
				///alert('return_data= '+return_data);
				document.getElementById("txtreply").style.display='block';
				document.getElementById("contact_status").style.display='none';
				document.getElementById("txtreply").scrollIntoView(true);
				 
			}
		}
		// Send the data to PHP now... and wait for response to update the status div			
		hr.send(vars); // Actually execute the request						
	}
}	
	
function reload_page()
{		
	location.reload(true);
}
	
// limit input chars
function limit(element, n_max_chars)
{
	var max_chars = n_max_chars;

	if(element.value.length > n_max_chars) {
		element.value = element.value.substr(0, n_max_chars);
	}
}

function sendResume()
{
	$("#submitResume").modal()
}

function FindJobsFilter()
{

	var e = document.getElementById("inpCity");
	var strCity = e.options[e.selectedIndex].value;
	
	var strSearch = document.getElementById("inpJob").value;	
	
	strSearch = strSearch.replace("\'", "");
	strSearch = strSearch.replace("\"", "");
	strSearch = strSearch.replace("'", "");
	strSearch = strSearch.replace("&", "");
	strSearch = strSearch.replace("!", "");
	strSearch = strSearch.replace("\\", "");
	strSearch = strSearch.replace(";", "");
	strSearch = strSearch.replace("(", "");
	strSearch = strSearch.replace(")", "");
	strSearch = strSearch.replace("%", "");
	
	location.href = "https://jobs972.com/index.php?p=1&c="+strCity+"&s="+strSearch;
}	
	
// limit input chars
function limit(element, n_max_chars)
{
	var max_chars = n_max_chars;

	if(element.value.length > n_max_chars) {
		element.value = element.value.substr(0, n_max_chars);
	}
}

function doSignUp()
{
	document.getElementById("su_first_name").value = '';
	document.getElementById("su_first_name").style.borderColor = "lightgray";
	document.getElementById("su_last_name").value = '';
	document.getElementById("su_last_name").style.borderColor = "lightgray";
	document.getElementById("su_email").value = '';
	document.getElementById("su_email").style.borderColor = "lightgray";
	document.getElementById("su_pwd").value = '';
	document.getElementById("su_pwd").style.borderColor = "lightgray";
	document.getElementById("captcha").value = '';
	document.getElementById("captcha").style.borderColor = "lightgray";	
	$("#signUp").modal()
}

function doLogin()
{
	document.getElementById("lo_email").value = '';
	document.getElementById("lo_email").style.borderColor = "lightgray";
	document.getElementById("lo_pwd").value = '';
	document.getElementById("lo_pwd").style.borderColor = "lightgray";
	document.getElementById("captcha2").value = '';
	document.getElementById("captcha2").style.borderColor = "lightgray";	
	$("#logIn").modal()
}
	
function signUpTheUser()
	{
		
		var nErrors =0;
											
		// check su_first_name
		
		if (document.getElementById("su_first_name").value==null || document.getElementById("su_first_name").value=="")
		{					
			document.getElementById("su_first_name").style.borderColor = "red";
			document.getElementById("su_first_name").style.boxShadow = "2px 2px 2px lightgray";
			nErrors++;
		}
		else
		{
			var str=document.getElementById("su_first_name").value;
			var n= str.length;
			var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
			
			var nErrSpecChars = 0;
			
			for(i = 0; i < specialChars.length;i++)
			{
				if(str.indexOf(specialChars[i]) > -1)
				{
					nErrSpecChars++;
				}
			}
			
			if (n < 2 || n > 20 || str.indexOf(' ')>=0 || nErrSpecChars>0)
			{			
				document.getElementById("su_first_name").style.borderColor = "red";
				document.getElementById("su_first_name").style.boxShadow = "3px 3px 3px lightgray";
				nErrors++;						
			}			
			else
			{
				document.getElementById("su_first_name").style.borderColor = "green";
				document.getElementById("su_first_name").style.boxShadow = "2px 2px 2px lightgray";
			}
		}

		// check su_last_name
		
		if (document.getElementById("su_last_name").value==null || document.getElementById("su_last_name").value=="")
		{					
			document.getElementById("su_last_name").style.borderColor = "red";
			document.getElementById("su_last_name").style.boxShadow = "2px 2px 2px lightgray";
			nErrors++;
		}
		else
		{
			var str=document.getElementById("su_last_name").value;
			var n= str.length;
			var specialChars = "<>@#$%^&()_+[]{}?:;|'\"\\/~`-=";
			
			var nErrSpecChars = 0;
			
			for(i = 0; i < specialChars.length;i++)
			{
				if(str.indexOf(specialChars[i]) > -1)
				{
					nErrSpecChars++;
				}
			}
			
			if (n < 2 || n > 20 || nErrSpecChars>0)
			{			
				document.getElementById("su_last_name").style.borderColor = "red";
				document.getElementById("su_last_name").style.boxShadow = "3px 3px 3px lightgray";
				nErrors++;						
			}			
			else
			{
				document.getElementById("su_last_name").style.borderColor = "green";
				document.getElementById("su_last_name").style.boxShadow = "2px 2px 2px lightgray";
			}
		}
		
		// check email
		
		if (document.getElementById("su_email").value==null || document.getElementById("su_email").value=="")
		{
			document.getElementById("su_email").style.borderColor = "red";
			document.getElementById("su_email").style.boxShadow = "3px 3px 3px lightgray";			
			nErrors++;
		}	
		else if (!validateEmail(document.getElementById("su_email").value))
		{			
			document.getElementById("su_email").style.borderColor = "red";
			document.getElementById("su_email").style.boxShadow = "3px 3px 3px lightgray";	
			nErrors++;			
		}		
		else 
		{
			document.getElementById("su_email").style.borderColor = "green";
			document.getElementById("su_email").style.boxShadow = "2px 2px 2px lightgray";
		}		
 
 
		// check pwd
		
		if (document.getElementById("su_pwd").value==null || document.getElementById("su_pwd").value=="")
		{					
			document.getElementById("su_pwd").style.borderColor = "red";
			document.getElementById("su_pwd").style.boxShadow = "2px 2px 2px lightgray";
			nErrors++;
		}
		else
		{
			var str=document.getElementById("su_pwd").value;
			var n= str.length;
			var specialChars = "()[]{}?:;|'\"\\/~`-=";
			
			var nErrSpecChars = 0;
			
			for(i = 0; i < specialChars.length;i++)
			{
				if(str.indexOf(specialChars[i]) > -1)
				{
					nErrSpecChars++;
				}
			}
			
			if (n < 5 || n > 30 || nErrSpecChars>0)
			{			
				document.getElementById("su_pwd").style.borderColor = "red";
				document.getElementById("su_pwd").style.boxShadow = "3px 3px 3px lightgray";
				nErrors++;						
			}			
			else
			{
				document.getElementById("su_pwd").style.borderColor = "green";
				document.getElementById("su_pwd").style.boxShadow = "2px 2px 2px lightgray";
			}
		}

		// captcha
		
		if (document.getElementById("captcha").value==null || document.getElementById("captcha").value=="")
		{		
			document.getElementById("captcha").style.borderColor = "red";
			document.getElementById("captcha").style.boxShadow = "3px 3px 3px lightgray";
			nErrors++;
		}	
		else if (document.getElementById("captcha").value!=<?php echo $a+$b; ?>)
		{
			document.getElementById("captcha").style.borderColor = "red";
			document.getElementById("captcha").style.boxShadow = "3px 3px 3px lightgray";
			nErrors++;			
		}
		else
		{
			document.getElementById("captcha").style.borderColor = "green";
			document.getElementById("captcha").style.boxShadow = "2px 2px 2px lightgray";
		}			
							
		if (nErrors==0)
		{					
			var url = "register_new_user.php";
						
			var oData = new FormData(document.forms.namedItem("signUpForm"));
			
			var oReq = new XMLHttpRequest();
			  oReq.open("POST", url, true);
			  oReq.onload = function(oEvent) {
									
				if (oReq.status == 200) 
				{			
					// alert('>>'+oReq.responseText);
						
				    if (oReq.responseText == 'EXISTS')
					{
						$('#signUp').modal('hide');
						$('#signUpAlreadyExists').modal('show');

						document.getElementById("captcha").value="";
						document.getElementById("su_pwd").value="";
					}
					else
					{
						$('#signUp').modal('hide');
						$('#signUpOk').modal('show');
						document.getElementById("su_first_name").value="";
						document.getElementById("su_last_name").value="";
						document.getElementById("su_email").value="";
						document.getElementById("su_pwd").value="";
						document.getElementById("captcha").value="";
					}
					return;
					
				} else {
				  alert("Error " + oReq.status + " occurred uploading your file.<br \/>");
				}
			  };

			oReq.send(oData); 
		}
	}	

	
	
function logInTheUser()
	{
		
		var nErrors =0;
		
		// check email lo_email
		
		if (document.getElementById("lo_email").value==null || document.getElementById("lo_email").value=="")
		{
			document.getElementById("lo_email").style.borderColor = "red";
			document.getElementById("lo_email").style.boxShadow = "3px 3px 3px lightgray";			
			nErrors++;
		}	
		else if (!validateEmail(document.getElementById("lo_email").value))
		{			
			document.getElementById("lo_email").style.borderColor = "red";
			document.getElementById("lo_email").style.boxShadow = "3px 3px 3px lightgray";	
			nErrors++;			
		}		
		else 
		{
			document.getElementById("lo_email").style.borderColor = "green";
			document.getElementById("lo_email").style.boxShadow = "2px 2px 2px lightgray";
		}		
 
 
		// check pwd lo_pwd
		
		if (document.getElementById("lo_pwd").value==null || document.getElementById("lo_pwd").value=="")
		{					
			document.getElementById("lo_pwd").style.borderColor = "red";
			document.getElementById("lo_pwd").style.boxShadow = "2px 2px 2px lightgray";
			nErrors++;
		}
		else
		{
			var str=document.getElementById("lo_pwd").value;
			var n= str.length;
			var specialChars = "()[]{}?:;|'\"\\/~`-=";
			
			var nErrSpecChars = 0;
			
			for(i = 0; i < specialChars.length;i++)
			{
				if(str.indexOf(specialChars[i]) > -1)
				{
					nErrSpecChars++;
				}
			}
			
			if (n < 5 || n > 30 || nErrSpecChars>0)
			{			
				document.getElementById("lo_pwd").style.borderColor = "red";
				document.getElementById("lo_pwd").style.boxShadow = "3px 3px 3px lightgray";
				nErrors++;						
			}			
			else
			{
				document.getElementById("lo_pwd").style.borderColor = "green";
				document.getElementById("lo_pwd").style.boxShadow = "2px 2px 2px lightgray";
			}
		}

		// captcha2
		
		if (document.getElementById("captcha2").value==null || document.getElementById("captcha2").value=="")
		{		
			document.getElementById("captcha2").style.borderColor = "red";
			document.getElementById("captcha2").style.boxShadow = "3px 3px 3px lightgray";
			nErrors++;
		}	
		else if (document.getElementById("captcha2").value!=<?php echo $a+$b; ?>)
		{
			document.getElementById("captcha2").style.borderColor = "red";
			document.getElementById("captcha2").style.boxShadow = "3px 3px 3px lightgray";
			nErrors++;			
		}
		else
		{
			document.getElementById("captcha2").style.borderColor = "green";
			document.getElementById("captcha2").style.boxShadow = "2px 2px 2px lightgray";
		}			
							
		if (nErrors==0)
		{					
			var url = "login_user.php";
						
			var oData = new FormData(document.forms.namedItem("LoginForm"));
			
			var oReq = new XMLHttpRequest();
			  oReq.open("POST", url, true);
			  oReq.onload = function(oEvent) {
									
				if (oReq.status == 200) 
				{			
					// alert('>>'+oReq.responseText);
						
				    if (oReq.responseText == 'OK')
					{
						$('#logIn').modal('hide');												
						document.getElementById("lo_email").value="";
						document.getElementById("lo_pwd").value="";
						document.getElementById("captcha2").value="";
						
						window.location.replace("http://jobs972.com/user_dashboard.php");
					}
					else if (oReq.responseText == 'Not Verified')
					{
						$('#logIn').modal('hide');						
						$('#accountIsNotVerified').modal('show');

						document.getElementById("lo_email").value="";
						document.getElementById("lo_pwd").value="";
						document.getElementById("captcha2").value="";										
					}					
					else
					{
						$('#logIn').modal('hide');						
						$('#logInError').modal('show');

						document.getElementById("lo_email").value="";
						document.getElementById("lo_pwd").value="";
						document.getElementById("captcha2").value="";										
					}
					return;
					
				} else {
				  alert("Error " + oReq.status + " occurred uploading your file.<br \/>");
				}
			  };

			oReq.send(oData); 
		}
	}	
	
<!-- end js -->
</script>


</head>
<body>

<?php include_once("analyticstracking.php") ?>

<?php
	// conn db parameters
	require_once('inc/db_connect.php');
	
	// conn functions
	require_once('functions/functions.php');	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$conn->query("set names 'utf8'");		
	
	$small_footer = getFooter($conn);	
	$arr_cities = getCities($conn);				
	$arr_trending_jobs = getTrandingJobs($conn, 12);		
	$arr_regions = getRegionsEnglish($conn);
	
	$conn->close();	
		
?>	

 <div class="navbar navbar-static-top" style="margin-bottom:0;" >
	<div class="container" style="font-size:15px;">
			
		<button class ="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">		
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>		
		</button>
		
		<div class="collapse navbar-collapse navHeaderCollapse">
		
			<ul class="nav navbar-nav navbar-left">			
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href="positions.php">Positions</a></li>
				<li><a href="categories.php">Categories</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="companies.php">Companies</a></li>
				<li class="active"><a href="contactus.php">Contact Us</a></li>				
			</ul>
			
			<div class="hidden-sm">
			<ul class="nav navbar-nav navbar-right">							 
			
				<?php
				if ($_SESSION['auth_login'] == 1)
				{
				?>				
					<li><a href="user_dashboard.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['logged_in_user_firstname']; ?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Exit</a></li>													
				<?
				}
				elseif ($_SESSION['princ_login'] == 1)				
				{
				?>
					<li><a style="color:red" href="princ_dashboard.php"><span style="color:red" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['princ_first_name']; ?></a></li>
					<li><a style="color:red" href="principal/logout.php"><span style="color:red" class="glyphicon glyphicon-log-out"></span> Exit</a></li>					
				<?
				} 
				else
				{
				?>								
					<li><a href="#" onClick="doSignUp()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#" onClick="doLogin()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>											
				<?
				}
				?>
			
				 
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">English <span class="caret"></span></a>
				  <ul class="dropdown-menu">					
					<li><a href="contactus_heb.php">עיברית</a></li>					
				  </ul>
				</li> 			
			</ul>	
			</div>
			
		
		</div> 
		
	</div> 
 </div> <!-- the end of navbar navbar-inverse navbar-static-top -->
 
 
<!-- jtron start -->
  
<div class="jumbotron">
	
	<div class = "container" style="font-size:16px;">
	
		<a href="https://jobs972.com/index.php" style="text-decoration: none;"><h1>Find Job in Israel!</h1></a>
		<p>Welcome to <b>Jobs972</b>: The most challenging positions, The most attractive companies, Totally Free!</p>
		<p style="font-size:90%">Find Job in Israel | חיפוש עבודה | Israeli Companies | משרות הייטק | High Paying Jobs in Israel | לוח דרושים איכותי</p>
		<table style="border-spacing: 5px; border-collapse: separate;">
			<tr>
				<td style='width:200px;'>
					<input type="text" class="form-control" id="inpJob" placeholder="Job title, skills, or company">
				</td>
				<td style='width:200px;'>					
					<select class="form-control" id="inpCity" name="inpCity">
						<option value="-1">All Regions | All Cities</option>	
						<option value="-2">--------------------</option>
						<?
						for ($idx=0; $idx< sizeof($arr_regions); $idx++)
						{
							echo '<option value="'.$arr_regions[$idx]['region_en'].'">'.$arr_regions[$idx]['region_en'].'</option>';
						}
						?>		
						<option value="-3">--------------------</option>
						<?					
						for ($idx=0; $idx<sizeof($arr_cities); $idx++)
						{						
							echo '<option value="'.$arr_cities[$idx]['id'].'">'.$arr_cities[$idx]['name_en'].'</option>';
						}						
						?>												
					</select>					
				</td>
				<td><a class="btn btn-default" style="background: none; color: #ffffff; padding: 6px 12px;" onclick="FindJobsFilter()">Find</a></td>
			</tr>
		</table>
	</div>
 
 </div>
 
 <!-- jtron end -->
 
 
 <div class="container" style="font-size:smaller;">
 
	<div class="row">
	
			<div class="col-md-9">

				<div class="box" id="contact">
					<h1>Contact Us</h1>

					<p class="lead">Do you have a question? Do you want to know more about finding job in Israel?</p>
					<p>Please contact us.</p>

					<div class="row" style='background-color:#F0F0F0'>
						<!-- /.col-sm-4 -->
						<div class="col-sm-6">
							<h3><i class="fa fa-phone"></i> Contact Us</h3>
							<p class="text-muted">Please fill the form, <br>presented below,</p>
							<p><strong>and we'll answer you shortly.</strong>
							</p>
						</div>
						<!-- /.col-sm-4 -->
						<div class="col-sm-6">
							<h3><i class="fa fa-envelope"></i> Question by Email</h3>
							<p class="text-muted">Please send us email, we'll be glad to answer.</p>
							<ul>
								<li><strong><a href="mailto:contact@jobs972.com?Subject=Contact Us">contact@jobs972.com</a></strong>
								</li>                                  
							</ul>
						</div>
						<!-- /.col-sm-4 -->
					</div>
					<!-- /.row -->
					
					<h2>Contact Form</h2>
					
					<form data-toggle="validator" role="form" id="ContactForm">
						<div class="row" id="contact_status">
							<div class="col-sm-6">
								<div id="inp_first_name" class="form-group">
									<label for="firstname">Firstname</label>
									<input type="text" class="form-control" name="firstname" id="firstname">
								</div>
							</div>
							<div class="col-sm-6">
								<div id="inp_last_name" class="form-group">
									<label for="lastname">Lastname</label>
									<input type="text" class="form-control" name="lastname" id="lastname">
								</div>
							</div>
							<div class="col-sm-6">
								<div id="inp_email" class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control" name="email" id="email">
								</div>
							</div>
							<div class="col-sm-6">
								<div id="inp_subject" class="form-group">
									<label for="subject">Subject</label>
									<input type="text" class="form-control" name="subject" id="subject">
								</div>
							</div>
							<div class="col-sm-12">
								<div id="inp_message" class="form-group">
									<label for="message">Your message</label>
									<textarea id="message"  name="message" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-sm-4">
								<div id="inp_captcha" class="form-group">
									<label for="captcha">How much is <?php echo $a; ?> + <?php echo $b; ?> = ?</label>
									<input type="text" class="form-control" name="captcha" id="captcha">
								</div>
							</div>								
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-primary" onclick="ajax_post(); return false;"><i class="fa fa-envelope-o"></i> Send</button>
							</div>
						</div>
						<!-- /.row -->
						
						 
						<div class="jumbotron" id='txtreply' style='display:none'>
							<h2 style='text-align:center'>Your message sent successfully!</h2>
							<p style='text-align:center'>We'll answer you shortly!</p>
							<p style='text-align:center'><a class="btn btn-primary btn-lg" href="#" onclick="reload_page();" role="button">Ок</a></p>
						</div>
						 
					
					</form>					

				</div>


             </div>	
	

	
	
		<!-- right bar -->
		<div class="col-md-3">

			<div class="panel panel-default">
				<div class="panel-body" style='text-align:center'>
					<img src="images/banner_2.jpg">
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body" style='text-align:center'>
				<img src="images/banner_2.jpg" style="margin:0 0 20px 0"> 
				<p>Find Job in Israel <br/> 
				חיפוש עבודה <br/> 
				Israeli Companies <br/>  משרות הייטק <br/>  High Paying Jobs in Israel <br/>  לוח דרושים איכותי</p>
				</div>
			</div>	

		</div>	
	
	</div>
 
 </div>

  
 <div class="clearfix" style="margin-bottom:20px;"></div> 
 
<!-- Pre footer -->

	<div id="footer">
		<div class="container" style="font-size:15px;">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<h4>Pages</h4>

					<ul>
						<li><a href="index.php">Home</a>
						</li>												
						<li><a href="positions.php">Positions</a>
						</li>	
						<li><a href="categories.php">Categories</a>
						</li>						
						<li><a href="companies.php">Companies</a>
						</li>							
						<li><a href="aboutus.php">About Us</a>
						</li>						
						<li><a href="contactus.php">Contact Us</a>
						</li>
					</ul>				

					<hr class="hidden-md hidden-lg hidden-sm">

				</div>
				<!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<h4>Trending Jobs</h4>
				 
					<ul>
						<?
						for($idx=0; $idx<sizeof($arr_trending_jobs); $idx++)
						{
						?>
							<li><a href="index.php?i=<? echo $arr_trending_jobs[$idx]['id']; ?>"><? echo $arr_trending_jobs[$idx]['pos_title']; ?></a></li>						
						<?
						}
						?>
					</ul>

					<hr class="hidden-md hidden-lg">

				</div>
				<!-- /.col-md-3 -->

				<div class="col-md-3 col-sm-6">

					<h4>Contact Us</h4>

					<a href="contactus.php">Contact Us</a>

					<hr class="hidden-md hidden-lg">

				</div>
				<!-- /.col-md-3 -->



				<div class="col-md-3 col-sm-6">

					<h4>Subscribe</h4>

					<p class="text-muted" style="font-size:14px;">Get top new jobs delivered to your inbox</p>

					<form  enctype="multipart/form-data" method="post" name="SubscribeEmail">
						<div class="input-group">
							
							<input type="text" class="form-control" name="subscr_email" id="subscr_email">

							<span class="input-group-btn">

								<button class="btn btn-default" type="button" onclick="SubscribeToEmail();">Subscribe!</button>

							</span>

						</div>
						<!-- /input-group -->
					</form>

					<hr>

					<h5>Join Us on Social Networks!</h5>

					<p class="social">						
						<a href="https://www.facebook.com/jobs972com" target='_blank' class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/jobs972com" target='_blank' class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
						<a href="#" target='_blank' class="linkedin external" data-animate-hover="shake"><i class="fa fa-linkedin"></i></a>
						<a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>	
						<a href="mailto: ?Subject=Find Job In Israel!" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>						
					</p>


				</div>
				<!-- /.col-md-3 -->

			</div>
			<!-- /.row -->

		</div>
		<!-- /.container -->
	</div>
	<!-- /#footer -->	
	
	<!-- End Pre Footer -->
 
 
 <!--- footer start --->
 
 <div id="copyright">
	<div class="container" style="font-size:14px;">
		<div class="col-md-8">
			<p class="pull-left"><? echo $small_footer; ?><span class="hidden-sm hidden-xs"> - Find Job in Israel!</span></p>		 
		</div>
		<div class="col-md-4">
			<p class="pull-right"><a href="#">Back To Top</a></p>
		</div>
	</div>
  </div>
  
 <!-- footer end -->
 
    <script src="jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	
	<div class="modal fade" tabindex="-1" role="dialog" id="signUp">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Sign Up</h4>
		  </div>
		  <form role="form" data-toggle="validator" name="signUpForm" enctype="multipart/form-data" method="post">
		  <div class="modal-body" style="font-size:14px;">
				<table style="margin-left:auto; margin-right:auto">
				<tr>
					<td style="padding:7px;">
						<div id="inp_su_first_name" class="form-group" >
							<label for="su_first_name">First Name</label>
							  <input class="form-control" onkeydown="limit(this, 20);" onkeyup="limit(this, 20);"
							  id="su_first_name" name="su_first_name" placeholder="Your First Name" value="" />
						</div>	
					</td> 
					<td style="padding:7px;">
						<div id="inp_su_last_name" class="form-group" >
							<label for="su_last_name">Last Name</label>
							  <input class="form-control" onkeydown="limit(this, 20);" onkeyup="limit(this, 20);"
							  id="su_last_name" name="su_last_name" placeholder="Your Last Name" value="" />
						</div>	
					</td>
				</tr>				
				<tr>
					<td style="padding:7px;">
						<div id="inp_su_email" class="form-group" >
							<label for="su_email">Email</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="su_email" name="su_email" placeholder="Your Email" value="" />
						</div>	
					</td>
					<td style="padding:7px;">
						<div id="inp_su_pwd" class="form-group" >
							<label for="su_pwd">Password</label>
							  <input type='password' class="form-control" onkeydown="limit(this, 20);" onkeyup="limit(this, 20);"
							  id="su_pwd" name="su_pwd" placeholder="Your Password" value="" />
						</div>						
					</td>
				</tr>
				<tr>
					<td style="padding:7px;">
						<div id="inp_captcha" class="form-group">
							<label for="captcha"><?php echo $a; ?> + <?php echo $b; ?> = ?</label>
							<input type="text" class="form-control" name="captcha" id="captcha">
						</div>	
					</td>
					<td style="padding:7px;">
						<!-- it's nothing to say... -->
					</td>				
				</tr>
				</table>
		  </div>		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="submit" onclick="signUpTheUser(); return false;" class="btn btn-primary">Register</button>
		  </div>
		  </form>
		</div> 
	  </div> 
	</div> 	

	<!--- Login Form --->
	<div class="modal fade" tabindex="-1" role="dialog" id="logIn">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Login</h4>
		  </div>
		  <form role="form" data-toggle="validator" name="LoginForm" enctype="multipart/form-data" method="post">
		  <div class="modal-body" style="font-size:14px;">
				<table style="margin-left:auto; margin-right:auto">				
				<tr>
					<td style="padding:7px;">
						<div id="inp_lo_email" class="form-group" >
							<label for="lo_email">Email</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="lo_email" name="lo_email" placeholder="Your Email" value="" />
						</div>	
					</td>
					<td style="padding:7px;">
						<div id="inp_lo_pwd" class="form-group" >
							<label for="lo_pwd">Password</label>
							  <input type='password' class="form-control" onkeydown="limit(this, 20);" onkeyup="limit(this, 20);"
							  id="lo_pwd" name="lo_pwd" placeholder="Your Password" value="" />
						</div>						
					</td>
				</tr>
				<tr>
					<td style="padding:7px;">
						<div id="inp_captcha2" class="form-group">
							<label for="captcha2"><?php echo $a; ?> + <?php echo $b; ?> = ?</label>
							<input type="text" class="form-control" name="captcha2" id="captcha2">
						</div>	
					</td>
					<td style="padding:7px;">
							<!-- nothing to say --->
					</td>				
				</tr>
				</table>
		  </div>		  
		  <div class="modal-footer">
			<div class="pull-left">
				&nbsp;
				<!-- facebook doesn't have it, and we too :) -->
				<!--
				<div class="checkbox">
				  <label><input type="checkbox" value="">Remember Me</label>
				</div>
				-->
			</div>
			<div class="pull-right">
				<div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" onclick="logInTheUser(); return false;" class="btn btn-primary">Login</button>
				</div>
			</div>
			
			<div class="clearfix"></div>
			
		  </div>
		  </form>
		</div> 
	  </div> 
	</div>	
	

	<div class="modal fade" tabindex="-1" role="dialog" id="signUpOk">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Sign Up</h4>
		  </div>
		  <div class="modal-body" style="font-size:14px;">
				Congratulations! You've registered successfully! You can login now.
		  </div>		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>			
		  </div>
		</div> 
	  </div> 
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="signUpAlreadyExists">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Sign Up</h4>
		  </div>
		  <div class="modal-body" style="font-size:14px;">
				Such user already exists!
		  </div>		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>			
		  </div>
		</div> 
	  </div> 
	</div> 		
	
	<!-- no such user modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="logInError">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Log Up</h4>
		  </div>
		  <div class="modal-body" style="font-size:14px;">
				We're unable to find this user.<br/>Please check your Login and Password details.
		  </div>		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>			
		  </div>
		</div> 
	  </div> 
	</div> 		
	
	<!-- no account verified modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="accountIsNotVerified">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Log Up</h4>
		  </div>		  
		  <div class="modal-body" style="font-size:14px;">
				It looks your account is not verified yet. Please check your email to verify your account on the Jobs972. Thank you!
		  </div>		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>			
		  </div>		  
		</div> 
	  </div> 
	</div>

	<!-- subscribe by email -->
	<div class="modal fade" tabindex="-1" role="dialog" id="SubscribeEmail">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Subscribe By Email</h4>
		  </div>
		  <form role="form" data-toggle="validator" name="frmSubscribeByEmail" enctype="multipart/form-data" method="post" autocomplete="off">
		  <div class="modal-body" style="font-size:14px;">
				<table style="margin-left:auto; margin-right:auto">				
				<tr>
					<td style="padding:7px;">
						<div id="inp_subsc_email_onform" class="form-group" >
							<label for="subsc_email_onform">Email</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="subsc_email_onform" name="subsc_email_onform" placeholder="Your Email" value="" />
						</div>	
					</td>
					<td style="padding:7px;">
						<div id="inp_subsc_fname" class="form-group" >
							<label for="subsc_fname">First Name</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="subsc_fname" name="subsc_fname" placeholder="First Name" value="" />
						</div>	
					</td>
					<td style="padding:7px;">
						<div id="inp_subsc_lname" class="form-group" >
							<label for="subsc_lname">Last Name</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="subsc_lname" name="subsc_lname" placeholder="Last Name" value="" />
						</div>	
					</td>					
				</tr>
				<tr>
					<td style="padding:7px;">
						<div id="inp_subsc_phone" class="form-group" >
							<label for="subsc_phone">Phone</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="subsc_phone" name="subsc_phone" placeholder="Phone" value="" />
						</div>	
					</td>	
					<td style="padding:7px;">
						<div id="inp_subsc_city" class="form-group" >
							<label for="subsc_city">City</label>
							  <input class="form-control" onkeydown="limit(this, 30);" onkeyup="limit(this, 30);"
							  id="subsc_city" name="subsc_city" placeholder="City" value="" />
						</div>	
					</td>
					<td style="padding:7px;">
						<div id="inp_captcha_subsc" class="form-group">
							<label for="captcha_subsc"><?php echo $a; ?> + <?php echo $b; ?> = ?</label>
							<input type="text" class="form-control" name="captcha_subsc" id="captcha_subsc">
						</div>	
					</td>					
				</tr>	
				<tr>
					<td style="padding:7px;" colspan="3">
						<div id="inp_subsc_allow" class="form-group">
							<div class="checkbox">
							  <label><input type="checkbox" name="subsc_allow" id="subsc_allow" value="" onclick="clickAllowSubscr();">I allow to send me emails about new positions and news from the Jobs972.com</label>
							</div>
						</div>	
					</td>					
				</tr>				
				</table>
		  </div>		  
		  <div class="modal-footer">
			<div class="pull-left">
				&nbsp;				
			</div>
								
			<div class="pull-right">
				<div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="subscribe_button" type="submit" onclick="doSubscribeByEmail(); return false;" disabled class="btn btn-primary disabled">Subscribe</button>
				</div>
			</div>
			
			<div class="clearfix"></div>
			
		  </div>
		  </form>
		</div> 
	  </div> 
	</div>		

	<!-- subscribe by email Ok -->
	<div class="modal fade" tabindex="-1" role="dialog" id="SubscribeEmailOk">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Please check your Email</h4>
		  </div>		  
		  <div class="modal-body" style="font-size:14px;">
				Congratulations! You've just subscribed to get news and most attractive positions from the Jobs972.com! Please check your Email inbox to confirm your address.
		  </div>		  
		  <div class="modal-footer">
			<div class="pull-left">
				&nbsp;				
			</div>
								
			<div class="pull-right">
				<div>					
					<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				</div>
			</div>
			
			<div class="clearfix"></div>
			
		  </div>		  
		</div> 
	  </div> 	
	
</body>
</html>

