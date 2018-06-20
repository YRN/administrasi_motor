<?php
 
Class Model_transaksi_cash extends CI_model{

	function add(){


		$last_id = $this->db->count_all_results('transaksi_cash');
		$last_id = $last_id +1;

		$data = array(

			'nomor_transaksi_cash'  => 'C'.$last_id,
			'nomor_pelanggan'    	=> $this->find_idPelanggan($this->input->post('nama_pelanggan')),
			'nomor_motor'    		=>  $this->find_idMotor($this->input->post('nama_motor')),
			'tanggal_transaksi'       => $this->input->post('tanggal_transaksi_cash'),
			'harga_motor'           => $this->input->post('harga_motor'),
		);
		$this->db->insert('transaksi_cash',$data);


		
	}

	function edit($id){
       
		$data = array(

			'nomor_pelanggan'    => $this->find_idPelanggan($this->input->post('nama_pelanggan')),
			'nomor_motor'    => $this->find_idMotor($this->input->post('nama_motor')),
			'tanggal_transaksi'        => $this->input->post('tanggal_transaksi_cash'),
		);
		
       
       $this->db->where('nomor_transaksi_cash',$id);
       $this->db->update('transaksi_cash',$data);
    }


      function search_namaPelanggan($title){
        $this->db->like('nama', $title , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pelanggan')->result();
    }

    function search_namaMotor($title){
        $this->db->like('nama_motor', $title , 'both');
        $this->db->where('status_motor', 'belum laku');
        $this->db->order_by('nama_motor', 'ASC');
        $this->db->limit(10);
        return $this->db->get('motor')->result();
    }

    function find_idPelanggan($nama_pelanggan){
    	
    	$data = $this->db->get_where('pelanggan', array('nama' => $nama_pelanggan,))->row_Array();
    	return $data['nomor_pelanggan'];
    }


    function find_idmotor($nama_motor){
    	$data = $this->db->get_where('motor', array('nama_motor' => $nama_motor))->row_Array();
    	return $data['nomor_motor'];
    }
	
    function editStatusMotor($nomor_motor){

       $this->db->from('motor');
       $this->db->where('nomor_motor',$nomor_motor);

       $query = $this->db->get();
       $data = $query->row_Array();

       $value = $data['status_motor'];

       if($value == 'sudah laku'){
            $change_data = array(

                'status_motor' => 'belum laku'
            );
       }
       else if($value == 'belum laku'){
           $change_data = array(

                'status_motor' => 'sudah laku'
            );
       }

        $this->db->where('nomor_motor',$nomor_motor);
        $this->db->update('motor',$change_data);


       

    }




}

?>