<?php
$antrian = $antrian->no_antrian;
?>
<script type="text/javascript">
	$(function(){
		$("#play").click(function(){
			document.getElementById('suarabel').play();
			document.getElementById('suarabelnomorurut').play();
			document.getElementById('suarabelsuarabelloket').play();
		});

		$("#pause").click(function(){
			document.getElementById("suarabel").pause();
		});

		$("#stop").click(function(){
			document.getElementById("suarabel").pause();
			document.getElementById("suarabel").currentTime=0;
		});


	})
</script>
<audio id="suarabel" src="<?php echo base_url('audio/Airport_Bell.mp3'); ?>"></audio>
<audio id="suarabelnomorurut" src="<?php echo base_url('audio/antrian/nomor-urut.wav'); ?>"></audio> 
<audio id="diloket" src="<?php echo base_url('audio/antrian/loket.wav'); ?>"></audio>
<?php
if($antrian > 11 && $antrian < 20){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, -1,1).'.wav'); ?>"></audio>
<?php }
else if($antrian == 20){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
<?php }
else if($antrian > 20 && $antrian < 100){ ?> 
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
	<?php
	$a=substr($antrian, -1,1);
	if($a == 0){

	}
	else{?>
		<audio id="antrian1" src="<?php echo base_url('audio/antrian/'.$a.'.wav'); ?>"></audio>
<?php 
	}
}
else if($antrian > 100 && $antrian < 110){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, -1,1).'.wav'); ?>"></audio>
<?php 
}
else if($antrian > 111 && $antrian < 120){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, -1,1).'.wav'); ?>"></audio>
<?php 
 
}
else if($antrian > 119 && $antrian < 210){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
	<?php
	$a=substr($antrian, -1,1);
	if($a == 0){

	}
	else{?>
		<audio id="antrian1" src="<?php echo base_url('audio/antrian/'.$a.'.wav'); ?>"></audio>
<?php 
	}
}
else if($antrian == 210){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
<?php }
else if($antrian == 211){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
<?php }
else if($antrian > 211 && $antrian < 220){ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
	<audio id="antrian1" src="<?php echo base_url('audio/antrian/'.substr($antrian, -1,1).'.wav'); ?>"></audio>
<?php 
}
else if($antrian > 219 && $antrian < 1000){ ?> 
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.substr($antrian, 0,1).'.wav'); ?>"></audio>
<?php
	$a = substr($antrian, 1,1);
	$b = substr($antrian, -1,1);
		echo "<audio id='antrian1' src='".base_url('audio/antrian/'.$a).".wav'></audio>";
		echo "<audio id='antrian2' src='".base_url('audio/antrian/'.$b).".wav'></audio>";
}
else{ ?>
	<audio id="antrian" src="<?php echo base_url('audio/antrian/'.$antrian.'.wav'); ?>"></audio>
<?php } ?>

<audio id="loket<?php echo $loket->loket; ?>" src="<?php echo base_url('audio/antrian/'.$loket->loket.'.wav'); ?>"></audio>
<audio id="sepuluh" src="<?php echo base_url('audio/antrian/sepuluh.wav'); ?>"></audio>
<audio id="sebelas" src="<?php echo base_url('audio/antrian/sebelas.wav'); ?>"></audio>
<audio id="seratus" src="<?php echo base_url('audio/antrian/seratus.wav'); ?>"></audio>
<audio id="belas" src="<?php echo base_url('audio/antrian/belas.wav'); ?>"></audio>
<audio id="puluh" src="<?php echo base_url('audio/antrian/puluh.wav'); ?>"></audio>
<audio id="ratus" src="<?php echo base_url('audio/antrian/ratus.wav'); ?>"></audio>


	<div class="row">
		<div class="col-md-3">
			<?php
			$lok = $this->db->query("SELECT * FROM loket WHERE id_loket != '$loket->id_loket' LIMIT 0,2")->result();
			foreach ($lok as $l) { ?>
				<div class="box">
					<div class="loket">
						Loket <?php echo $l->loket; ?>
					</div>
					<div>
						<h1 style="color:#000"><?php echo $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $l->id_loket, 'tgl' => date('dmY'), 'id_loket !=' => $loket->id_loket ))->row('no_antrian') ?></h1>
					</div>
				</div>
			<?php
		}
			?>
		</div>
		<div class="col-md-6">
			<?php
				//echo $this->session->flashdata('pesan');
			?>
			<div class="box">
				<div class="loket">
					Loket <?php echo $loket->loket; ?>
				</div>
				<div class="agenda">
					<h1 id="a"><?php echo $antrian; ?></h1>
						<center>
							<button class="btn panggil" onclick="panggil()"><i class="glyphicon glyphicon-bullhorn"></i> &nbsp;Panggil</button>
							<a href="<?php echo site_url('penjaga/antrian_selanjutnya').'/'.$this->session->userdata('username'); ?>" class="btn selanjutnya" type="submit"><i class="glyphicon glyphicon-play"></i> &nbsp;Antrian Selanjutnya</a>
						</center>
					<br>
				</div>
			</div>
		</div>
		<div class="col-md-3">
		<?php
			$lok = $this->db->query("SELECT * FROM loket WHERE id_loket != '$loket->id_loket' LIMIT 2,2")->result();
			foreach ($lok as $l) { ?>
				<div class="box">
					<div class="loket">
						Loket <?php echo $l->loket; ?>
					</div>
					<div>
						<h1 style="color:#000"><?php echo $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $l->id_loket, 'tgl' => date('dmY'), 'id_loket !=' => $loket->id_loket ))->row('no_antrian') ?></h1>
					</div>
				</div>
			<?php
		}
			?>
		</div>
	</div>
	<script type="text/javascript">
		function panggil(){
			document.getElementById("suarabel").pause();
			document.getElementById("suarabel").currentTime=0;
			document.getElementById("suarabel").play();

			//set delay
			totalWaktu = document.getElementById("suarabel").duration*1000;

			//playnomerurutnya
			setTimeout(function(){
				document.getElementById("suarabelnomorurut").pause()
				;document.getElementById("suarabelnomorurut").currentTime=0;
				document.getElementById("suarabelnomorurut").play();
			}, totalWaktu);
			totalWaktu=totalWaktu+1000;

			<?php
			if($antrian < 10){ ?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			<?php }
			elseif($antrian == 10){ ?>
				setTimeout(function(){
					document.getElementById("sepuluh").pause();
					document.getElementById("sepuluh").currentTime=0;
					document.getElementById("sepuluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			<?php }

			elseif($antrian == 11){ ?>
				setTimeout(function(){
					document.getElementById("sebelas").pause();
					document.getElementById("sebelas").currentTime=0;
					document.getElementById("sebelas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			
			<?php } 

			else if($antrian > 11 && $antrian < 20){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;

				setTimeout(function(){
					document.getElementById("belas").pause();
					document.getElementById("belas").currentTime=0;
					document.getElementById("belas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			
			<?php }

			else if($antrian == 20){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			
			<?php }
			else if($antrian > 20 && $antrian < 100){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian == 100){ ?>

				setTimeout(function(){
					document.getElementById("seratus").pause();
					document.getElementById("seratus").currentTime=0;
					document.getElementById("seratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		

		<?php
		}
		else if ($antrian > 100 && $antrian < 110) { ?>
				setTimeout(function(){
					document.getElementById("seratus").pause();
					document.getElementById("seratus").currentTime=0;
					document.getElementById("seratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian == 110){ ?>

				setTimeout(function(){
					document.getElementById("seratus").pause();
					document.getElementById("seratus").currentTime=0;
					document.getElementById("seratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		
				setTimeout(function(){
					document.getElementById("sepuluh").pause();
					document.getElementById("sepuluh").currentTime=0;
					document.getElementById("sepuluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian == 111){ ?>

				setTimeout(function(){
					document.getElementById("seratus").pause();
					document.getElementById("seratus").currentTime=0;
					document.getElementById("seratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		
				setTimeout(function(){
					document.getElementById("sebelas").pause();
					document.getElementById("sebelas").currentTime=0;
					document.getElementById("sebelas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian > 111 && $antrian < 120){ ?>

				setTimeout(function(){
					document.getElementById("seratus").pause();
					document.getElementById("seratus").currentTime=0;
					document.getElementById("seratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
				
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("belas").pause();
					document.getElementById("belas").currentTime=0;
					document.getElementById("belas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian > 119 && $antrian < 200){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian > 199 && $antrian < 210){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("ratus").pause();
					document.getElementById("ratus").currentTime=0;
					document.getElementById("ratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian == 210){ 
				?>
				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("ratus").pause();
					document.getElementById("ratus").currentTime=0;
					document.getElementById("ratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("sepuluh").pause();
					document.getElementById("sepuluh").currentTime=0;
					document.getElementById("sepuluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian == 211){ ?>

				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		
				setTimeout(function(){
					document.getElementById("ratus").pause();
					document.getElementById("ratus").currentTime=0;
					document.getElementById("ratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("sebelas").pause();
					document.getElementById("sebelas").currentTime=0;
					document.getElementById("sebelas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian > 211 && $antrian < 220){ ?>

				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
				
				setTimeout(function(){
					document.getElementById("ratus").pause();
					document.getElementById("ratus").currentTime=0;
					document.getElementById("ratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("belas").pause();
					document.getElementById("belas").currentTime=0;
					document.getElementById("belas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		else if($antrian > 219 && $antrian < 1000){ ?>

				setTimeout(function(){
					document.getElementById("antrian").pause();
					document.getElementById("antrian").currentTime=0;
					document.getElementById("antrian").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
				
				setTimeout(function(){
					document.getElementById("ratus").pause();
					document.getElementById("ratus").currentTime=0;
					document.getElementById("ratus").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian1").pause();
					document.getElementById("antrian1").currentTime=0;
					document.getElementById("antrian1").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					document.getElementById("antrian2").pause();
					document.getElementById("antrian2").currentTime=0;
					document.getElementById("antrian2").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
		<?php
		}
		?>

			totalwaktu=totalWaktu+1000;
			setTimeout(function() {
							document.getElementById('diloket').pause();
							document.getElementById('diloket').currentTime=0;
							document.getElementById('diloket').play();
						}, totalwaktu);
			
			totalwaktu=totalwaktu+1000;
			setTimeout(function() {
							document.getElementById('loket<?php echo $loket->loket; ?>').pause();
							document.getElementById('loket<?php echo $loket->loket; ?>').currentTime=0;
							document.getElementById('loket<?php echo $loket->loket; ?>').play();
						}, totalwaktu);	
		}

	</script>