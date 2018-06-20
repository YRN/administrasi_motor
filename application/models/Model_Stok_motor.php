<?php 
Class Model_stok_motor extends CI_model{

	function add(){

		$last_id = $this->db->count_all_results('motor');
		$last_id = $last_id +1;

		$data = array(
			'nomor_motor'  => 'MTR'.$last_id,
			'nama_motor' =>$this->input->post('nama_motor'),
			'produsen_motor'    => $this->input->post('produsen_motor'),
			'harga_motor'    => $this->input->post('harga_motor'),
			'status_motor' => 'belum laku'
		);
		$this->db->insert('motor',$data);
		
	}

	function edit($id){
       $data = array(
			'nama_motor' =>$this->input->post('nama_motor'),
			'produsen_motor'    => $this->input->post('produsen_motor'),
			'harga_motor'    => $this->input->post('harga_motor')
		);
       
       $this->db->where('nomor_motor',$id);
       $this->db->update('motor',$data);
    }
		




}

?>