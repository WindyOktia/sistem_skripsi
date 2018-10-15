<head>
	<script type="text/javascript">
		$("form").on('submit', 
			function(e) {
				e.preventDefault();
				var form = $(this)
				var formData = false;
				if (window.FormData) {
					formdata = new FormData(form[0])
				}

				var formAction = form.attr('action');

				$.ajax({
					url: formAction,
					type: 'POST',
					cache:false,
					contentType:false,
					processData:false,
					dataType: 'json',
					data: formdata ? formdata: form.serialize(),
					beforeSend: function () {
						$('.loading').fadeIn();
					},
					success: function (result) {
						swal(result.head, result.isi);

						if (result.sukses != 0) {
							$('#tabel'+result.ID).load('<?= base_url('')?>'+result.func);
						}

						$(".loading").fadeOut();

					}
				})

			});
		</script>
	</head>
	<div class="modal-body">
		<div id="loading" class="modal loading" style="display:none;">
			<div class="modal-dialog modal-dialog-centered ">
				<div class="alert alert-info alert-white rounded modal-content">
					<strong> <i class="fas fa-spinner fa-pulse"> </i> Sedang Memproses </strong>
				</div>
			</div>
		</div>
	</div>