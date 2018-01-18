<!--<script>
$("#edit").click(function(){
            $("#modal").modal("show");
        })
</script>         
<table class="table table-striped table-bordered">
    <thead>
       <tr> 
        <td>No</td>
        <td>ISBN</td>
        <td>Judul Buku</td>
        <td>Jumlah</td>
        <td>Action</td>
       </tr> 
    </thead>
    <?php $no=0; foreach  ($tmp as $t ): $no++;?>
      <tr>  
        <td width="10"><?php echo $no ?></td>
        <td><?php echo $t->ISBN ?></td>
        <td><?php echo $t->judul ?></td>
        <td><?php echo $t->jumlah ?></td>
        <td width="50">
			<button id="edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-search"></i></button>
            <a href="#" class="hapus" kode="<?php echo $t->ISBN;?>"><i class="glyphicon glyphicon-trash"></i></a>
        </td>
      </tr>  
  <?php endforeach; ?>
</table>
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Jumlah Buku</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Edit jumlah buku</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribuku" id="caribuku" class="form-control">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content-->
                
<!--<td width='100'>
		<input type='hidden' name='id $t->ISBN' value='$t->ISBN'>
    	<input type='number' class='form-control' size='3' name='jumlah $t->ISBN' value='$t->jumlah'>
    </td>-->
<table class="table table-striped table-bordered">
	
    <thead>
        <tr>
           <th>No</th>
           <th>Kode Buku</th>
           <th>Judul Buku</th>
           <th>Jumlah</th>
           <th>Action</th>
       </tr>
   </thead>
   <?php
            echo form_open('admin/Transaksi/edittam');
    ?>
   <?php
   $no = 1;
   $total=0;
   foreach ($tmp as $t) {
    echo "<tr>
    <td width='10'>$no</td>
    <td>$t->ISBN</td>
    <td>$t->judul</td>
    <td>$t->jumlah</td>
    <td width='50'>
    ".anchor("admin/Transaksi/edittam/".$t->ISBN,'<img src="'.base_url().'assets/img/edit.png'.'">',array('title'=>'edit jumlah buku'))."
    ".anchor("admin/Transaksi/hapus/".$t->ISBN,'<img src="'.base_url().'assets/img/delete.png'.'">',array('title'=>'edit data'))."</td>
    <tr>";   
        $total=$total+($t->jumlah);
        $no++;
    }
    ?>
   
    <tr>
        <td colspan="2">Total jumlah Buku</td>
        <td colspan="4"><input type="text" id="total" value="<?php echo $total;?>" class="form-control" readonly="readonly"></td>
    </tr>
</table>
 <?php
 	form_close();
 ?>
 <!--<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Jumlah Buku</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Edit jumlah buku</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribuku" id="caribuku" class="form-control">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->