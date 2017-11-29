<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sistema Recaudo | Pagina Principal</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/bootstrap.css')?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin.css')?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css')?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css')?>" />
		
		

	</head>
	<body class="menubar-hoverable header-fixed menubar-pin ">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="../../html/dashboards/dashboard.html">
									<span class="text-lg text-bold text-primary">SISTEMA RECAUDO</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="../../assets/img/avatar1.jpg?1403934956" alt="" />
								<span class="profile-info">
									Sebastian Farias
									<small>Administrator</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Config</li>
								<li><a href="../../html/pages/profile.html">My profile</a></li>
								<!-- divider -->
								<li class="divider"></li>
								<!-- end divider -->
								<li><a href="../../html/pages/login.html"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					
					<div class="section-body contain-lg">

						<!-- BEGIN INTRO -->
						<div class="row">
							<div class="col-lg-12">
								<h1 class="text-primary">Bienvenido</h1>
							</div><!--end .col -->
							
						</div><!--end .row -->
						<!-- END INTRO -->

						<!-- BEGIN WELCOME -->
						<div class="row">
							<div class="col-lg-12">
								<h2 class="text-primary">Usted esta logueado como: Sebastian Farias.</h2>
							</div>
						</div><!--end .row -->
						<!-- END WELCOME -->

						<br>

						

						<hr class="ruler-xxl"/>

						

						
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">Sistema de Recaudo</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="../html/pagina_principal.html" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Pagina Principal</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-email"></i></div>
								<span class="title">Email</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="../../html/mail/compose.html" ><span class="title">Crear Nuevo <br>Mensaje</span></a></li>
								<li><a href="../../html/mail/message.html" ><span class="title">Ver Mensajes Enviados</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="../../html/layouts/builder.html" >
								<div class="gui-icon"><i class="md md-web"></i></div>
								<span class="title">Administración de <br> archivos</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN UI -->
						

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->


				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->



		</div><!--end #base-->
		<!-- END BASE -->
<script src="<?= base_url() ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- BEGIN JAVASCRIPT -->
		<script src="<? base_url()?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="<? base_url()?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js" ></script>
		<script src="<? base_url()?>assets/js/libs/bootstrap/bootstrap.min.js" ></script>
		<script src="<? base_url()?>assets/js/libs/spin.js/spin.min.js" ></script>
		<script src="<? base_url()?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="<? base_url()?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="<? base_url()?>assets/js/core/source/App.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppNavigation.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppOffcanvas.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppCard.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppForm.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppNavSearch.js"></script>
		<script src="<? base_url()?>assets/js/core/source/AppVendor.js"></script>
		<script src="<? base_url()?>assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
