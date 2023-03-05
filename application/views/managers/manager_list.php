<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<?php $this->load->view('template/breadcrumb') ?>
						<h4 class="page-title">Manager List</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-sm-4">
									<h4 class="header-title">Managers</h4>
								</div>
								<div class="col-sm-8">
									<div class="text-sm-right">
										<a href="<?php echo base_url(); ?>/manager/new"  class="btn btn-primary waves-effect waves-light mb-2">Add Manager</a>
									</div>
								</div><!-- end col-->
							</div>


							<?php $this->load->view('template/alert_message')?>
							<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
								<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>NIC</th>
									<th>Email Verified</th>
									<th>Action</th>
								</tr>
								</thead>


								<tbody>
									<?php  foreach($managers->result() as $manager) :?>
										<tr>
											<td><?php echo sprintf("%s %s",$manager->first_name, $manager->last_name); ?></td>
											<td><?php echo $manager->email; ?></td>
											<td><?php echo $manager->phone ?></td>
											<td><?php echo $manager->address ?></td>
											<td><?php echo $manager->nic; ?></td>
											<td><?php echo $manager->has_email_verified ? "Yes" : "No"; ?></td>
											<td align="right">
												<a class="btn btn-sm btn-warning" href="<?php echo trim(base_url(), '/'); ?>/manager/update/<?php echo $manager->id; ?>">Edit</a>
												<a class="btn btn-sm btn-danger" href="<?php echo trim(base_url(), '/'); ?>/manager/delete/<?php echo $manager->id; ?>">Delete</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div> <!-- end card body-->
					</div> <!-- end card -->
				</div><!-- end col-->
			</div>
			<!-- end row-->
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->

	<div class="modal fade" id="modal_patient" tabindex="-1" role="dialog"
		 aria-labelledby="scrollableModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="scrollableModalTitle">Patient Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" class="parsley-examples" action="<?php echo base_url()?>doctor/update" method="post">
							<input type="hidden" value="" readonly id="doctor_id" name="doctor_id">
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
							<label for="address" class="col-4 col-form-label">Registration No<span
										class="text-danger">*</span></label>
							<div class="col-7">
								<input type="text" required parsley-type="text"
									   class="form-control"
									   id="registration_no" name="registration_no"
									   placeholder="Registration No">
							</div>
						</div>
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

						<div class="form-group row">
							<label for="address" class="col-4 col-form-label">Speciality<span
										class="text-danger">*</span></label>
							<div class="col-7">
								<select class="form-control select2-multiple" data-toggle="select2"
										multiple="multiple" name="speciality[]" id="speciality" data-placeholder="Choose ..." required>

									<option value="1">FAMILY PHYSICIANS</option>
									<option value="2">INTERNISTS</option>
									<option value="3">EMERGENCY PHYSICIANS</option>
									<option value="4">PSYCHIATRISTS</option>
									<option value="5">OBSTETRICIANS AND GYNECOLOGISTS</option>
									<option value="6">NEUROLOGISTS</option>
									<option value="7">RADIOLOGISTS</option>
									<option value="8">ANESTHESIOLOGISTS</option>
									<option value="9">PEDIATRICIANS</option>
									<option value="10">CARDIOLOGISTS</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="other_comment" class="col-4 col-form-label">Other
								comments<span
										class="text-danger">*</span></label>
							<div class="col-7">
								<input type="text" required parsley-type="text"
									   class="form-control"
									   id="other_comment" name="other_comment"
									   placeholder="Other Comment">
							</div>
						</div>
						<div class="form-group row  float-right">
							<div class="col-12">
								<button type="submit" class="btn btn-primary waves-effect waves-light">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
