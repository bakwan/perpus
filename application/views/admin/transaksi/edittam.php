
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            echo form_open('admin/transaksi/edittam');
            ?>
            <input type="hidden" name="id" value="<?php echo $row['ISBN']?>">
            <form role="form">
                <div class="box-body">
                        <label>Lokasi</label>
                        <input type="number" style="width:200px;" class="form-control" placeholder="lokasi" name="jumlah" value="<?php echo $row['jumlah']?>">
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