<?php if ($this->session->flashdata('success')): ?>
  <div class="box-body">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p style="color: red"><?php echo '' .$this->session->userdata('nmapg_pgw');?></p> <?php echo $this->session->flashdata('success'); ?>
    </div>
  </div>    
<?php endif; ?>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner"> 
        <h3><?php echo $jumlahTrans ?></h3>
        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion-ios-toggle"></i>
      </div>
      <a href="<?php echo base_url()?>admin/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- ./col -->
</div>            