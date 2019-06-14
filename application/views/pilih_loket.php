	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<?php
				//echo $this->session->flashdata('pesan');
			?>
			<div class="box">
				<div class="loket">
					Pilih Loket
				</div>
				<div class="agenda">
					<div class="col-md-3"></div>
					<div class="row">
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<th width="3px;">No</th>
										<th>Loket</th>
										<th width="10px" nowrap="">Aksi</th>
									</tr>
									<?php
									$no=0;
									foreach ($loket as $row) { 
										$no++;
										if($row->status == 0){
											$a="";
										}
										else{
											$a="disabled";
										}
										?>
									<tr>
										<td><?php echo $no; ?></td>
										<td>Loket <?php echo $row->loket; ?></td>
										<td><a href="<?php echo site_url('penjaga/loket/'.$row->id_loket); ?>" class="btn btn-info <?php echo $a; ?>">Gunakan Loket Ini</a></td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
