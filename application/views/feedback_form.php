
<div>
	<?php
	  $this->load->view('alert');
	?>
</div>



    <br/>
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!------ Include the above in your HEAD tag ---------->
                
                <div class="container">
                <h4 align="center">FEEDBACK </h4>
                <br/>
                <div class="row">
                  <div class="col-md-12">
                  <form
						action='<?php echo base_url("welcome/submit_feedback")?>'
						method="POST">
                        <input class="form-control"   placeholder="Subject"  name="subject"/><br />
                        <input class="form-control"   placeholder="Full Names"  name="fullnames"/><br />
                        <input class="form-control"   placeholder="Phone" name="phone"/><br />
                        <input class="form-control"   placeholder="E-mail"  name="email"/><br />
                        <textarea class="form-control"  placeholder="Please start tying your message here ..." style="height:150px;" name="message"> </textarea><br />
                        <input type="submit" class="btn btn-primary" />
                    </form>
                  </div>
                </div>
                
                </div>
          