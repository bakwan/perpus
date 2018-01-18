
<div class="box">
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
<?php endif; ?>                                <div class="box-header">
<h3 class="box-title">Data Kategori</h3>
</div><!-- /.box-header -->

<?php
echo anchor('admin/kategori/post','Input Kategori',array('class'=>'btn btn-primary btn-sm'))
?>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Lokasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($record as $r){
                echo "<tr>
                <td width='10'>$no</td>
                <td>".  strtoupper($r->nama)."</td>
                <td>".  strtoupper($r->lokasi)."</td>
                <td width='10'>".anchor("admin/kategori/edit/".$r->kategori_id,'<img src="'.base_url().'assets/img/edit.png'.'">',array('title'=>'edit data'))."
                ".anchor("admin/kategori/delete/".$r->kategori_id,'<img src="'.base_url().'assets/img/delete.png'.'">',array('onclick'=>'return confirm(\'apakah anda yakin menghapus file ini?\')'))."</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div><!-- /.box-body -->
                            </div><!-- /.box -->