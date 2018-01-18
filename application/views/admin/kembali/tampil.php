<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <td>ISBN</td>
            <td>Judul Buku</td>
            <td>Pengarang</td>
        </tr>
    </thead>
    <?php foreach($buku as $row):?>
    <tr>
        <td><?php echo $row->ISBN;?></td>
        <td><?php echo $row->judul;?></td>
        <td><?php echo $row->penerbit;?></td>
    </tr>
    <?php endforeach;?>
</table>