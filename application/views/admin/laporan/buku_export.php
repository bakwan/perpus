DAFTAR BUKU
<table id="example1" border="1">
      <thead>
          <tr>
              <th>No</th>
              <th>Judul</th>
              <th>ISBN</th>
              <th>Jenis</th>
              <th>Penerbit</th>
              <th>Kategori</th>
              <th>Lokasi</th>
          </tr>
      </thead>
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
