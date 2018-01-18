<div class="box">		
    <div class="box-header">
        <h3 class="box-title">Data Buku</h3>
    </div><!-- /.box-header -->
    <?php
  echo anchor('admin/laporan/export_buku','export Data Buku',array('class'=>'btn btn-primary btn-sm'))
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
               </tr>";
               $no++;
           }
           ?>
       </table>
   </div><!-- /.box-body -->
</div><!-- /.box -->
