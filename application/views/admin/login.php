<!DOCTYPE html>
<html class="bg-navy">
    <head>
        <meta charset="UTF-8">
        <title>Siatex DIGILIB</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Siatex Management Mutu" />
        <meta name="keywords" content="Siatex Management Mutu" />
        <meta name="author" content="Seven Media Technology" />
        <meta name="copyright" content="Seven Media Technology" />

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/javascript/jquery-1.11.3.js"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/javascript/app.js" type="text/javascript"></script>
    </head>
    <body class="skin-blue">
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box ">
                    <br>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <h3>SIATEX DIGILIB</h3>
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <?php if ($this->session->flashdata('success')): ?>
                		<div class="alert alert-success alert-dismissible">
    	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	                    <?php echo $this->session->flashdata('success'); ?>
    	                  </div>
        		<?php   endif;
                       	echo form_open('Login/get_login');
                        ?>
                        <div >
                            <div class="form-group">
                                <input type="text" name="nmapg_pgw" class="form-control" placeholder="nama" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="paspw_pgw" class="form-control" placeholder="Password" required=""/>
                            </div>
                            <?php
							$info = $this->session->flashdata('info');
							if(!empty($info))
							{
								echo $info;
							} ?>
                        </div>
                        <button type="submit" class="btn btn-login">Login</button>  
                        <div class="login-links">
                            <a href="#">Forgot password?</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
</html>