<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                

                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Driver Login</h3></div>
                                    <div class="card-body">
                                        <form  action="<?php echo base_url("admin/login_auth")?>" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                              
                                                 <input type="submit" class="btn btn-primary"/>
                                            </div>
                                        </form>
                                    </div>
                                       <div class="card-footer text-center">
                                        <div class="small"><a href="<?php echo base_url("admin/driver_application_form")?>">Don't have an account? Complete driver application form.</a></div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
