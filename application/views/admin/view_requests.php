
<br />
<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header"></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%"
					cellspacing="0">
					<thead>
						<tr>
							<th>Reg</th>
							<th>Route</th>
							<th>Trip Date</th>
							<th>Edit</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Reg</th>
							<th>Route</th>
							<th>Trip Date</th>
							<th>Edit</th>
							<th></th>
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
    echo "<td> $trip[registration_number] </td>";
    echo "<td> $trip[starting_point]  >>> $trip[destination]";
    echo $trip['trip_nature'] == "1" ? ">>>" : "<<<>>>";

    echo " : " . $tripStatus[$trip['trip_status']];

    echo "</td>";
    echo "<td> $trip[trip_date] </td>";
    echo "<td><a href=" . base_url('admin/trip_edit_form/' . $trip['id']) . ">View/Edit</a> </td>";

    echo "<td>";
    if ($trip['trip_status'] == 2) {
     

        if ($trip['trip_started_ended'] == NULL) {
            echo "<a href=" . base_url("admin/start_end_trip/$trip[id]/$trip[transport_id]/Started") . ">Start</a>";
        } else if ($trip['trip_started_ended'] == "Started") {
            echo "<a href=" . base_url("admin/start_end_trip/$trip[id]/$trip[transport_id]/Ended") . ">End</a>";
            
        } else if ($trip['trip_started_ended'] == "Ended") {
            echo "Ended";
        }

       
    }else {
        echo "...";
    }
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