<?php if ($this->session->flashdata('success')): ?>
  <div class="box-body">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
  </div>    
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
  <div class="box-body">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->flashdata('error'); ?>
    </div>	
  </div><!-- /.box-header -->
<?php endif; ?>
<div class="box">		
  <div class="box-header">
    <h3 class="box-title">Data Transaksi</h3>
  </div><!-- /.box-header -->
  
  <?php
  echo anchor('admin/transaksi/input','input Peminjaman',array('class'=>'btn btn-primary btn-sm'))
  ?><br>
  
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="10">No</th>
          <th width="20">Kode Transaksi</th>
          <th>NIS / Nama</th>
          <th>Status</th>
          <th>tanggal pinjam</th>
          <th>tanggal Kadaluarsa</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($transaksi as $b){
          echo "<tr>
          <td width='10'>$no</td>
          <td width='20'>".  strtoupper($b->id_transaksi)."</td>
          <td width='100'>$b->nis / $b->nmasw_sis</td>
          <td width='50'>$b->status</td>
          <td width='50'>$b->tanggal_pinjam</td>
          <td width='50'>$b->tanggal_kembali</td>
          <td width='50'>".anchor("admin/transaksi/detail//".$b->id_transaksi,'<img src="'.base_url().'assets/img/detail.png'.'">',array('title'=>'detail data'))."
         ".anchor("admin/transaksi/kembali/".$b->id_transaksi,'<img src="'.base_url().'assets/img/widgets.png'.'">',array('title'=>'transaksi kembali'))."
         ".anchor("admin/transaksi/perpanjang/".$b->id_transaksi,'<img src="'.base_url().'assets/img/report.png'.'">',array('title'=>'transaksi perpanjang'))."
         ".anchor("admin/transaksi/delete/".$b->id_transaksi,'<img src="'.base_url().'assets/img/delete.png'.'">',array('onclick'=>'return confirm(\'apakah anda yakin?\')'))."</td>
        </tr>";
        $no++;
      }
      ?>
    </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
