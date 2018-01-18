<table border="1">
    <thead>
        <tr>
            <td width="10">No.</td>
            <td>ID Transaksi</td>
            <td>Nis</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal jatuh tempo</td>

        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_transaksi;?></td>
        <td><?php echo $row->nis;?></td>
        <td><?php echo $row->tanggal_pinjam;?></td>
        <td><?php echo $row->tanggal_kembali;?></td>
       
    </tr>
    <?php endforeach;?>
</table>