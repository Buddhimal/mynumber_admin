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
                        <h1 class="m-0 text-dark">Clinics</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clinic list</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Registered Clinic list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tbl_clinic_list" class="table table-bordered table-striped">
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
                                            <td><button type="button" class="btn btn-primary show-map" data-toggle="modal" data-target="#modal-xl" data-long="<?php echo $clinic->long ?>" data-lat="<?php echo $clinic->lat ?>">
													<span class="oi oi-map-marker"></span>View
												</button></td>
											<td><?php if($clinic->is_active==1) echo "<span class=\"badge bg-success\">Active</span>"; else echo "<span class=\"badge bg-danger \">Inactive</span>"?></td>
                                            <td><?php if($clinic->is_verified==1) echo "<span class=\"badge bg-success \">Verified</span>"; else echo "<span class=\"badge bg-danger\">Unverified</span>"?></td>
											<td> <span class="btn btn-sm btn-success verify" data-clinic-id="<?php echo $clinic->clinic_id ?>">
													<i class="fas fa-check"></i>
												</span></td>
											<td> <a href="<?php echo base_url()?>clinic/profile?clinic_id=<?php echo $clinic->clinic_id ?>" <i class="fas fa-eye" style="color: cornflowerblue"></i> </td>
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

	<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA0x8kVtO2UiwWqjPOltNeh5bfPjfmdfQ&callback=initMap">	</script>
    <script>
        $(function () {
            $("#tbl_clinic_list").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });


		$('.show-map').on('click', function () {
			var lat = $(this).data('lat');
			var long = $(this).data('long');

			initMap(lat,long)

		})


		$('.verify').on('click', function () {
			var clinic_id = $(this).data('clinic-id');
			Swal.fire({
				title: 'Do you want to verify this Clinic?',
				// input: 'text',
				// inputAttributes: {
				// 	autocapitalize: 'off'
				// },
				showCancelButton: true,
				confirmButtonText: 'Yes',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {

					return $.ajax({
						type: "GET",
						url: "<?php echo base_url() ?>clinic/verify?clinic_id=",
						data:{
							clinic_id: clinic_id
						},

						success: function(data)
						{
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
		function initMap(lat,long) {
			// The location of Uluru
			var uluru = {lng: long, lat: lat};
			// The map, centered at Uluru
			var map = new google.maps.Map(
					document.getElementById('map'), {zoom: 10, center: uluru});
			// The marker, positioned at Uluru
			var marker = new google.maps.Marker({position: uluru, map: map});
		}



	</script>



