<body class="sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
	<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="<?php echo base_url()?>dashboard" class="nav-link">Home</a>
			</li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge">0</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">0 Notifications</span>
					<div class="dropdown-divider"></div>

				</div>
			</li>

			<li class="nav-item dropdown user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo base_url()?>dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
					<span class="d-none d-md-inline"><?php echo $this->session->userdata('name'); ?></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<!-- User image -->
					<li class="user-header bg-primary">
						<img src="<?php echo base_url()?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

						<p>
							<?php echo $this->session->userdata('name'); ?>
							<small><?php echo $this->session->userdata('email'); ?></small>
						</p>
					</li>
					<!-- Menu Body -->

					<!-- Menu Footer-->
					<li class="user-footer" style="text-align: center">
						<a href="<?php echo base_url('welcome/logout'); ?>" class="btn btn-danger" ><i class="fa fa-power-off"></i>&nbsp;&nbsp; Sign out</a>
					</li>
				</ul>
			</li>

		</ul>
	</nav>
