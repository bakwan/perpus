                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Buat Data Kategori</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                echo form_open('admin/kategori/post');
                                ?>
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <input type="text" class="form-control" placeholder="Lokadi" name="lokasi" required=""
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        <?php
                                        echo anchor('admin/kategori','Kembali',array('class'=>'btn btn-danger'));
                                        ?>
                                    </div>
                                </form>
                            </div><!-- /.box -->