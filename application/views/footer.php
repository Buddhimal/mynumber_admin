<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="modal fade" id="loading_modal" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<div class="spinner-grow avatar-lg text-secondary m-2" role="status"></div>
				<div class="row">
					<div class="col-md-12">
						<span style="text-align: center">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer Start -->
<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<script>
					document.write(new Date().getFullYear())
				</script> &copy; Evermed System
			</div>

		</div>
	</div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>
<!-- Plugin js-->
<script src="<?php echo base_url()?>assets/libs/parsleyjs/parsley.min.js"></script>

<!-- Validation init js-->
<script src="<?php echo base_url()?>assets/js/pages/form-validation.init.js"></script>

<!-- Plugins js-->
<script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- App js-->
<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

<!-- Sweet Alerts js -->
<!--<script src="--><?php //echo base_url(); ?><!--assets/libs/sweetalert2/sweetalert2.min.js"></script>-->


<!-- third party js -->
<script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--assets/libs/footable/footable.all.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/pages/foo-tables.init.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/pages/datatables.init.js"></script>
<!-- third party js ends -->

<script src="<?php echo base_url(); ?>assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/select2/js/select2.min.js"></script>

<!-- Init js-->
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

</body>

</html>
