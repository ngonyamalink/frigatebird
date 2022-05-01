



<div>
<?php
$this->load->view('alert');
?>
</div>

<!-- Content section -->
<section class="py-5">
	<div class="container">
 

		<h3 align="center"><font color='red'>FRIGATE</font>BIRD</h3>




		<br />
		<div class="container-fluid">
			<div class="card mb-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="dataTable" width="100%"
							cellspacing="0">
							<thead>
								<tr>
									<th>Location</th>
									<th>Registration</th>
									<th>Operator</th>
									<th>Action</th>
								</tr>


							</thead>
							<tfoot>
								<tr>
									<th>Location</th>
									<th>Registration</th>
									<th>Operator</th>
									<th>Action</th>
							
							</tfoot>
							<tbody>
                   <?php

                $transportmode = alltransportmode();
                $cnt = 0;
                foreach ($transport as $t) {
                    $cnt = $cnt + 1;
                    echo "<tr>";

                    echo "<td>";
                    if (gettransportavailability($t['id']) == FALSE) {
                        echo '<i class="fa fa-map-marker" aria-hidden="true" style="font-size:170%; color:blue;"></i>';
                    } else {
                        echo '<i class="fas fa-spinner fa-spin" aria-hidden="true" style="font-size:170%; color:blue;"></i>';
                    }
                    echo "&nbsp;" . $t['area'];
                    echo "</td>";

                    echo "<td>";
                    echo "$t[registration_number]" . "&nbsp; (" . $t['transport_capacity'] . " seater)";
                    echo "</td>";

                    echo "<td>";
                    echo '<img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" class="rounded float-left" alt="..." width="25" height="25">' . "&nbsp;&nbsp; $t[firstname] $t[lastname]";
                    echo "</td>";

                    echo "<td>";
                    if (gettransportavailability($t['id']) == FALSE) {
                        echo "<a href=" . base_url('user/create_request/0/') . $t['id'] . "><i class='fas fa-rocket' style='font-size:170%; color:blue;'></i> </a>";
                    } else {

                        echo "&nbsp;&nbsp; - <i>Engaged</i>";
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