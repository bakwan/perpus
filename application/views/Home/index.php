 <div class="col-xl-12">
                        <legend>Data Buku</legend>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Gambar</td>
                                    <td>ISBN</td>
                                    <td>Judul Buku</td>
                                    <td>Jenis</td>
                                    <td>Pengarang</td>
                                    <td>abstract</td>
                                    <td>download</td>
                                </tr>
                            </thead>
                            <?php $no=0; foreach($row as $row): $jenis=$row->jenis==1?'hardcopy':'softcopy'; $no++;?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><img src="<?php echo base_url('assets/images/'.$row->cover);?>" width="100px" height="100px"></td>
                                <td><a href="<?php echo site_url('Home/buku_detail/'.$row->id_buku);?>"><?php echo $row->ISBN;?></a></td>
                                <td><?php echo $row->judul;?></td>
                                <td><?php echo $jenis;?></td>
                                <td><?php echo $row->penerbit;?></td>
                                <td><?php echo $row->abstract;?></td>
                                <td><a href="<?php echo base_url()."assets/images/".$row->file; ?>"><?php echo $row->file;?></a></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
       <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>               
    </div>
