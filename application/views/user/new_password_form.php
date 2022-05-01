

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">New Password</h3>
				</div>
				<div class="card-body">
					<div class="small mb-3 text-muted">Enter your email address and we
						will send you a link to reset your password.</div>
					<form action="<?php echo base_url("user/submit_new_password")?>"
						method="POST">

						<input 
								class="form-control py-4" id="inputEmailAddress" name="resetpassword_hash" type="hidden"
								 value="<?php echo $resetpassword_hash; ?>" />
								
								
								
								
						<div class="form-group">
							<label class="small mb-1" for="inputEmailAddress">Password</label>
							
							 <input 
								class="form-control py-4" id="inputEmailAddress" name="password" type="password"
								aria-describedby="emailHelp" placeholder="Enter new password" />
						</div>
						<div
							class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
							<a class="small"
								href="<?php echo base_url("index.php/user/login_form")?>">Return
								to login</a> <input type="submit" class="btn btn-primary"/>
						</div>
					</form>
				</div>
				<div class="card-footer text-center">
					<div class="small">
						<a
							href="<?php echo base_url("user/registration_form")?>">Need
							an account? Sign up!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>