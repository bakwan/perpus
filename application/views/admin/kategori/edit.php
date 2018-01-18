        <link href="<?php echo base_url()?>template/AdminLTE/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>template/AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" /> 
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            echo form_open('admin/kategori/edit');
            ?>
            <input type="hidden" name="id" value="<?php echo $row['kategori_id']?>">
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" value="<?php echo $row['nama']?>">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" placeholder="lokasi" name="lokasi" value="<?php echo $row['lokasi']?>">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <?php
                    echo anchor('admin/kategori','Kembali',array('class'=>'btn btn-primary'));
                    ?>
                </div>
            </form>
                            </div><!-- /.box -->