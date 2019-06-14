<div class="col-md-1"></div>
<div class="col-md-11">
	<div class="row">
		<div class="col-md-5">         
			<div class="box">
				<div class="loket">
					Agenda
				</div>
				<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                      <!-- <ol class="carousel-indicators">
                      	<li data-target="#carousel-example-captions" data-slide-to="0"></li>
                      	<?php
                      	$i=0;
                      	foreach ($agenda->result() as $ag) { 
                      		$i++;?>
                        <li data-target="#carousel-example-captions" data-slide-to="<?php echo $i; ?>"></li>
                        <?php } ?>
                      </ol> -->
                      <div class="carousel-inner" id="slide">
						<div class="item active">
                          <img class="img-responsive" data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="<?php echo base_url('media/agenda/'.$agenda->row('file')); ?>">
                          <div class="carousel-caption">
                            <h3><?php echo $agenda->row('agenda'); ?></h3>
                            <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                          </div>
                        </div>
                      	<?php foreach ($agenda1->result() as $ag) { ?>
                        <div class="item">
                          <img class="img-responsive" data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="<?php echo base_url('media/agenda/'.$ag->file); ?>">
                          <div class="carousel-caption">
                            <h3><?php echo $ag->agenda; ?></h3>
                            <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                          </div>
                        </div>
						<?php } ?>
                      </div>
                      <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
				</div>
			</div>
		<?php
		foreach ($loket as $row) { ?>
		<div class="col-md-3">
			<div class="box">
				<div class="loket" id="loket">
					Loket <?php echo $row->loket; ?>
				</div>
				<div class="antrian" id="antrian<?php echo $row->id_loket; ?>">
					<?php $antri = $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $row->id_loket, 'tgl' => date('dmY')))->row('no_antrian');
					?>
  <script type="text/javascript">
     	  setInterval(function(){
				var lok= <?php echo $row->id_loket; ?>;
		        $.ajax({
		        type:"POST",
		        url: "<?php echo site_url('welcome/get_antri/'); ?>",
		        data: "id_loket="+lok,
		        success:function(data){	
			        document.getElementById("antrian<?php echo $row->id_loket ?>").innerHTML = data;
		       		 }
		   	 	})
       		 }, 1000);
  </script>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>