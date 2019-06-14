	<div class="row">
		<div class="col-md-12">
			<?php
				echo $this->session->flashdata('pesan');
			?>
			<div class="box">
				<div class="loket">
					Instansi
				</div>
				<div class="agenda">
					<div class="col-md-1"></div>
					<div class="row">
						<div class="col-md-10">
							<br>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<th width="3px">No</th>
										<th width="200px;">Nama Instansi</th>
										<th width="130px">Telp</th>
										<th>Alamat</th>
										<th width="100px">Logo</th>
										<th width="110px">Aksi</th>
									</tr>
									<?php
									$no=0;
									foreach ($hasil as $row) { 
										$no++;
										?>
									<tr style="text-align:center;">
										<td><?php echo $no; ?></td>
										<td><?php echo $row->instansi; ?></td>
										<td><?php echo $row->telp; ?></td>
										<td><?php echo $row->alamat; ?></td>
										<td><img src="<?php echo base_url('media/'.$row->logo); ?>" class="img"></img>
										</td>
										<td><a href="#<?php echo $row->id_instansi; ?>" data-toggle="modal" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
									</tr>

<div id="<?php echo $row->id_instansi; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Instansi</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo site_url('admin/edit_instansi/'.$row->id_instansi); ?>" enctype="multipart/form-data">
          <div class="col-md-6">
            <label for="sel1">Nama Instansi</label>
              <input type="text" name="instansi" class="form-control" pattern="[0-9A-Za-z .,-]{0,50}" value="<?php echo $row->instansi; ?>" required="" maxlength="50">
            <label for="sel1">Alamat</label>
              <textarea name="alamat" class="form-control"><?php echo $row->alamat; ?></textarea>
          </div>
          <div class="col-md-6">
          	<label for="sel1">Nomer Telp</label>
              <input type="text" name="telp" class="form-control" pattern="[0-9A-Za-z .,-]{0,50}" value="<?php echo $row->telp; ?>" required="" maxlength="50">
            <label for="sel1">Logo</label>
              <input type="file" name="logo" class="form-control">
              <input type="hidden" name="logo_lama" value="<?php echo $row->logo; ?>">
      	<br>
          </div>
          <div class="col-md-12">
            <center>
            	<br>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </center> 
           </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

									<?php } ?>
								</table>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
