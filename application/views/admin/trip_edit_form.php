<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-5">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-4">Trip Edit Form</h3>
				</div>
				<div class="card-body">
					<form
						action='<?php echo base_url("admin/update_trip")?>'
						method="POST">



						<div class="form-group">
							<label class="small mb-1" for="">Trip Status</label> <select
								name="trip_status" class="form-control">
								
								<?php

        foreach (tripstatuses("admin") as $key => $value) {

            if ($trip['trip_status'] == $key) {
                echo "<option value='$key' selected>$value</option>";
            } else {
                echo "<option value='$key'>$value</option>";
            }
        }

        ?>
								
							</select>


						</div>

						<input class="form-control py-4" id="inputEmailAddress"
							type="hidden" placeholder="" name="id"
							value="<?php echo $trip['id']; ?>" />


						<div class="form-group">
							<label class="small mb-1" for="">Starting Point</label> <input
								class="form-control py-4" id="inputEmailAddress" type="text"
								placeholder="" name="starting_point"
								value="<?php echo $trip['starting_point']; ?>" />
						</div>
						<div class="form-group">
							<label class="small mb-1" for="">Destination</label> <input
								class="form-control py-4" id="inputPassword" type="text"
								placeholder="" name="destination"
								value="<?php echo $trip['destination']; ?>" />
						</div>


						<div class="form-group">
							<label class="small mb-1" for="">Trip Date</label> <input
								class="form-control py-4" id="" type="text"
								placeholder="Enter password" name="trip_date"
								value="<?php echo $trip['trip_date']; ?>"  readonly/>
						</div>


						<div class="form-group">
							<label class="small mb-1" for="">Number Of Passengers</label> <select
								name="passengers" class="form-control"
								value="<?php echo $trip['passengers']; ?>">
							


<?php

for ($n = 1; $n < 50; $n ++) {

    if ($n == $trip['passengers']) {

        echo "<option value='$n' selected> $n</option>";
    } else {

        echo "<option value='$n'> $n</option>";
    }
}

?>

							</select>


						</div>




						<div class="form-group">
							<label class="small mb-1" for="">Trip Nature</label> <select
								name="trip_nature"
								value="<?php echo $trip['starting_point']; ?>"
								class="form-control">
								


<?php

$tripnaturetypes = tripnaturetypes();

foreach ($tripnaturetypes as $key => $value) {

    if ($trip['trip_nature'] == $key) {
        echo "<option value=$key selected>$value</option>";
    } else {
        echo "<option value=$key>$value</option>";
    }
}

?>


							</select>


						</div>


						<div
							class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">


							<input type="submit" class="btn btn-primary" value="Done Viewing / Editing"/>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>