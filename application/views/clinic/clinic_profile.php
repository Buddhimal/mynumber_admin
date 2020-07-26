<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA0x8kVtO2UiwWqjPOltNeh5bfPjfmdfQ&callback=initMap">	</script>
<style>
	#map {
		height: 600px;
		width: 100%;
	}
</style>
<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark">Clinic Profile</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php
								echo base_url() ?>clinic">Home</a></li>
							<li class="breadcrumb-item active">Clinic Profile</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">

						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-fluid img-circle"
										 src="<?php echo base_url()?>dist/img/clinic_default_icon.webp" alt="User profile picture">
								</div>

								<h3 class="profile-username text-center"><?php echo $clinic->clinic_name ?> </h3>

								<p class="text-muted text-center"><?php echo $location->city?> </p>

								<p class="text-muted text-center"><span class="badge bg-success">Active</span> </p>

								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>Consultants</b> <a class="float-right">1,322</a>
									</li>
									<li class="list-group-item">
										<b>Sessions</b> <a class="float-right">543</a>
									</li>
									<li class="list-group-item">
										<b>Appointments</b> <a class="float-right">13,287</a>
									</li>
								</ul>

								<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!-- About Me Box -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">About Clinic</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<strong><i class="fas fa-location-arrow mr-1"></i> Address</strong>

								<p class="text-muted">
									<?php echo $location->street_address.', '.$location->city ?>
								</p>

								<hr>

								<strong><i class="fa fa-mail-bulk mr-1"></i> Email</strong>

								<p class="text-muted"><?php echo $clinic->email ?></p>

								<hr>

								<strong><i class="fab fa-internet-explorer"></i> Website</strong>

								<p class="text-muted"><?php echo $clinic->web ?></p>

								<hr>

								<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
								<p class="text-muted">
									<br>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl">
										<span class="oi oi-map-marker"></span>View on Map
									</button>
								</p>


								<hr>

								<strong><i class="fas fa-phone-alt mr-1"></i> Contact Number</strong>

								<p class="text-muted">
									<?php echo $clinic->device_mobile ?>
								</p>

								<hr>

								<strong><i class="far fa-file-alt mr-1"></i> Description</strong>

								<p class="text-muted"></p>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="card">
							<div class="card-header p-2">
								<ul class="nav nav-pills">
									<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
									<li class="nav-item"><a class="nav-link" href="#activity"
															data-toggle="tab">Activity</a></li>
									<li class="nav-item"><a class="nav-link" href="#timeline"
															data-toggle="tab">Timeline</a></li>
									</li>
								</ul>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="tab-content">
									<div class="tab-pane active" id="settings">
										<form class="form-horizontal">
											<div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Clinic Name</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" id="inputName"
														   placeholder="Name" value="<?php echo $clinic->clinic_name?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" id="inputEmail"
														   placeholder="Email" value="<?php echo $clinic->email?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputName2" class="col-sm-2 col-form-label">Contact Number</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputName2"
														   placeholder="Name" value="<?php echo $clinic->device_mobile?>" readonly>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputExperience"
													   class="col-sm-2 col-form-label">Experience</label>
												<div class="col-sm-10">
													<textarea class="form-control" id="inputExperience"
															  placeholder="Experience"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputSkills"
														   placeholder="Skills">
												</div>
											</div>
											<div class="form-group row">
												<div class="offset-sm-2 col-sm-10">
													<div class="checkbox">
														<label>
															<input type="checkbox"> I agree to the <a href="#">terms and
																conditions</a>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="offset-sm-2 col-sm-10">
													<button type="submit" class="btn btn-danger">Submit</button>
												</div>
											</div>
										</form>
									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div><!-- /.card-body -->
						</div>
						<!-- /.nav-tabs-custom -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</section>
	</div>
</div>

<div class="modal fade" id="modal-xl">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Clinic Location</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="map"></div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
	// Initialize and add the map
	function initMap() {
		// The location of Uluru
		var uluru = {lng: <?php echo $location->long?>, lat: <?php echo $location->lat?>};
		// The map, centered at Uluru
		var map = new google.maps.Map(
				document.getElementById('map'), {zoom: 10, center: uluru});
		// The marker, positioned at Uluru
		var marker = new google.maps.Marker({position: uluru, map: map});
	}
</script>
