<?php
 
Class Model_pelanggan extends CI_model{

	function add(){

		$last_id = $this->db->count_all_results('pelanggan');
		$last_id = $last_id +1;

		$data = array(

			'nama'             => $this->input->post('nama'),
			'nomor_pelanggan'  => 'P'.$last_id,
			'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
			'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
			'pekerjaan'        => $this->input->post('pekerjaan'),
			'alamat'           => $this->input->post('alamat'),
			'no_telepon'       => $this->input->post('no_telepon')
		);
		$this->db->insert('pelanggan',$data);
		
	}

	function edit($id){
        $data = array(
            'nama'             => $this->input->post('nama'),
			'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
			'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
			'pekerjaan'        => $this->input->post('pekerjaan'),
			'alamat'           => $this->input->post('alamat'),
			'no_telepon'       => $this->input->post('no_telepon')

        );
       
       $this->db->where('nomor_pelanggan',$id);
       $this->db->update('pelanggan',$data);
    }
		




}

?>