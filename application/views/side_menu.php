<!-- Main Sidebar Container -->

<?php

if (!isset($active_main_tab))
	$active_main_tab = '';
?>

<aside class="main-sidebar sidebar-dark-danger elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?php echo base_url() ?>dist/img/mn-logo.png" alt="AdminLTE Logo" class="brand-image elevation-3"
			 style="">
		<span class="brand-text font-weight-light">MyNumber</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
				data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

				<li class="nav-item has-treeview ">
					<a href="<?php echo base_url() ?>dashboard"
					   class="nav-link <?php if ($active_tab == 'Dashboard') echo "active" ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview <?php if ($active_main_tab == 'Clinics') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'Clinics') echo "active" ?>">
						<i class="nav-icon fas fa-building"></i>
						<p>
							Clinics
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>clinics"
							   class="nav-link <?php if ($active_tab == 'clinic_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Clinic List</p>
							</a>
						</li>

					</ul>
				</li>

				<li class="nav-item has-treeview <?php if ($active_main_tab == 'update_image') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'update_image') echo "active" ?>">
						<i class="nav-icon fas fa-image"></i>
						<p>
							Update Image
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>image/consultant"
							   class="nav-link <?php if ($active_tab == 'consultant_image') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Consultant App</p>
							</a>
						</li>

					</ul>
					<ul class="nav nav-treeview ">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>image/patient"
							   class="nav-link <?php if ($active_tab == 'patient_image') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Patient App</p>
							</a>
						</li>

					</ul>
				</li>


				<li class="nav-item has-treeview <?php if ($active_main_tab == 'Administration') echo "menu-open" ?> ">
					<a href="#" class="nav-link <?php if ($active_main_tab == 'Administration') echo "active" ?>">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							Administration
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview ">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>user/user"
							   class="nav-link <?php if ($active_tab == 'user_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>user/user/user_group_list"
							   class="nav-link <?php if ($active_tab == 'group_list') echo "active" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>User Groups</p>
							</a>
						</li>
					</ul>
				</li>


			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
<body class="hold-transition sidebar-mini layout-fixed">
