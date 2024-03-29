<style>
	/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
	.content-wrapper {
		background: transparent !important;
	}

	#upload {
		opacity: 0;
	}

	#upload-label {
		position: absolute;
		top: 50%;
		left: 1rem;
		transform: translateY(-50%);
	}

	.image-area {
		border: 2px dashed rgba(255, 255, 255, 0.7);
		padding: 1rem;
		position: relative;
	}

	.image-area::before {
		content: 'Uploaded image result';
		color: #fff;
		font-weight: bold;
		text-transform: uppercase;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		font-size: 0.8rem;
		z-index: 1;
	}

	.image-area img {
		z-index: 2;
		position: relative;
	}

	/*
	*
	* ==========================================
	* FOR DEMO PURPOSES
	* ==========================================
	*
	*/
	body {
		min-height: 100vh;
		background-color: #757f9a;
		background-image: linear-gradient(147deg, #457fca 50%, #d7dde8 100%);
	}

	/*

</style>
<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container py-5">

			<!-- For demo purpose -->
			<header class="text-white text-center">
				<h1 class="display-4">Consultant image upload</h1>
				<p class="lead mb-0">Upload your banner image hear</p>
				<p class="lead mb-0">Image resolution 2400 x 600</p>
				<br>

				<img src="https://res.cloudinary.com/mhmd/image/upload/v1564991372/image_pxlho1.svg" alt="" width="150" class="mb-4">
			</header>

			<div class="row py-4">
				<div class="col-lg-6 mx-auto">

					<!-- Upload image input-->
					<div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
						<input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
						<label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
						<div class="input-group-append">
							<label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
						</div>
					</div>

					<!-- Uploaded image area-->
					<p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
					<div class="image-area mt-4">
						<img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

				</div>
			</div>

	</div>
	</div>
</div>


<script>

	/*  ==========================================
		SHOW UPLOADED IMAGE
	* ========================================== */
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#imageResult')
						.attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	$(function () {
		$('#upload').on('change', function () {
			readURL(input);
		});
	});

	/*  ==========================================
		SHOW UPLOADED IMAGE NAME
	* ========================================== */
	var input = document.getElementById('upload');
	var infoArea = document.getElementById('upload-label');

	input.addEventListener('change', showFileName);

	function showFileName(event) {
		var input = event.srcElement;
		var fileName = input.files[0].name;
		infoArea.textContent = 'File name: ' + fileName;
	}

</script>
