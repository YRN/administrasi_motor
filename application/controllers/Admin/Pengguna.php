<?php

Class Pengguna extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->Model('Model_pelanggan');
    }

    function load(){
        $id = $this->session->userdata('id');
        $data['guru'] = $this->db->get_where('user', array('id' => $id))->row_Array();
        $this->template->load('template', 'admin/dashbord',$data);

    }

    function update(){
       
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                );
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user', $data);
                redirect('Admin/Dashboard');

    }


}
   
?>