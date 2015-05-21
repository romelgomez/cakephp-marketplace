<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Verify email address</h3>
				</div>
				<div class="panel-body">

					<?php
						if($data['status'] === 'success'){
							echo '<div class="alert alert-success" role="alert">Done, now try to login.</div>';
						}else{
							switch ($data['message']) {
								case "user-not-exist":
									echo '<div class="alert alert-danger" role="alert">This request is invalid.</div>';
									break;
								case "already-verified":
									echo '<div class="alert alert-info" role="alert">This account is already verified. Try to login.</div>';
									break;
								case "this-link-is-invalid":
									echo '<div class="alert alert-warning" role="alert">This link is expired or is invalid.</div>';
									break;
								case "cannot-set-new-parameter":
									echo '<div class="alert alert-warning" role="alert">An unexpected error occurred</div>';
									break;
								default:
									echo '<div class="alert alert-warning" role="alert">An unexpected error occurred</div>';
							}
						}
					?>

				</div>
			</div>

		</div>
	</div>
</div>