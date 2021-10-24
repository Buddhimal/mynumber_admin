<style>
	#map {
		height: 600px;
		width: 100%;
	}
</style>

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<!--						--><?php //$this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Registered Clinic list</h4>
					</div>
				</div>
			</div>


			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<!-- /.card-header -->
								<div class="card-body">
									<table id="datatable-buttons"
										   class="table table-striped dt-responsive nowrap w-100">
										<thead>
										<tr>
											<th>Clinic Name</th>
											<th>Email</th>
											<th>Device mobile</th>
											<th>Website</th>
											<th>City</th>
											<th>Address</th>
											<th>District</th>
											<th>Province</th>
											<th>Location</th>
											<th>Active</th>
											<th>Verified</th>
											<th>Action</th>
											<th>Action2</th>
										</tr>
										</thead>
										<tbody>
										<?php foreach ($clinic_list->result() as $clinic) { ?>
											<tr>
												<td><?php echo $clinic->clinic_name ?></td>
												<td><?php echo $clinic->email ?></td>
												<td><?php echo $clinic->device_mobile ?></td>
												<td><?php echo $clinic->web ?></td>
												<td><?php echo $clinic->city ?></td>
												<td><?php echo $clinic->street_address . ' ' . $clinic->address_line_ii ?></td>
												<td><?php echo $clinic->district ?></td>
												<td><?php echo $clinic->province ?></td>
												<td>
													<button type="button" class="btn btn-primary"
															data-toggle="modal" data-target="#modal-xl"
															onclick='showMap(<?php echo $clinic->lat ?>,<?php echo $clinic->long ?>)'>
														<i class="fe-map-pin"></i> View
													</button>
												</td>

												<td><?php if ($clinic->is_active == 1) echo "<span class=\"badge badge-success\">Active</span>"; else echo "<span class=\"badge badge-danger \">Inactive</span>" ?></td>
												<td><?php if ($clinic->is_verified == 1) echo "<span class=\"badge badge-success \">Verified</span>"; else echo "<span class=\"badge badge-danger\">Unverified</span>" ?></td>
												<td> <span class="btn btn-sm btn-success verify"
														   data-clinic-id="<?php echo $clinic->clinic_id ?>">
													<i class="fas fa-check"></i>
												</span></td>
												<td>
													<a href="<?php echo base_url() ?>clinic/profile?clinic_id=<?php echo $clinic->clinic_id ?>"></a>
													<i class="fas fa-eye" style="color: cornflowerblue"></i>
												</td>
											</tr>
										<?php } ?>

										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
		</div>
		<!-- /.content-wrapper -->


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
	</div>
</div>

<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA0x8kVtO2UiwWqjPOltNeh5bfPjfmdfQ"></script>
<script>


	function showMap(lat, long) {
		initMap(lat, long)
	}


	$('.verify').on('click', function () {
		var clinic_id = $(this).data('clinic-id');
		Swal.fire({
			title: 'Do you want to verify this Clinic?',
			showCancelButton: true,
			confirmButtonText: 'Yes',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {

				return $.ajax({
					type: "GET",
					url: "<?php echo base_url() ?>clinic/verify?clinic_id=",
					data: {
						clinic_id: clinic_id
					},

					success: function (data) {
						return data;
					}
				});
			},
			allowOutsideClick: () => !Swal.isLoading()
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: `Clinic Verified Successfully!`
				})
				location.reload();
			}
		})

		// location.reload();

	})


	// Initialize and add the map
	function initMap(lat, long) {
		// The location of Uluru
		var uluru = {lng: long, lat: lat};
		// The map, centered at Uluru
		var map = new google.maps.Map(
				document.getElementById('map'), {zoom: 10, center: uluru});
		// The marker, positioned at Uluru
		var marker = new google.maps.Marker({position: uluru, map: map});
	}


</script>



