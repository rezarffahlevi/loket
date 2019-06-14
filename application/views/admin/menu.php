
		<ul id="user">
			<li>Hi <?php echo $this->session->userdata('nama'); ?></li>
		</ul>
		<ul id="menu">
			<li><a href="<?php echo site_url('admin/instansi/'); ?>">Instansi</a></li>
			<li><a href="<?php echo site_url('admin/loket/'); ?>">Loket</a></li>
			<li><a href="<?php echo site_url('admin/karyawan/'); ?>">Karyawan</a></li>
			<li><a href="<?php echo site_url('admin/agenda/'); ?>">Agenda</a></li>
			<li><a href="<?php echo site_url('admin/text_jalan/'); ?>">Text Jalan</a></li>
			<li><a href="<?php echo site_url('admin/'); ?>">Laporan</a></li>
			<li><a href="<?php echo site_url('welcome/logout'); ?>">Logout</a></li>
		</ul>
		<ul id="list">
			<li><i class="glyphicon glyphicon-list"></i></li>
		</ul>
		<ul id="list1">
			<li><i class="glyphicon glyphicon-list"></i></li>
		</ul>
		<script type="text/javascript">
			$(function(){
				//$('#menu').show();
				$('#list1').hide();

				$('#list').click(function(){
					$('#menu').show();
					$('#list').hide();
					$('#list1').show();
				})
				$('#list1').click(function(){
					$('#menu').hide();
					$('#list').show();
					$('#list1').hide();
				})
			})

			function menuu(){
				$('#menu').hide();

			}
		</script>