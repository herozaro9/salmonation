<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	private function load($title = '', $datapath = '')
	{
		$page = array(
			"css" => $this->load->view('template/main_css', array("title" => $title), true),
			"header" => $this->load->view('template/header', false, true),
			"js" => $this->load->view('template/main_js', false, true),
			"footer" => $this->load->view('template/footer', false, true)
		);
		return $page;
	}

	public function index()
	{
		$path = "";
		$datasend = array();
		$data = array(
			"page" => $this->load("Salmonation", $path),
			"content" =>$this->load->view('index', $datasend, true)
		);
		$this->load->view('template/template', $data);
	}
}
