<!doctype html>
    <html>
        <head>
            <title>Perpustakaan</title>
            <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('assets_/js/jquery.min.js');?>"></script>
            <script src="<?php echo base_url('assets/javascript/bootstrap.js');?>"></script>
        <script>
        	
        </script>
        </head>
        <body>
            <!--<img src="<?php echo base_url('assets/img/3.jpg');?>" height="140px" width="100%">-->
            <!-- Static navbar -->
            <div class="navbar navbar-default">
                <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('Home');?>">Perpustakaan</a>
                </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <h4>Selamat Datang di Aplikasi Perpusatakaan</h4>
                    </div>
                </div></br>
                <form class="form-horizontal" action="<?php echo site_url('Home/cari_buku');?>" method="post">
	              <div class="form-group">
	                <label for="inputPassword" class="col-sm-2 control-label"></label>
	                <div class="col-sm-6">
	                  <input type="text" id="cari" name="cari" class="form-control" placeholder="masukan judul buku">
	                	<input type="radio" name="jenis" value="1" checked=""/>Hardcopy
	                	<input type="radio" name="jenis" value="2"/>softcopy
	                </div>
	                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
	              </div>
            </form>  
            </div>    
            <div class="container">
            	<?php echo $contents ?>
            </div>    
            </div>
            <script src="<?php echo base_url('assets/javascript/jquery-1.11.3.js');?>"></script>
            <script src="<?php echo base_url('assets/javascript/bootstrap.js');?>"></script>
  
        </body>
    </html>