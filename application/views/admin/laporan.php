	<div class="row">
		<div class="col-md-12">
			<?php
				//echo $this->session->flashdata('pesan');
			?>
			<div class="box">
				<div class="loket">
					Laporan
				</div>
				<div class="agenda">
					<div class="col-md-3"></div>
					<div class="row">
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<th width="3px">No</th>
										<th style="text-align: center;">Waktu</th>
										<th width="130px">Jumlah Antrian</th>
										<!-- <th width="10px" nowrap="">Aksi</th> -->
									</tr>
									<?php
$bulan=array("01" => "Januari", "02" => "Februari", "03" => "Maret",
"04" => "April", "05" => "Mei", "06" => "Juni",
"07" => "Juli", "08" => "Agustus", "09" => "September",
"10" => "Oktober", "11" => "November", "12" => "Desember");
									$no=0;
									foreach ($hasil as $row) { 
										$no++;
										$b=$bulan[substr($row->tgl, 2,2)];
										$waktu=substr($row->tgl, 0,2)." ".$b." ".substr($row->tgl, -4);
										?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $waktu; ?></td>
										<td style="text-align: center;">
											<?php echo $this->M_crud->get_id('transaksi', array('tgl' => $row->tgl))->num_rows(); ?>
											
										</td>
										<!-- <td><a href="<?php echo site_url('admin/'); ?>" class="btn btn-info <?php echo $a; ?>">Hapus</a></td> -->
									</tr>
									<?php } ?>
								</table>
							</div>
							<?php echo $halaman; ?>
						</div>	
					</div>

					<!-- <div class="row">
						<div class="col-md-3"></div>
			              <div class="col-md-6 col-sm-6 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Data Pengantri <small></small></h2>
			                  </div>
			                  <div class="x_content">
			                    <canvas id="mybarChart"></canvas>
			                  </div>
			                </div>
			              </div>
			        </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/Chart.min.js'); ?>"></script>
<script type="text/javascript">
	      // Bar chart
      var ctx = document.getElementById("mybarChart");
      var mybarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
          datasets: [{
            label: 'Pengantri',
            backgroundColor: "#26B99A",
            data: [51, 30, 40, 28, 92, 50, 250]
          // }, {
          //   label: '# of Votes',
          //   backgroundColor: "#03586A",
          //   data: [41, 56, 25, 48, 72, 34, 12]
           }]
        },

        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
</script>