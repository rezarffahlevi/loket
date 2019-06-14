<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('M_crud');
		$this->load->library('pagination');
		$this->load->library('upload');
		if($this->session->userdata('level') !== 'Admin'){
			redirect('welcome/');
		}
	}
	public function index($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/laporan';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$config['base_url'] 		= site_url('admin/index');
		$config['total_rows']	 	= $this->M_crud->get_group_id('transaksi', 'tgl')->num_rows();
		$config['per_page']			= '6';
		$config['num_links']		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close']	= '</ul>';
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="prev">';
		$config['porev_tag_close']	= '</li>';
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		// buat pagination
		$data['halaman'] = $this->pagination->create_links();
		$data['hasil'] = $this->M_crud->fetch_data('transaksi', 'tgl', $config['per_page'], $id);
		$this->load->view('layout', $data);
	}

	public function agenda($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/agenda';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$config['base_url'] 		= site_url('admin/agenda/');
		$config['total_rows']	 	= $this->M_crud->get_group_id('agenda', 'id_agenda')->num_rows();
		$config['per_page']			= '7';
		$config['num_links']		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close']	= '</ul>';
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="prev">';
		$config['porev_tag_close']	= '</li>';
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		// buat pagination
		$data['halaman'] = $this->pagination->create_links();
		$data['hasil'] = $this->M_crud->fetch_data('agenda', 'id_agenda', $config['per_page'], $id);

		$this->load->view('layout', $data);
	}

	public function karyawan($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['loket'] = $this->M_crud->show('loket', 'loket ASC');
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/karyawan';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$config['base_url'] 		= site_url('admin/karyawan');;
		$config['total_rows']	 	= $this->M_crud->get_group_id('karyawan', 'username')->num_rows();
		$config['per_page']			= '7';
		$config['num_links']		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close']	= '</ul>';
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="prev">';
		$config['porev_tag_close']	= '</li>';
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		// buat pagination
		$data['halaman'] = $this->pagination->create_links();
		$data['hasil'] = $this->M_crud->fetch_data('karyawan', 'username', $config['per_page'], $id);

		$this->load->view('layout', $data);
	}

	public function loket($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/loket';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$config['base_url'] 		= site_url('admin/loket/');;
		$config['total_rows']	 	= $this->M_crud->get_group_id('loket', 'id_loket')->num_rows();
		$config['per_page']			= '7';
		$config['num_links']		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close']	= '</ul>';
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="prev">';
		$config['porev_tag_close']	= '</li>';
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		// buat pagination
		$data['halaman'] = $this->pagination->create_links();
		$data['hasil'] = $this->M_crud->fetch_data('loket', 'id_loket', $config['per_page'], $id);

		$this->load->view('layout', $data);
	}

	public function instansi($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/instansi';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$data['hasil'] = $this->M_crud->show('instansi', 'id_instansi DESC')->result();

		$this->load->view('layout', $data);
	}

	public function text_jalan($id=null)
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		//$data['perhari'] = $this->M_crud->get_group_id('transaksi', 'tgl')->result();
		$data['content'] = 'admin/text_jalan';
		$data['menu'] ="admin/menu";
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$config['base_url'] 		= site_url('admin/text_jalan/');
		$config['total_rows']	 	= $this->M_crud->show('text_jalan', 'id_text DESC')->num_rows();
		$config['per_page']			= '7';
		$config['num_links']		= 5;
		$config['full_tag_open']	= '<ul class="pagination">';
		$config['full_tag_close']	= '</ul>';
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['prev_link']		= '&laquo';
		$config['prev_tag_open']	= '<li class="prev">';
		$config['porev_tag_close']	= '</li>';
		$config['next_link']		= '&raquo';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a href="">';
		$config['cur_tag_close']	= '</a></li>';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';

		$this->pagination->initialize($config);

		// buat pagination
		$data['halaman'] = $this->pagination->create_links();
		$data['hasil'] = $this->M_crud->fetch_data('text_jalan', 'id_text', $config['per_page'], $id);

		$this->load->view('layout', $data);
	}

	public function add_loket(){
		$loket=htmlspecialchars($this->input->post('loket'));
		$status=htmlspecialchars($this->input->post('status'));
		$cek=$this->M_crud->get_id('loket', array('loket' => $loket))->num_rows();
		if($cek > 0){
			echo "<script>alert('Nama Loket Sudah Ada'); location='".site_url('admin/loket/')."' </script>";
		}
		else{
			$this->M_crud->add('loket',  array('loket' => $loket, 'status' => $status));
			redirect('admin/loket/');
		}
	}
	public function edit_loket($id){
		$loket=htmlspecialchars($this->input->post('loket'));
		$status=htmlspecialchars($this->input->post('status'));
		$where=array('id_loket' => $id);
		$this->M_crud->edit('loket', array('loket' => $loket, 'status' => $status), $where);
		redirect('admin/loket');
	}
	public function del_loket($id){
		$where=array('id_loket' => $id);
		$this->M_crud->del('loket', $where);
		redirect('admin/loket/');
	}
	public function edit_instansi($id){
		$instansi=htmlspecialchars($this->input->post('instansi'));
		$telp=htmlspecialchars($this->input->post('telp'));
		$alamat=htmlspecialchars($this->input->post('alamat'));
		$logo = $_FILES['logo']['name'];
		$where=array('id_instansi' => $id);
		if ($logo!='') {
			$cek = $this->M_crud->get_id('instansi', $where);
			list($txt,$ext) = explode(".", $logo);
			$logo_baru	= "logo_".time().".".$ext;
			$path			= "./media/";

			$config['file_name'] = $logo_baru;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$config['max_size'] = '1050';
			$config['max_width'] = '1024';
			$config['max_height'] = '800';
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('logo')) {
				// pesan error
				echo $path;
				echo $this->upload->display_errors();
				exit;
			}
			else if(file_exists('./media/'.$cek->row('logo'))){
					unlink('./media/'.$cek->row('logo'));
				}
		}
		else{
			$logo_baru	= $this->input->post('logo_lama');
		}
		$data=array('instansi' => $instansi, 'telp' => $telp, 'alamat' => $alamat, 'logo' => $logo_baru);
		$this->M_crud->edit('instansi', $data, $where);
		redirect('admin/instansi');
	}
	public function add_karyawan(){
		$username=$this->input->post('username');
		$nama=$this->input->post('nama');
		$telp=$this->input->post('telp');
		$alamat=$this->input->post('alamat');
		$pass=sha1(md5($this->input->post('password')));
		$level=$this->input->post('level');
		$id_loket =$this->input->post('id_loket');

		$cek=$this->M_crud->get_id('karyawan', array('username' => $username))->num_rows();
		if($cek > 0){
			$this->session->set_flashdata("pesan", "<br><div class='alert alert-danger'>
              		 <p class='text-danger'><center>Username Sudah Ada</center></p></div>");
			redirect('admin/karyawan/');
		}
		else{
			$data=array('username' => $username, 'nama' => $nama, 'telp' => $telp, 'alamat' => $alamat, 'password' => $pass, 'level' => $level, 'id_loket' => $id_loket);
			$this->M_crud->add('karyawan',  $data);
			$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'>
              		 <p class='text-danger'><center>Karyawan berhasil ditambah</center></p></div>");
			redirect('admin/karyawan/');
		}
	}
	public function edit_karyawan(){
		if($this->input->post('password') == ''){
			$pass = $this->input->post('password_lama');
		}
		else{
			$pass = sha1(md5($this->input->post('password')));
		}
		$username = $this->input->post('username');
		$nama = $this->input->post('nama');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$level = $this->input->post('level');

		$data = array('nama' => $nama, 'telp' => $telp, 'alamat' => $alamat, 'password' => $pass, 'level' => $level);
		$where = array('username' => $username);
		$this->M_crud->edit('karyawan', $data, $where);

		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil diupdate</center></div>");
		redirect('admin/karyawan/');
	}
	public function del_karyawan($id){
		$where=array('username' => $id);
		$this->M_crud->del('karyawan', $where);
		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil dihapus</center></div>");
		redirect('admin/karyawan/');
	}
	public function add_agenda(){
		$media=$_FILES['media']['name'];
		if ($media!='') {
			list($txt,$ext) = explode(".", $media);
			$media_baru	= "agenda_".time().".".$ext;
			$path			= "./media/agenda/";

			$config['file_name'] = $media_baru;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$config['max_size'] = '10050';
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('media')) {
				// pesan error
				echo $path;
				echo $this->upload->display_errors();
				exit;
			}
		}
		else{
			$media_baru	= "404.png";
		}
		$agenda = $this->input->post('agenda');

		$data = array('agenda' => $agenda, 'file' => $media_baru);
		$this->M_crud->add('agenda', $data);

		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil ditambah</center></div>");
		redirect('admin/agenda/');
	}

	public function edit_agenda(){
		$id = $this->input->post('id_agenda');
		$where=array('id_agenda' => $id);
		$media=$_FILES['media']['name'];
		if ($media!='') {
			list($txt,$ext) = explode(".", $media);
			$media_baru	= "agenda_".time().".".$ext;
			$path			= "./media/agenda/";

			$config['file_name'] = $media_baru;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$config['max_size'] = '10050';
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('media')) {
				// pesan error
				echo $path;
				echo $this->upload->display_errors();
				exit;
			}
			$cek = $this->M_crud->get_id('agenda', $where);
			if($cek->row('file') != '404.png'){
				if(file_exists('./media/agenda/'.$cek->row('file'))){
					unlink('./media/agenda/'.$cek->row('file'));
				}
			}
		}
		else{
			$media_baru	= $this->input->post('media_lama');
		}
		$agenda = $this->input->post('agenda');
		
		$data = array('agenda' => $agenda, 'file' => $media_baru);
		$this->M_crud->edit('agenda', $data, $where);

		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil diupdate</center></div>");
		redirect('admin/agenda/');
	}

	public function del_agenda($id){
		$where=array('id_agenda' => $id);
		$cek = $this->M_crud->get_id('agenda', $where);
		if(file_exists('./media/agenda/'.$cek->row('file'))){
			unlink('./media/agenda/'.$cek->row('file'));
		}
		$this->M_crud->del('agenda', $where);
		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil dihapus</center></div>");
		redirect('admin/agenda/');
	}

	public function add_text(){
		$media=$_FILES['img']['name'];
		if ($media!='') {
			list($txt,$ext) = explode(".", $media);
			$media_baru	= "text_".time().".".$ext;
			$path			= "./media/agenda/";

			$config['file_name'] = $media_baru;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$config['max_size'] = '10050';
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('img')) {
				// pesan error
				echo $path;
				echo $this->upload->display_errors();
				exit;
			}
		}
		else{
			$media_baru	= "404.png";
		}
		$text = $this->input->post('text');

		$data = array('text' => $text, 'img' => $media_baru);
		$this->M_crud->add('text_jalan', $data);

		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil ditambah</center></div>");
		redirect('admin/text_jalan/');
	}

	public function edit_text(){
		$id = $this->input->post('id_text');
		$where=array('id_text' => $id);
		$media=$_FILES['img']['name'];
		if ($media!='') {
			list($txt,$ext) = explode(".", $media);
			$media_baru	= "text_".time().".".$ext;
			$path			= "./media/agenda/";

			$config['file_name'] = $media_baru;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
			$config['max_size'] = '10050';
			$this->upload->initialize($config);
			if (! $this->upload->do_upload('img')) {
				// pesan error
				echo $path;
				echo $this->upload->display_errors();
				exit;
			}
			$cek = $this->M_crud->get_id('text_jalan', $where);
			if($cek->row('img') != '404.png'){
				if(file_exists('./media/agenda/'.$cek->row('img'))){
					unlink('./media/agenda/'.$cek->row('img'));
				}
			}
		}
		else{
			$media_baru	= $this->input->post('img_lama');
		}
		$text = $this->input->post('text');
		
		$data = array('text' => $text, 'img' => $media_baru);
		$this->M_crud->edit('text_jalan', $data, $where);

		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil diupdate</center></div>");
		redirect('admin/text_jalan/');
	}

	public function del_text($id){
		$where=array('id_text' => $id);
		$cek = $this->M_crud->get_id('text_jalan', $where);
		if(file_exists('./media/agenda/'.$cek->row('img'))){
			unlink('./media/agenda/'.$cek->row('img'));
		}
		$this->M_crud->del('text_jalan', $where);
		$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'><center>Data berhasil dihapus</center></div>");
		redirect('admin/text_jalan/');
	}
}
