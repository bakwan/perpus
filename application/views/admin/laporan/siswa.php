				<div class="box">		
                    <div class="box-header">
                        <h3 class="box-title">Data Sisswa</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th width="20">Nis</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($siswa as $b){
                                    echo "<tr>
                                    <td width='10'>$no</td>
                                    <td width='20'>".  strtoupper($b->nisis_sis)."</td>
                                    <td width='100'>$b->nmasw_sis</td>
                                    <td width='50'>$b->almat_sis</td>
                                    <td width='50'>$b->thmsk_sis</td>
                                    
                                </tr>";
                                $no++;
                            }
                            ?>
                        </table>
                    </div><!-- /.box-body -->
                            </div><!-- /.box -->