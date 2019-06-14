<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjaga extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('M_crud');
		if($this->session->userdata('level') !== 'Penjaga'){
			redirect('welcome/');
		}
	}
	public function index()
	{
		// $data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		// $data['loket'] = $this->M_crud->show('loket', 'loket ASC')->result();
		// $data['content'] = 'pilih_loket';
		// $data['menu'] = 'menu';
		// $data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		// $this->load->view('layout', $data);
		redirect('penjaga/loket/');
	}
	public function loket()
	{
		$id = $this->session->userdata('loket');
		$data['instansi'] = $this->M_crud->show('instansi', 'id_instansi DESC')->row();
		$data['agenda'] = $this->M_crud->show('agenda', 'id_agenda DESC')->row();
		$data['loket'] = $this->M_crud->get_id('loket', array('id_loket' => $id))->row();
		
		$data['antrian'] = $this->M_crud->get_max_id('transaksi', 'no_antrian', array('id_loket' => $id, 'username' => $this->session->userdata('username'), 'tgl' => date('dmY')))->row();
		$where =array('id_loket <' => 1, 'tgl' => date('dmY'));
		$data['cek'] = $this->M_crud->get_id('transaksi', $where)->result();
		$data['content'] = 'penjaga';
		$data['menu'] = 'menu';
		$data['text_jalan'] = $this->M_crud->show('text_jalan', 'id_text DESC')->result();
		$this->load->view('layout', $data);
	}
	public function antrian_selanjutnya(){
		$tgl = date('dmY');
		$where =array('id_loket <' => 1, 'tgl' => $tgl);
		$antrian = $this->M_crud->get_id('transaksi', $where, 'no_antrian DESC');;
		$data=array('no_antrian' => $antrian->row('no_antrian'), 'id_loket' => $this->session->userdata('loket'), 'username' => $this->session->userdata('username'), 'tgl' => $tgl);
		//$this->M_crud->del('transaksi', array('no_antrian' => $antrian));
		$w=array('id_transaksi' => $antrian->row('id_transaksi'));
		$this->M_crud->edit('transaksi', $data, $w);
		redirect('penjaga/loket/');
	}
}
