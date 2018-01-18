<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Detail peminjaman</h3>
    </div><!-- /.box-header -->
    <table class="table table-bordered">
        <tr><th width="200">Nomor Transaksi</th><th><?php echo $row['id_transaksi'] ?><tr></tr>
        <tr><th>Nis</th><td><?php echo $row['nis'] ?> / <?php echo $siswa['nmasw_sis'] ?><tr></tr>
        <tr><th>Tangal pinjam</th><td><?php echo $row['tanggal_pinjam'] ?><tr></tr>
        <tr><th>Tanggal Harus Kembali</th><td><?php echo $row['tanggal_kembali'] ?><tr></tr>
        <tr><th>Status</th></td><td><?php echo $row['status'] ?><tr></tr>
        <tr><th>Data Dibuat pada tanggal</th><td><?php echo $row['create_at'] ?><tr></tr>
        <tr><th>Data diperpanjang pada tanggal</th><td><?php echo $row['update_at'] ?><tr></tr>
        <tr><th>Operator</th><td><?php echo $row['operator'] ?><tr></tr>
    </table>
    <div class="box-header">
        <h3 class="box-title">Detail Pengembalian buku</h3>
    </div><!-- /.box-header -->
    <table class="table table-bordered">
        <tr><th width="200">Tanggal Kembali</th><td><?php echo $kembali['tanggal'] ?><tr></tr>
        <tr><th>Denda</th><td><?php echo $kembali['denda'] ?><tr></tr>
    </table>
    
    <div class="box-header">
        <h3 class="box-title">Detail Data buku yang dipinjam</h3>
    </div><!-- /.box-header -->
    <table class="table table-bordered">
        <tr><th width="10">No</th><th>ISBN</th><th>Judul</th><th>Penerbit</th><th>jumlah</th></tr>
        <?php
        $no = 1;
        $total=0;
        foreach ($detail as $d) {
            echo "<tr>
            <td>$no</td>
            <td>$d->ISBN</td>
            <td>$d->judul</td>
            <td>$d->penerbit</td>
            <td>$d->jumlah</td>
            <tr>";
            $total=$total+($d->jumlah);	
            $no++;
            }
            ?>
              <tr><th colspan="3"></td><td>Total</td><td><?php echo ($total); ?></th></tr>
        </table>
</div><!-- /.box -->