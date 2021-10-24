<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">New Manager</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<form role="form" class="parsley-examples" action="<?php echo base_url() ?>manager/save"
								  method="post">
								<h4 class="header-title m-t-0">Manager Details</h4>
								<?php $this->load->view('template/alert_message') ?>
								<div class="card-box">
									<div class="row">
										<div class="col-lg-6">

											<div class="form-group row">
												<label for="salutation" class="col-4 col-form-label">Salutation<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<select class="form-control select2-multiple" data-toggle="select2"
															name="salutation" id="salutation"
															data-placeholder="Choose ..." required>
														<option value="">Chose</option>
														<option value="Mr">Mr</option>
														<option value="Mrs">Mrs</option>
														<option value="Ms">Ms</option>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="first_name" class="col-4 col-form-label">First Name<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="text" required parsley-type="text"
														   class="form-control"
														   id="first_name" name="first_name" placeholder="First Name">
												</div>
											</div>

											<div class="form-group row">
												<label for="last_name" class="col-4 col-form-label">Last Name<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="text" required parsley-type="text"
														   class="form-control"
														   id="last_name" name="last_name" placeholder="Last Name">
												</div>
											</div>

											<div class="form-group row">
												<label for="address" class="col-4 col-form-label">NIC No<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="text" required parsley-type="text"
														   class="form-control"
														   id="nic" name="nic"
														   placeholder="NIC No">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label for="address" class="col-4 col-form-label">Address<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="text" required parsley-type="text"
														   class="form-control"
														   id="address" name="address" placeholder="Address">
												</div>
											</div>
											<div class="form-group row">
												<label for="phone_1" class="col-4 col-form-label">Phone<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="number" minlength="10" maxlength="10" required
														   parsley-type="number"
														   class="form-control"
														   id="phone" name="phone" placeholder="Phone">
												</div>
											</div>
											<div class="form-group row">
												<label for="phone_1" class="col-4 col-form-label">Email<span
															class="text-danger">*</span></label>
												<div class="col-7">
													<input type="email" required
														   parsley-type="email"
														   class="form-control"
														   id="email" name="email" placeholder="Email">
												</div>
											</div>

										</div> <!-- end col -->
									</div>
									<!-- end card-box -->
								</div>
								<div class="row">
									<div class="col-12">
										<h4 class="header-title">File Upload</h4>
										<div class="row">
											<div class="col-lg-4">
												<div class="mt-3">
													<input type="file" data-plugins="dropify" required data-allowed-file-extensions='["pdf", "jpg", "png", "jpeg"]'/>
													<p class="text-muted text-center mt-2 mb-0">NIC Front Side</p>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="mt-3">
													<input type="file" data-plugins="dropify" required data-allowed-file-extensions='["pdf", "jpg", "png", "jpeg"]'/>
													<p class="text-muted text-center mt-2 mb-0">NIC Back Side</p>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="mt-3">
													<input type="file" data-plugins="dropify" required data-allowed-file-extensions='["pdf", "jpg", "png", "jpeg"]'/>
													<p class="text-muted text-center mt-2 mb-0">Agreement</p>
												</div>
											</div>
										</div> <!-- end row -->
									</div><!-- end col -->
								</div>
								<br>
								<br>
								<div class="form-group row  float-right">
									<div class="col-12">
										<button type="submit" class="btn btn-primary waves-effect waves-light">
											Save
										</button>
									</div>
								</div>
							</form>


						</div> <!-- end card-body-->
					</div> <!-- end card-->
				</div> <!-- end col-->
			</div>
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->

