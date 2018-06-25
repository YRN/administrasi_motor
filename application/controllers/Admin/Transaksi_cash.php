<?php

Class Transaksi_cash extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->Model('Model_transaksi_cash');
		
	}

	function index(){
		$data['transaksi_cash'] = $this->db->query('SELECT transaksi_cash.nomor_transaksi_cash, pelanggan.nama, motor.nama_motor,            transaksi_cash.tanggal_transaksi, motor.harga_motor
                                                    FROM ((transaksi_cash
                                                    INNER JOIN pelanggan ON transaksi_cash.nomor_pelanggan = pelanggan.nomor_pelanggan)
                                                    INNER JOIN motor ON transaksi_cash.nomor_motor = motor.nomor_motor)
                                                    ORDER BY transaksi_cash.nomor_transaksi_cash ASC')->result();
		$this->template->load('template', 'transaksi_cash/list',$data);
	}

	function add(){
		if(isset($_POST['submit'])){
			$this->Model_transaksi_cash->add();
            $this->Model_transaksi_cash->editStatusMotor($this->Model_transaksi_cash->find_idmotor($this->input->post('nama_motor')));
			$js=1;
			$this->session->set_flashdata('js',$js);
			//echo $this->session->set_flashdata('Berhasil','Berhasil Menambahkan pelanggan.....');
			redirect('Admin/Transaksi_cash');

		}
		else{
			$js=3;
			$this->template->load('template','transaksi_cash/list');
		}
	}

	function edit() {

        if (isset($_POST['edit'])) {
        	$nomor_transaksi_cash = $this->uri->segment(4);
            $this->Model_transaksi_cash->edit($nomor_transaksi_cash);
            $this->Model_transaksi_cash->editStatusMotor($this->Model_transaksi_cash->find_idmotor($this->input->post('nama_motor')));
            redirect('Admin/Transaksi_cash');
        } else {
            $id = $this->uri->segment(4);
            //$data['transaksi_cash'] = $this->db->get_where('transaksi_cash', array('nomor_transaksi_cash' => $id))->row_Array();
            $data['transaksi_cash'] = $this->db->query("SELECT transaksi_cash.nomor_transaksi_cash, pelanggan.nama, motor.nama_motor,            transaksi_cash.tanggal_transaksi
                                                    FROM ((transaksi_cash
                                                    INNER JOIN pelanggan ON transaksi_cash.nomor_pelanggan = pelanggan.nomor_pelanggan)
                                                    INNER JOIN motor ON transaksi_cash.nomor_motor = motor.nomor_motor)
                                                    WHERE transaksi_cash.nomor_transaksi_cash = '$id' ")->row_Array();
            $this->template->load('template', 'transaksi_cash/edit', $data);
        }
    }

    function hapus() {
        $id = $this->uri->segment(4);
        $this->Model_transaksi_cash->editStatusMotorSudahLaku($this->Model_transaksi_cash->findNomorMotor($id));
        $this->db->where('nomor_transaksi_cash', $id);
        $this->db->delete('transaksi_cash');
        redirect('Admin/transaksi_cash');
    }

   function get_autocomplete_namaPelanggan(){
        if (isset($_GET['term'])) {
            $result = $this->Model_transaksi_cash->search_namaPelanggan($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
           
        }
    }

    function get_autocomplete_namaMotor(){
        if (isset($_GET['term'])) {
            $result = $this->Model_transaksi_cash->search_namaMotor($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_motor;
                echo json_encode($arr_result);
            }
             else{
                $arr_result[] = "silahkan masukan data motor di menu stok motor";
                echo json_encode($arr_result);
            }
        }
    }

    function edit_status_motor() {
         header('Content-Type: application/json');
        $nama_motor = $this->uri->segment(4);
      //  $hasil = $this->Model_transaksi_cash->editStatusMotorSudahLaku($this->Model_transaksi_cash->findNomorMotor($nama_motor));
        $this->Model_transaksi_cash->editStatusMotorSudahLaku($this->Model_transaksi_cash->findNomorMotor($nama_motor));

        /*if($hasil == true){
            $data['status'] = 'betul';
        }
        else if($hasil == false){
            $data['status'] = 'salah';

        }
        echo json_encode($data);*/
    }



}
?>