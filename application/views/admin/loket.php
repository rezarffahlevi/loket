	<div class="row">
		<div class="col-md-12">
			<?php
				echo $this->session->flashdata('pesan');
			?>
			<div class="box">
				<div class="loket">
					Loket
				</div>
				<div class="agenda">
					<div class="col-md-3"></div>
					<div class="row">
						<div class="col-md-6">
							<center>
								<a href="#add" data-toggle="modal" class="btn btn-primary">Tambah Loket</a>
							</center>
							<br>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr>
										<th width="3px">No</th>
										<th width="200px;">Nama Loket</th>
                    <th width="20px;">Status</th>
										<th width="110px">Aksi</th>
									</tr>
									<?php
									$no=0;
									foreach ($hasil as $row) { 
										$no++;
										?>
									<tr style="text-align:center;">
										<td><?php echo $no; ?></td>
										<td>Loket <?php echo $row->loket; ?></td>
                    <td><?php if($row->status == 0){echo "Kosong";}else{echo "Sedang digunakan";} ?></td>
										<td><a href="#<?php echo $row->id_loket; ?>" data-toggle="modal" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;<a href="<?php echo site_url('admin/del_loket/'.$row->id_loket); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
									</tr>

									<!-- Modal -->
<div id="<?php echo $row->id_loket; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Loket</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo site_url('admin/edit_loket/'.$row->id_loket); ?>" enctype="multipart/form-data">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <label for="sel1">Nama Loket</label>
              <input type="text" name="loket" class="form-control" pattern="[0-9A-Za-z .,-]{0,50}" value="<?php echo $row->loket; ?>" required="" maxlength="50">
            <label for="sel1">Status Loket</label>
            <?php
            if($row->status == 0){
              $a = "selected";
              $b ="";
            }
            else{
              $a = "";
              $b="selected";
            }
            ?>
              <select name="status" class="form-control">
                <option value="0" <?php echo $a; ?>>Kosong</option>
                <option value="1" <?php echo $b; ?>>Sedang digunakan</option>
              </select>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-12">
            <center>
            	<br>
              <button type="submit" class="btn btn-primary" name="s_buku">Simpan</button>
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
							<?php echo $halaman; ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Loket</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo site_url('admin/add_loket/'); ?>" enctype="multipart/form-data">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <label for="sel1">Nama Loket</label>
              <input type="text" name="loket" class="form-control" pattern="[0-9A-Za-z .,-]{0,50}" placeholder="Example: A, B, C OR 1, 2, 3" required="" maxlength="50">
            <label for="sel1">Status Loket</label>
              <select name="status" class="form-control">
                <option value="0">Kosong</option>
                <option value="1">Sedang digunakan</option>
              </select>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-12">
            <center>
            	<br>
              <button type="submit" class="btn btn-primary" name="s_buku">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </center> 
           </div>
        </form>
      </div>
      <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>