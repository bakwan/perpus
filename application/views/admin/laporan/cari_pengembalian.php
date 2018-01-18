<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <td width="10">No.</td>
            <td>ID Transaksi</td>
            <td>Tanggal Pengembalian</td>
            <td>denda</td>
        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_transaksi;?></td>
        <td><?php echo $row->tanggal;?></td>
        <td><?php echo $row->denda;?></td>
    </tr>
    <?php endforeach;?>
</table>
<a href="<?php echo base_url(); ?>admin/laporan/export_kembali">EXPORT</a>