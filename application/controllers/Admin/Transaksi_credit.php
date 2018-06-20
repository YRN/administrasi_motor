<?php

Class Transaksi_credit extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->template->load('template', 'guru/list');
	}

}
?>