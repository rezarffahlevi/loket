<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('M_crud');
	}
	public function index()
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['agenda'] = $this->M_crud->slide('0,1');
		$data['agenda1'] = $this->M_crud->slide('1,10');
		$data['loket'] = $this->M_crud->show('loket', 'loket ASC')->result();
		$data['content'] = 'home';
		$data['menu'] = 'menu';
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$this->load->view('layout', $data);
	}
	public function antrian()
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['agenda'] = $this->M_crud->show('agenda', 'id_agenda DESC')->row();
		$data['loket'] = $this->M_crud->show('loket', 'loket ASC')->result();
		$data['content'] = 'antrian';
		$where =array('tgl' => date('dmY'));
		$data['antrian'] = $this->M_crud->get_max_id('transaksi', 'no_antrian', $where);
		$data['menu'] = 'menu';
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$this->load->view('layout', $data);
	}
	public function login()
	{
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['content'] = 'login';
		$data['menu'] = 'menu';
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$this->load->view('layout', $data);
		$this->session->sess_destroy();
	}
	public function validasi(){
		$user = $this->input->post('username');
		$pass = sha1(md5($this->input->post('password')));
		$cek = $this->M_crud->get_id('karyawan', array('username' => $user));
		if($cek->num_rows() > 0){
			if($cek->row('password') == $pass){
				$cek1 = $this->M_crud->get_id('loket', array('id_loket' => $cek->row('id_loket')));
				if($cek1->row('status')== 1){
					echo "<br><center><h1><div class='alert alert-danger'>
	              		 <p class='text-danger'>Status loket anda sedang digunakan</b></p></div></h1>
	              		 <a href='".site_url('welcome/login')."'>Kembali</a>
	              		 </center>";
				}
				else{
					$session = array('username' => $cek->row('username'), 'nama' => $cek->row('nama'), 'level' => $cek->row('level'), 'loket' => $cek->row('id_loket'));
					$this->session->set_userdata($session);
					$this->session->set_flashdata("pesan", "<br><div class='alert alert-success'>
	              		 <p class='text-danger'>Selamat datang <b>".$this->session->userdata('nama')."</b></p></div>");
					if($this->session->userdata('level') == 'Admin'){
						redirect('admin/');
					}
					else{
						$this->M_crud->edit('loket', array('status' => 1), array('id_loket' => $cek->row('id_loket')));
						redirect('penjaga/');
					}
				}
			}
			else{
				$this->session->set_flashdata("pesan", "<div class='alert alert-danger'>
              		 <p class='text-danger'>Password tidak sesuai</p></div>");
				redirect('welcome/login/');
			}
		}
		else{
			$this->session->set_flashdata("pesan", "<div class='alert alert-danger'>
               <p class='text-danger'>Username tidak ditemukan</p></div>");
			redirect('welcome/login/');
		}

	}
	public function logout(){
		if($this->session->userdata('level') == 'Penjaga'){
			
			$this->M_crud->edit('loket', array('status' => 0), array('id_loket' => $this->session->userdata('loket')));
		}
		$this->session->sess_destroy();
		redirect('welcome/');
	}

	public function tambah_antrian($id){
		$no_antrian = $id+1;
		$tgl = date('dmY');
		$cek = $this->M_crud->get_id('transaksi', array('no_antrian' => $no_antrian, 'tgl' => $tgl))->num_rows();
		if($cek > 0){	
			redirect('welcome/antrian/');
		}
		else{
			$this->M_crud->add('transaksi', array('no_antrian' => $no_antrian, 'tgl' => $tgl));
		}
		redirect('welcome/printini/');
	}

	public function printini(){
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['menu'] = 'menu';
		$data['content'] = 'print';
		$where =array('tgl' => date('dmY'));
		$data['antrian'] = $this->M_crud->get_max_id('transaksi', 'no_antrian', $where);
		$this->load->view('layout', $data);
	}
	public function get_antri(){
		$id_loket = $this->input->post('id_loket');
		$antri = $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $id_loket, 'tgl' => date('dmY')))->row('no_antrian');
		if($antri > 0){
			echo $antri;
		}
		else{
			echo "&nbsp;";
		}
	}
}
