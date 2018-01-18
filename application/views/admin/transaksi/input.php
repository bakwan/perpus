<script>
  $(function(){
    
    function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('admin/Transaksi/tampil');?>");
          }
          loadData();
          
          function kosong(args) {
            //code
            $("#ISBN").val('');
            $("#judul").val('');
            $("#penerbit").val('');
            $("#jenis").val('');
            $("#jumlah").val('');
          }
          $("#nisis_sis").change(function(){
            var nisis_sis = $(this).val();
            $.ajax({
              url:"<?php echo site_url('admin/Transaksi/carisiswa');?>",
              type:"POST",
              data:"nisis_sis="+nisis_sis,
              cache:false,
              success:function(msg){
                if (msg=='') {
                  $("#nmasw_sis").val('data tidak ditemukan');
                }
                else{
                  $("#nmasw_sis").val(msg);
                }
              }
            });
            
          });
          $("#ISBN").change(function(){
            var ISBN=$("#ISBN").val();
            $.ajax({
              url:"<?php echo site_url('admin/Transaksi/cariBuku');?>",
              type:"POST",
              data:"ISBN="+ISBN,
              cache:false,
              success:function(msg){
                if (msg=='') {
                  alert("data tidak ditemukan");
                  $("#judul").val('');
                }else{
                  $("#judul").val(msg);
                }
              }
            })
          })

          $("#tambah").click(function(){
            var ISBN=$("#ISBN").val();
            var judul=$("#judul").val();
            var jumlah=$("#jumlah").val();
            
            if (ISBN=="") {
                //code
                alert("Kode Buku Masih Kosong");
                $('#ISBN').focus();
                return false;
              }else if (judul=="") {
                //code
                alert("Data tidak ditemukan");
                $('#ISBN').focus();
                return false
              }else{
                $.ajax({
                  url:"<?php echo site_url('admin/Transaksi/tambah');?>",
                  type:"POST",
                  data:"ISBN="+ISBN+"&judul="+judul+"&jumlah="+jumlah,
                  cache:false,
                  success:function(html){
                    loadData();
                    kosong();
                  }
                })    
              }
              
            })  
          $("#simpan").click(function(){
            var nomer=$("#no").val();
            var pinjam=$("#pinjam").val();
            var kembali=$("#kembali").val();
            var nisis_sis=$("#nisis_sis").val();
            var jumlah=parseInt($("#total").val(),10);
            var jumlahTmp=parseInt($("#jumlahTmp").val(),10);
            if (nisis_sis=="") {
              alert("masukan Nis Siswa");
              $('#nisis_sis').focus();
              return false;
            }else if (jumlah==0) {
              alert("masukan ISBN buku yang akan dipinjam");
              $('#ISBN').focus();
              return false;
            }else{
              $.ajax({
                url:"<?php echo site_url('admin/Transaksi/simpan');?>",
                type:"POST",
                data:"nomer="+nomer+"&pinjam="+pinjam+"&kembali="+kembali+"&nisis_sis="+nisis_sis+"&operator="+operator,
                cache:false,
                success:function(html){
                  alert("Transaksi Peminjaman berhasil");
                  location.reload();
                }
              })
            }
            
          })

})
</script>
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
  <div class="box-body">
   <div class="panel panel-default">
     <div class="panel-body">
       <form class="form-horizontal" action="<?php echo site_url('admin/Transaksi/simpan');?>" method="post">
         <div class="col-md-6">
           <div class="form-group">
             <label class="col-lg-4 control-label">No. Transaksi</label>
             <div class="col-lg-7">
               <input type="text" id="no" name="no" class="form-control" value="<?php echo $noauto;?>" readonly="">
             </div>
           </div>
           
           <div class="form-group">
             <label class="col-lg-4 control-label">Tgl Pinjam</label>
             <div class="col-lg-7">
               <input type="text" id="pinjam" name="pinjam" class="form-control" value="<?php echo $tanggalpinjam;?>" readonly="">
             </div>
           </div>
           
           <div class="form-group">
             <label class="col-lg-4 control-label">Tgl Kembali</label>
             <div class="col-lg-7">
               <input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo $tanggalkembali;?>" >
             </div>
           </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
             <label class="col-lg-4 control-label">Nis</label>
             <div class="col-lg-7">
               <input  type="text" name="nisis_sis" id="nisis_sis" class="form-control"/>
             </div>
           </div>
           
           <div class="form-group">
             <label class="col-lg-4 control-label">Nama Siswa</label>
             <div class="col-lg-7">
               <input type="text" name="nmasw_sis" id="nmasw_sis" class="form-control" readonly="">
             </div>
           </div><div class="form-group">
           <label class="col-lg-4 control-label">Operator</label>
           <div class="col-lg-7">
             <input type="text" name="operator" id="operator" class="form-control" value="<?php echo '' .$this->session->userdata('nmapg_pgw');?>" readonly="">
           </div>
         </div>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
</div>

<div class="col-lg-12">
  <!-- Primary box -->
  <div class="box box-primary">
    <div class="box-header" data-toggle="tooltip">
      <h3 class="box-title">Data Buku yang di pinjam</h3><br>
      <div class="box-tools pull-right">
        <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-danger btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    
    <div class="box-body">
      <div class="form-inline">
        <div class="form-group">
          <label class="sr-only">ISBN</label>
          <input type="text" class="form-control" placeholder="kode ISBN" id="ISBN">
        </div>
        <div class="form-group">
          <label class="sr-only">Judul Buku</label>
          <div class="col-xl-12">
          <input type="text" class="form-control" placeholder="Judul Buku" id="judul" readonly="readonly">
          </div>
        </div>
        <div class="form-group">
          <label class="sr-only">jumlah</label>
          <input type="text" class="form-control" placeholder="jumlah" id="jumlah">
        </div>
        <div class="form-group">
          <label class="sr-only">Tambah</label>
          <button id="tambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
      </div>
    </div>
    
    <div id="tampil"></div>
    <div class="panel-footer">
      <button id="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</div>