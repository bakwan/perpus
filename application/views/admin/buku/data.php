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
    <h3 class="box-title">Data Buku</h3>
  </div><!-- /.box-header -->
  
  <?php
  echo anchor('admin/buku/post','Input Buku',array('class'=>'btn btn-primary btn-sm'))
  ?><br>
  
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>ISBN</th>
          <th>jenis</th>
          <th>Penerbit</th>
          <th>Kategori</th>
          <th>Lokasi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($buku as $b){
         $jenis=$b->jenis==1?'hardcopy':'softcopy';
         echo "<tr>
         <td width='10'>$no</td>
         <td>".  strtoupper($b->judul)."</td>
         <td >$b->ISBN</td>
         <td width='100'>$jenis</td>
         <td width='200'>$b->penerbit</td>
         <td width='200'>$b->nama</td>
         <td width='100'>$b->lokasi</td>
         <td width='70'>".anchor("admin/Buku/detail/".$b->id_buku,'<img src="'.base_url().'assets/img/detail.png'.'">',array('title'=>'detail data'))."
         ".anchor("admin/Buku/edit/".$b->id_buku,'<img src="'.base_url().'assets/img/edit.png'.'">',array('title'=>'edit data'))."
         ".anchor("admin/Buku/delete/".$b->id_buku,'<img src="'.base_url().'assets/img/delete.png'.'">',array('onclick'=>'return confirm(\'apakah anda yakin?\')'))."</td>
       </tr>";
       $no++;
     }
     ?>
   </table>
 </div><!-- /.box-body -->
</div><!-- /.box -->
