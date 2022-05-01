
<br />
<div class="container-fluid">
 

	<div class="card mb-4">

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%"
					cellspacing="0">
					<thead>
						<tr>
							<th>Trip</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Trip</th>
						</tr>
					</tfoot>
					<tbody>
                                        
                                          <?php
                                        $tripnaturetypes = tripnaturetypes();
                                        $tripStatus = tripstatuses("admin");
                                        $cnt = 0;
                                        foreach ($trips as $trip) {
                                            $cnt = $cnt + 1;
                                            echo "<tr>";
                                            echo "<td> $trip[registration_number] $trip[starting_point] >>> $trip[destination] @ $trip[trip_date] <br/> Driver name : ".$trip['drivername']. " ". $trip['driversurname']."<br/>";
                                            echo "<b>". $tripStatus[$trip['trip_status']]."</b>";
                                            echo " | <a href=" . base_url('user/trip_edit_form/' . $trip['id']) . ">Edit</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }

                                        ?>
                                        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>






