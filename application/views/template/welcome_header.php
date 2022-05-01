<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Frigate Bird</title>
<link
	href="<?php echo base_url("resources/startbootstrap-sb-admin-gh-pages/dist/"); ?>css/styles.css"
	rel="stylesheet" />
<link
	href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
	rel="stylesheet" crossorigin="anonymous" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

	
	 <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147047336-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-147047336-1');
        </script>
        
        
        	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
        
<script data-ad-client="ca-pub-9685750414831731" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>	
</head>
<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
		<a class="navbar-brand" href="#"><font color='red'>NGONYAMA</font>LINK</a>
		<button class="btn btn-link btn-sm order-1 order-lg-0"
			id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>
		<!-- Navbar Search-->
		<form
			class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<!-- <input class="form-control" type="text" placeholder="Search for..."
					aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
					<button class="btn btn-primary" type="button">
						<i class="fas fa-search"></i>
					</button>  -->
			</div>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				id="userDropdown" href="#" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"><i
					class="fas fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right"
					aria-labelledby="userDropdown">
                         <?php

                        if (! isset($udata['user_id'])) {
                            ?>
   		 <a class="dropdown-item"
						href="<?php echo base_url("user/registration_form");?>">Register</a>
				 
              
        <?php } ?>
          
             <?php

            if (! isset($udata['user_id'])) {
                ?>
   		 <a class="dropdown-item"
						href="<?php echo base_url("user/login_form");?>">Login</a>
				 
              
        <?php } ?>
        
         <?php

        if (isset($udata['user_id'])) {
            ?>
   		 <a class="dropdown-item"
						href="<?php echo base_url("user/logout");?>">Logout</a>
				 
              
        <?php } ?>
        
        
        <?php
            if (isset($udata['user_id'])) {
                                    ?>
   		 <a class="dropdown-item"
						href="<?php echo base_url("user/profile_edit_form");?>">Profile</a>
              
        <?php } ?>

                    </div></li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-light"
				id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav" style="font-size:1.5em">
						<div class="sb-sidenav-menu-heading">Navigation</div>

						<a class="nav-link" href="<?php echo base_url();?>">
							<div class="sb-nav-link-icon">
								<i class="fas fa-car"></i>
							</div> Transport
						</a>    
						
						
						<a class="nav-link"
							href="<?php echo base_url("user/view_requests");?>">
							<div class="sb-nav-link-icon">
								<i class="fas fa-rocket"></i>
							</div> My Trips
						</a>
						
					 
					 
						<a class="nav-link" href="https://ngonyamalink.co.za/">
                                            							<div class="sb-nav-link-icon">
                                            								<i class="fa fa-angle-double-left"></i>
                                            							</div> Main Site
                        </a>
						
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
					 <?php   if (isset($udata['email'])){ echo $udata['email'];}?>
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>