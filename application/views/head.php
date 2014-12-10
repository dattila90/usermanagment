<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Managment</title>

		<script src="<?php echo base_url(); ?>js/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	    <script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

		<link href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="<?php echo base_url(); ?>css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="<?php echo base_url(); ?>css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>css/main-style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body>
		<div id="container">
		<?php if($this->session->userdata('logged_in')) { ?>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						    <span class="sr-only">Toggle navigation</span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
					  	</button>
						<a class="navbar-brand" href="<?php echo base_url(); ?>">User Managment</a>

					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php if($this->session->userdata('user_type') == 'admin') { ?>
						<ul class="nav navbar-nav">
							<li class=""><a href="#" id="add_user_menu" data-toggle="modal" data-target="#user_form">Add New User<span class="sr-only">(current)</span></a></li>
							
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
									<li class="divider"></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li> -->
						</ul>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
							  	<input id="search" type="text" class="form-control" placeholder="Search">
							</div>
							<ul id="finalResult"></ul>
							<!-- <button type="submit" class="btn btn-default">Submit</button> -->
						</form>
						<?php } ?>
						<ul class="nav navbar-nav navbar-right">
							<li class=""><a href="<?php echo base_url(); ?>/index.php/index/logout">Logout</a></li>
							<!-- <li class="dropdown">
							  	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
							  	<ul class="dropdown-menu" role="menu">
								    <li><a href="#">Action</a></li>
								    <li><a href="#">Another action</a></li>
								    <li><a href="#">Something else here</a></li>
								    <li class="divider"></li>
								    <li><a href="#">Separated link</a></li>
							  	</ul>
							</li> -->
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<?php } ?>
		<div style="clear:both"></div>