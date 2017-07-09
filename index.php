<?php
	include('config.php');
	session_start();
	if(isset($_SESSION['logged'])!="true")
	{
 		header("Location: login.php");
 		die();
	}
?>
<!Doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"><!-- Normalize -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/form_style.css"> <!-- Form Styling -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>KonTrak</title>
</head>
<body>
	<header class="cd-main-header">
		<a href="index.html" class="cd-logo"><img src="img/cd-logo.svg" alt="Logo"></a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="search" placeholder="Search...">
			</form>
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<!-- <li><a href="#0">Tour</a></li>
				<li><a href="#0">Support</a></li> -->
				<li class="has-children account">
					<a href="#0">
						<img src="img/cd-avatar.png" alt="avatar">
						Account
					</a>
					<ul>
						<li><a href="index.php?logout">Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="cd-label">Main</li>
				<li class="has-children overview">
					<a href="#0">Manage Contracts</a>
					<ul>
						<li><a href="index.php?new_contract">Add New Contract</a></li>
						<li><a href="#0">Edit Contract</a></li>
						<li><a href="#0">Contract Categories</a></li>
					</ul>
				</li>
				<li class="has-children notifications active">
					<a href="#0">Notifications<span class="count"></span></a>
					
					<ul>
						<li><a href="#0">Expiration</a></li>
						<li><a href="#0">Notice Period</a></li>
					</ul>
				</li>

				<li class="has-children comments">
					<a href="#0">Reviewer Comments</a>
					
					<ul>
						<li><a href="#0">Add Review</a></li>
						<li><a href="#0">All Reviews</a></li>
						<li><a href="#0">Edit Reviews</a></li>
					</ul>
				</li>

				<li class="has-children comments">
					<a href="#0">Notice Periods</a>
					
					<ul>
						<li><a href="#0">Add Notice Period</a></li>
						<li><a href="#0">View All</a></li>
					</ul>
				</li>

				<li class="has-children bookmarks">
					<a href="#0">View All Vendors</a>
				</li>

				<li class="has-children bookmarks">
					<a href="#0">Issues</a>
					<ul>
						<li><a href="#0">All Issues</a></li>
						<li><a href="#0">Settle Issues</a></li>
					</ul>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Invoice Management</li>
				<li class="has-children bookmarks">
					<a href="index.php?attach_invoice">Attach an Invoice</a>
				</li>
				<li class="has-children images">
					<a href="#0">Invoice Details</a>
				</li>

				<li class="has-children users">
					<a href="#0">Generate Report</a>
				</li>
			</ul>

			<ul>
				<li class="cd-label">Action</li>
				<li class="action-btn"><a href="#0">+ Submit an Issue</a></li>
			</ul>
		</nav>

		<div class="content-wrapper">
			<?php
				if(isset($_GET['new_contract'])){
                    include("new_contract.php"); 
                }
                if(isset($_GET['attach_invoice'])){
                    include("attach_invoice.php"); 
                }
				if(isset($_GET['logout'])){
                    include("logout.php"); 
                }
			?>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
    $(function() {
        $("#e-datepicker").datepicker();
    });
    $(function() {
        $("#notice-datepicker").datepicker();
    });
</script>
</body>
</html>