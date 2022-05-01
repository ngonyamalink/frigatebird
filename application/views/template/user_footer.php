

<br />
<div align="center">



	<a href="<?php echo base_url();?>">
		<button type="button" class="btn btn-info">Home</button>
	</a> | <a
		href="<?php
switch (ENVIRONMENT) {
    case 'development':
        echo "http://localhost:8888/ngonyamalinkwebsite/";
        break;
    default:
        echo "www.ngonyamalink.co.za/";
}
?>">
		<button type="button" class="btn btn-info">Back To Ngonyama Link</button>
	</a>

</div>
<br />
</main>
<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Frigate Bird <?php echo date("Y");?> - Powered
				By Ngonyama Link (Pty) Ltd</div>
			<div>
				<a href="<?php echo base_url("index.php/welcome/privacypolicy"); ?>">Privacy
					Policy</a> &middot; <a
					href="<?php echo base_url("index.php/welcome/termsandconditions"); ?>">Terms
					&amp; Conditions</a>
			</div>
		</div>
	</div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	crossorigin="anonymous"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
	crossorigin="anonymous"></script>
<script
	src="<?php echo base_url("resources/startbootstrap-sb-admin-gh-pages/dist/"); ?>js/scripts.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
	crossorigin="anonymous"></script>
<script
	src="<?php echo base_url("resources/startbootstrap-sb-admin-gh-pages/dist/"); ?>assets/demo/chart-area-demo.js"></script>
<script
	src="<?php echo base_url("resources/startbootstrap-sb-admin-gh-pages/dist/"); ?>assets/demo/chart-bar-demo.js"></script>
<script
	src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
	crossorigin="anonymous"></script>
<script
	src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
	crossorigin="anonymous"></script>
<script
	src="<?php echo base_url("resources/startbootstrap-sb-admin-gh-pages/dist/"); ?>assets/demo/datatables-demo.js"></script>
</body>
</html>