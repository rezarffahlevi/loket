<div class="row">
  <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="box">
        <div class="loket">Login</div>
        <div class="agenda">
          <form method="POST" action="<?php echo site_url('welcome/validasi'); ?>" enctype="multipart/form-data">
            <center>
              <?php echo $this->session->flashdata('pesan'); ?>
              <label>Username</label>
              <input type="text" name="username" class="form-control" pattern="[0-9A-Za-z .,-]{3,50}" placeholder="Username" maxlength="50"> 
              <label>Password</label>
              <input type="password" name="password" class="form-control" pattern="[0-9A-Za-z .,-]{3,50}" placeholder="Password" required="" maxlength="50">
              <br>
              <button type="submit" class="btn btn-primary">Login</button>
              <button type="reset" class="btn btn-danger">Reset</button> 
            </center>
          </form>
        </div>
    </div>
  </div>
</div>