<?php

Class Stok_motor extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->Model('Model_Stok_motor');
		
	}

	function index(){
		$data['motor'] = $this->db->get('motor')->result();
		$this->template->load('template', 'stok_motor/list',$data);
	}

	function add(){
		if(isset($_POST['submit'])){
			$this->Model_Stok_motor->add();
			$js=1;
			$this->session->set_flashdata('js',$js);
			//echo $this->session->set_flashdata('Berhasil','Berhasil Menambahkan pelanggan.....');
			redirect('Admin/Stok_motor');

		}
		else{
			$js=3;
			$this->template->load('template','stok_motor/list');
		}
	}

	function edit() {
        if (isset($_POST['edit'])) {
        	$nomor_motor = $this->uri->segment(4);
            $this->Model_Stok_motor->edit($nomor_motor);
            redirect('Admin/Stok_motor');
        } else {
            $id = $this->uri->segment(4);
            $data['motor'] = $this->db->get_where('motor', array('nomor_motor' => $id))->row_Array();
            $this->template->load('template', 'stok_motor/edit', $data);
        }
    }

    function hapus() {
        $id = $this->uri->segment(4);
        $this->db->where('nomor_motor', $id);
        $this->db->delete('motor');
        redirect('Admin/Stok_motor');
    }

}
?>