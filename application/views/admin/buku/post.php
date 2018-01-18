<script type="text/javascript">
	function cekform()
	{
		if(!$("#ISBN").val())
		{
			alert('masukan kode ISBN');
			$('#ISBN').focus();
			return false;
		}
		if(!$("#judul").val())
		{
			alert('masukan judul');
			$('#judul').focus();
			return false;
		}
		if(!$("#penulis").val())
		{
			alert('masukan penulis');
			$('#penulis').focus();
			return false;
		}
		if(!$("#penerbit").val())
		{
			alert('masukan penerbit');
			$('#penerbit').focus();
			return false;
		}
	}		
</script>	
<?php if ($this->session->flashdata('error')): ?>
	<div class="box-body">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>	
	</div><!-- /.box-header -->
<?php endif; ?>
<!-- form start -->
<?php
echo form_open_multipart('admin/Buku/post',array('onsubmit'=>'return cekform()'));
?>
<form role="form" onsubmit="return cekform();">
	<div class="box-body">
		<div class="form-group">
			<label>Kategori</label>
			<select class="form-control" name="kategori_id">
				<option>--pilih kategori--</option>
				<?php 
				foreach ($categori as $kat)
				{
					echo "<option value='$kat->kategori_id'> $kat->nama</option>";
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>jenis</label>
			<?php
			$jenis=array(1=>'hardcopy',2=>'softcopy');
			echo form_dropdown('jenis',$jenis,['jenis'],"class='form-control'");
			?>
		</div>
		<div class="form-group">
			<label>ISBN</label>
			<input type="text" class="form-control" id="ISBN" placeholder="ISBN" name="ISBN">
		</div>
		<div class="form-group">
			<label>Judul</label>
			<input type="text" class="form-control" id="judul" placeholder="judul" name="judul">
		</div>
		<div class="form-group">
			<label>Penulis</label>
			<input type="text" class="form-control" id="penulis" placeholder="penulis" name="penulis">
		</div>
		<div class="form-group">
			<label>Penerbit</label>
			<input type="text" class="form-control" id="penerbit" placeholder="penerbit" name="penerbit">
		</div><div class="form-group">
		<label>Tanggal Rilis</label>
		<input type="text" id="buku" class="form-control" placeholder="tanggal" name="tanggal">
	</div>
	<div class="form-group">
		<label>Operator</label>
		<input type="text" class="form-control"  style="width:200px;" placeholder="operator" name="operator" value="<?php echo '' .$this->session->userdata('nmapg_pgw');?>" readonly="">
	</div>
	<div class="form-group">
		<label>full foto</label>
		<input type="file" class="form-control" name="userfile_1">
	</div><div class="form-group">
		<label>pas foto</label>
		<input type="file" name="userfile_2">
	</div>
	<div class="form-group">
		<label>Abstract</label>
		<textarea name="abstract" class="form-control" id="abstract"></textarea>
	</div>
</div><!-- /.box-body -->

<div class="box-footer">
	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	<?php
	echo anchor('admin/Buku','Kembali',array('class'=>'btn btn-danger'));
	?>
</div>
</form>
                            </div><!-- /.box -->