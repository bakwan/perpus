<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> SIATEX - DIGILIB</title>
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
    <script src="<?php echo base_url(); ?>assets/javascript/jquery.canvasjs.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/javascript/bootstrap-datepicker.js"></script>
	<link href="<?php echo base_url();  ?>assets/css/datepicker.css" rel="stylesheet">
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>assets/javascript/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script>
    			$(function(){
                        $("#tanggal1").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        
                        $("#tanggal2").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        
                        $("#tanggal").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        $("#pinjam").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        $("#kembali").datepicker({
                            format:'yyyy-mm-dd'
                        });
                        $("#buku").datepicker({
                            format:'yyyy-mm-dd'
                        });
                    })
                $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
        </script>
</head>
<body class="skin-blue">        
        <header class="header">
            <a href="<?php echo base_url('admin/dashboard')?>" class="logo"> DIGILIB </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo '' .$this->session->userdata('nmapg_pgw');?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('nmapg_pgw');?>
                                        <small><?php echo $this->session->userdata('usrpw_pgw');?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <?php
                                        echo anchor('Login/logout','Logout',array('class'=>'btn btn-default btn-flat'));
                                        ?>
                      
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('nmapg_pgw');?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <?php
                        $main=$this->db->get_where('tabel_menu_admin',array('parent'=>0))->result();
                        foreach ($main as $m ){
                            // chek ada submenu atau tidak
                            $sub=$this->db->get_where('tabel_menu_admin',array('parent'=>$m->menu_id));
                            if($sub->num_rows()>0){
                                // looping submenu
                                echo "<li class='treeview'>";
                                echo anchor('#',' <i class="fa '.$m->icon.'"></i><span>'.strtoupper($m->nama_menu).' <i class="fa fa-angle-left pull-right"></i>');
                                echo "<ul class='treeview-menu'>";
                                foreach ($sub->result() as $s){
                                    echo '<li>'.anchor('admin/'.$s->link,' <i class="fa '.$s->icon.'"></i> '.strtoupper($s->nama_menu)).'</li>'; 
                                }
                                echo "</ul>";
                                echo "</li>";
                            }else{
                                echo '<li>'.anchor('admin/'.$m->link,' <i class="fa '.$m->icon.'"></i> '.strtoupper($m->nama_menu)).'</li>';
                            }
                        }?>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Selamat Datang
                        <small style="font-size: 15px">Di Sistem Informasi Perpustakaan</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php echo $contents ;?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
    </body>
    <script src="<?php echo base_url()?>assets/javascript/ckeditor.js"></Script>
    <script>
			CKEDITOR.replace( 'editor1' );

		</script>

</html>
