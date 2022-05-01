<div>
	<?php
$this->load->view('alert');
?>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-7">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">Driver Application
						Form</h3>
					<div align="center">
						<i>Pay R300 admin fee</i>
					</div>
				</div>
				<div class="card-body">
					<form
						action='<?php echo base_url("admin/send_driver_application")?>'
						method="POST">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="small mb-1" for="inputFirstName">First Name</label>
									<input class="form-control py-4" id="inputFirstName"
										type="text" name="firstname" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="small mb-1" for="inputLastName">Last Name</label>
									<input class="form-control py-4" id="inputLastName" type="text"
										name="lastname" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="small mb-1" for="inputEmailAddress">ID Doc</label>
							<input class="form-control" id="inputConfirmPassword" type="file"
								placeholder="Photo" name="userfile" />
						</div>
						<div class="form-group">
							<label class="small mb-1" for="inputEmailAddress">Licence Doc</label>
							<input class="form-control" id="inputConfirmPassword" type="file"
								placeholder="Photo" name="userfile1" />
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group"> 
									<label class="small mb-1" for="inputPassword">Mobile</label> <input
										class="form-control py-4" id="inputPassword" type="text"
										name="phone" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="small mb-1" for="inputConfirmPassword">Email</label>
									<input class="form-control py-4" id="inputConfirmPassword"
										type="email" name="email" />
								</div>
							</div>
						</div>
						<div class="form-group mt-4 mb-0">
							<input type="submit" class="btn btn-primary" />
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>
