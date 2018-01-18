<div class="col-md-12">
    <!-- Primary box -->
    <div class="box box-primary">
        <div class="box-header" data-toggle="tooltip">
           <h3 class="box-title">Data Transaksi peminjaman</h3>
           <div class="box-tools pull-right">
            <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-danger btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" action="<?php echo base_url('admin/transaksi/perpanjang') ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id_transaksi'] ?>"/>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">No. Transaksi</label>
                        <div class="col-lg-7">
                            <input type="text" name="id_transaksi" value="<?php echo $row['id_transaksi'] ?>" class="form-control" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Tgl. Pinjam</label>
                        <div class="col-lg-7">
                            <input type="text" name="tanggal_pinjam" value="<?php echo $row['tanggal_pinjam'] ?>" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Batas Waktu peminjaman</label>
                        <div class="col-lg-7">
                            <input type="text" id="tanggal" name="tanggal_kembali"class="form-control" value="<?php echo $row['tanggal_kembali'] ?>">
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nis</label>
                        <div class="col-lg-7">
                            <input type="text" name="nis" id="nis" value="<?php echo $row['nis'] ?>" class="form-control" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama</label>
                        <div class="col-lg-7">
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $siswa['nmasw_sis'] ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Operator</label>
                        <div class="col-lg-7">
                            <input type="text" name="operator" id="operator" class="form-control" value="<?php echo '' .$this->session->userdata('nmapg_pgw');?>" readonly="readonly">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <?php
            $no=1;
            $total=0;
            foreach ($detail as $row){
              echo "
              <tr>
               <td width='10'>$no</td>
               <td>$row->ISBN</td>
               <td>$row->judul</td>
               <td>$row->penerbit</td>
               <td>$row->jumlah</td>
           </tr>";
           $no++;
           $total=$total+($row->jumlah); 
       }
       ?>
       <tr>
        <td colspan="2">Total Buku</td>
        <td colspan="5"><input type="text" <?php echo $total ?> class="form-control" readonly="readonly"></td>
    </tr>
</table>

</div>
</div>

<div class="panel-footer">
    <button id="simpan" type="submit" name="submit" class="btn btn-primary"> Simpan</button>
</div>
</form>
