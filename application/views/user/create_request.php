<div>
	<?php
$this->load->view('alert');
?>
</div>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">Create request</h3>
				</div>
				<div class="card-body">
					<form action='<?php echo base_url("user/send_create_request")?>'
						method="POST">
						<div class="form-group">
							<label class="small mb-1" for="">Starting Point</label> <input
								class="form-control py-4" id="inputEmailAddress" type="text"
								placeholder="" name="starting_point" />
						</div>
						<div class="form-group">
							<label class="small mb-1" for="">Destination</label> <input
								class="form-control py-4" id="inputPassword" type="text"
								placeholder="" name="destination" />
						</div>

						<!-- 
                        <div class="form-group">
							<label class="small mb-1" for="">Trip Date</label> <input
								class="form-control py-4" id="" type="date"
								placeholder="Enter password" name="trip_date" />
						</div>
                        -->

						<div class="form-group">
							  <input
								class="form-control py-4" id="" type="hidden"
								placeholder="Enter password" name="transport_id"
								value="<?php echo $transport_id;?>" />
						</div>




						<div class="form-group">
							<label class="small mb-1" for="">Number Of Passengers</label> <select
								name="passengers" class="form-control">
						
<?php

for ($n = 1; $n < 50; $n ++) {

    echo "<option value='$n'> $n</option>";
}

?>


							</select>


						</div>




						<div class="form-group">
							<label class="small mb-1" for="">Trip Nature</label> <select
								name="trip_nature" class="form-control">
							<?php

    $tripnaturetypes = tripnaturetypes();

    foreach ($tripnaturetypes as $key => $value) {

        echo "<option value=$key>$value</option>";
    }

    ?>

							</select>


						</div>


						<div
							class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">


							<input type="submit" class="btn btn-primary" />
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>