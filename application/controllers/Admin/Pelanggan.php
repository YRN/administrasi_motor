<?php

Class Pelanggan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->Model('Model_pelanggan');
		$this->load->Model('Model_transaksi_cash');

		
	}

	function index(){
		$data['pelanggan'] = $this->db->get('pelanggan')->result();
		$this->template->load('template', 'pelanggan/list',$data);
	}

	function add(){
		if(isset($_POST['submit'])){
			$this->Model_pelanggan->add();
			$js=1;
			$this->session->set_flashdata('js',$js);
			//echo $this->session->set_flashdata('Berhasil','Berhasil Menambahkan pelanggan.....');
			redirect('Admin/Pelanggan');

		}
		else{
			$js=3;
			$this->template->load('template','pelanggan/list');
		}
	}

	function edit() {
        if (isset($_POST['edit'])) {
        	$nomor_pelanggan = $this->uri->segment(4);
            $this->Model_pelanggan->edit($nomor_pelanggan);
            redirect('Admin/Pelanggan');
        } else {
            $id = $this->uri->segment(4);
            $data['pelanggan'] = $this->db->get_where('pelanggan', array('nomor_pelanggan' => $id))->row_Array();
            $this->template->load('template', 'pelanggan/edit', $data);
        }
    }

    function hapus() {
        $id = $this->uri->segment(4);
        $this->db->where('nomor_pelanggan', $id);
        $this->db->delete('pelanggan');
        redirect('Admin/Pelanggan');
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->Model_transaksi_cash->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }

}
?>