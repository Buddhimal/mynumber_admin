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

							<?php if($is_valid_admin) { ?>
							<form>
								<div class="form-item">
									<label>Password</label>
									<input type="password" name="manager_password" value="" />
								</div>

								<input type="submit" name="Reset" />

							</form>
							<?php }else{ ?>
								<div>
									Please choose a manager to reset the password. 
								</div>
							<?php }//endif; ?>
					
						</div> <!-- end card-body-->
					</div> <!-- end card-->
				</div> <!-- end col-->
			</div>
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->

</div><!-- content-page -->