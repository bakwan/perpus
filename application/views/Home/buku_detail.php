<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Detail Informasi Buku</h3>
    </div><!-- /.box-header -->
    <table class="table table-bordered tabel-hover">
        <tr><td width="200">ISBN</td><td><?php echo $row['ISBN'] ?><tr></tr>
        <tr><td width="200">Kategori</td><td><?php echo $kategori['nama'] ?><tr></tr>
        <tr><td width="200">Lokasi</td><td><?php echo $kategori['lokasi'] ?><tr></tr>
        <tr><td>judul</td><td><?php echo $row['judul'] ?><tr></tr>
        <tr><td>Penulis</td><td><?php echo $row['penulis'] ?><tr></tr>
        <tr><td>penerbit</td><td><?php echo $row['penerbit'] ?><tr></tr>
        <tr><td>Tanggal Terbit</td><td><?php echo $row['tanggal'] ?><tr></tr>
        <tr><td>Cover</td><td><img src="<?php echo base_url().'assets/images/'. $row['cover']?>" alt="150" width="350" height="400"/><tr></tr>
        <tr><td>File</td><td><?php echo $row['file'] ?><tr></tr>
        <tr><td>abstract</td><td><?php echo $row['abstract'] ?><tr></tr>
    </table>
</div><!-- /.box -->