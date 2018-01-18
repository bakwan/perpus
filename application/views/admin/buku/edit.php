    
<?php if ($this->session->flashdata('error')): ?>
    <div class="box-body">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('error'); ?>
    </div>	
</div><!-- /.box-header -->
<?php endif; ?> 
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Quick Example</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?php
    echo form_open_multipart('admin/Buku/edit');
    ?>
    <input type="hidden" name="id" value="<?php echo $row['id_buku'];?>"">
    <form role="form">
        <div class="box-body">
            <div class="form-group">
             <label>Kategori</label>
             <select class="form-control" name="kategori_id">
                 <option>--pilih kategori--</option>
                 <?php 
                 foreach ($kategori as $kat)
                 {
                     echo "<option value='$kat->kategori_id'";
                     echo $kat->kategori_id==$row['kategori_id']?'selected':'';
                     echo "> $kat->nama</option>";
                 }
                 ?>
             </select>
         </div>
         <div class="form-group">
            <label>jenis</label>
            <?php
            $jenis=array(1=>'hardcopy',2=>'softcopy');
            echo form_dropdown('jenis',$jenis,['jenis'],"class='form-control'");
            ?>
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" class="form-control" placeholder="ISBN" name="ISBN" value="<?php echo $row['ISBN'] ?>">
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" placeholder="judul" name="judul" value="<?php echo $row['judul'] ?>">
        </div>
        <div class="form-group">
            <label>Penulis</label>
            <input type="text" class="form-control" placeholder="penulis" name="penulis" value="<?php echo $row['penulis'] ?>">
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <input type="text" class="form-control" placeholder="penerbit" name="penerbit" value="<?php echo $row['penerbit'] ?>">
        </div><div class="form-group">
        <label>Tanggal Rilis</label>
        <input type="date" class="form-control" placeholder="tanggal" name="tanggal" value="<?php echo $row['tanggal'] ?>">
    </div>
    <div class="form-group">
        <label>Operator</label>
        <input type="text" class="form-control" placeholder="operator" name="operator" value="<?php echo $row['operator'] ?>" readonly="">
    </div>
    <div class="form-group">
        <label>Cover</label><br/>
        <img src="<?php echo base_url().'assets/images/'. $row['cover']?>" alt="150" width="350" height="400"/>
        <input type="file" name="userfile_1" class="form-control">
    </div>
    <div class="form-group">
        <label>file</label><br/>
        <input type="file" name="userfile_2"  class="form-control">
    </div>
    <div class="form-group">
        <label>Abstract</label>
        <textarea name="abstract" class="form-control"><?php echo $row['abstract'] ?></textarea>
    </div>
</div><!-- /.box-body -->

<div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <?php
    echo anchor('admin/Buku','Kembali',array('class'=>'btn btn-danger'));
    ?>
</div>
</form>
</div><!-- /.box -->