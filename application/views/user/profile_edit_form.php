<div>
	<?php
	  $this->load->view('alert');
	?>
</div>


<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Profile</h3></div>
                                    <div class="card-body">
                                        <form action='<?php echo base_url("user/update_user_profile")?>'  method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" value="<?php echo $udata['firstname']; ?>"  name="firstname" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text"  value="<?php echo $udata['lastname']; ?>"  name="lastname"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp"  value="<?php echo $udata['email']; ?>"  name="email" readonly />
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0"> <input type="submit" class="btn btn-primary"/></div>
                                        </form>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
