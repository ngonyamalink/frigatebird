<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-5">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">Add Transport</h3>
				</div>
				<div class="card-body">
					<form
						action='<?php echo base_url("admin/send_create_transport")?>'
						method="POST">
						<div class="form-group">
							<label class="small mb-1" for="">Registration Number</label> <input
								class="form-control py-4" id="inputEmailAddress" type="text"
								placeholder="" name="registration_number" />
						</div>

						<div class="form-group">
							<label class="small mb-1" for="">VIN Number</label> <input
								class="form-control py-4" id="inputEmailAddress" type="text"
								placeholder="" name="vin_number" />
						</div>

						<div class="form-group">
							<label class="small mb-1" for="">Transport Mode</label> <select
								name="transport_mode" class="form-control">
							
							
							
							
							
    											<?php

            foreach (alltransportmode() as $key => $value) {

                echo "<option value=$key> $value</option>";
            }

            ?>
    							
    			
							</select>


						</div>

<div class="form-group">
							<label class="small mb-1" for="">Area</label> <input
								class="form-control py-4" id="inputEmailAddress" type="text"
								placeholder="" name="area" />
						</div>


						<div class="form-group">
							<label class="small mb-1" for="">Capacity</label> <select
								name="transport_capacity" class="form-control">
							<?php

    for ($n = 1; $n < 50; $n ++) {

        echo "<option value='$n'> $n</option>";
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