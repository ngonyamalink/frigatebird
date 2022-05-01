
<br />
<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header">
		 
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%"
					cellspacing="0">
					<thead>
						<tr>
							<th>Reg No</th>
					 

						</tr>
					</thead>
					<tfoot>
						<tr>

							<th>Reg No</th>
					 
				 
						</tr>
					</tfoot>
					<tbody>
<?php
$transportmode = alltransportmode();

$cnt = 0;

foreach ($transport as $t) {
    $cnt = $cnt + 1;
    echo "<tr>";
    echo "<td> $t[registration_number] - $t[area] <br/> <a href=" . base_url('admin/edit_transport_form/' . $t['id']) . ">Edit</a> </td>";
    echo "</tr>";
}

?> 
                                        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>