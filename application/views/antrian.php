
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box">
				<div class="loket">
					Nomer Antrian Anda
				</div>
				<div class="agenda">
					<h1 id="nomer"><?php echo $antrian->row('no_antrian'); 
					if($antrian->row('no_antrian') < 1){
						$antri=0;
					}
					else{
						$antri=$antrian->row('no_antrian');
					}
					?>
					</h1>
						<center>
							<a href="<?php echo site_url('welcome/tambah_antrian/'.$antri); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> &nbsp;Dapatkan Nomer Antrian</a>
						</center>
					<br>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function nomer(){
		var antri = parseInt(document.getElementById('nomer').innerHTML)+1;
		document.getElementById("nomer").innerHTML=antri;
	}
</script>