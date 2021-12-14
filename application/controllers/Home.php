<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	private function load($title = '', $datapath = '')
	{
		$js = array(
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);

		$page = array(
			"css" => $this->load->view('template/main_css', array("title" => $title), true),
			"header" => $this->load->view('template/header', false, true),
			"js" => $this->load->view('template/main_js', $js, true),
			"footer" => $this->load->view('template/footer', false, true)
		);
		return $page;
	}

	public function index()
	{
		$path = "";
		$date = date('Y-m-d');
		$datasend = array(
			"team" => $this->db->query("SELECT * FROM team WHERE status='Aktif' ORDER BY order_position DESC")->result_array(),
			"blog" => $this->db->query("SELECT * FROM news WHERE status='Aktif' ORDER BY news_id DESC limit 6")->result_array(),
			"video" => $this->db->query("SELECT * FROM video WHERE status='Aktif' ORDER BY video_id DESC limit 3")->result_array(),
			"calendar" => $this->db->query("SELECT * FROM calendar WHERE schedule > '$date' ORDER by schedule DESC limit 6")->result_array(),
			"calendarmodal" => $this->db->query("SELECT * FROM calendar WHERE schedule > '$date' ORDER by schedule DESC limit 6")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Salmonation", $path),
			"content" =>$this->load->view('index', $datasend, true)
		);
		$this->load->view('template/template', $data);
	}

	public function news($slug)
	{
		$path = "";
		$news = $this->db->query("SELECT * FROM news WHERE slug='$slug' ORDER BY news_id DESC LIMIT 1")->result_array();
		if(!empty($news[0])){
			$datasend = array(
				"othernews" => $this->db->query("SELECT * FROM news ORDER BY news_id DESC LIMIT 6")->result_array(),
				"news" => $news[0],
				'csrf_name' => $this->security->get_csrf_token_name(),
	            'csrf_hash' => $this->security->get_csrf_hash()
			);
			$data = array(
				"page" => $this->load($news[0]['title'], $path),
				"content" =>$this->load->view('news', $datasend, true)
			);
			$this->load->view('template/template', $data);
		}else{
			redirect('/', 'refresh');
		}
	}

	public function addregistation()
	{	
		date_default_timezone_set("Asia/Jakarta");
		$name = $this->clean($this->input->post('name'));
		$mail = $this->clean($this->input->post('mail'));
		$phone = $this->clean($this->input->post('phone'));
		$telegram = $this->clean($this->input->post('telegram'));
		$project = $this->clean($this->input->post('project'));
		$description = $this->clean($this->input->post('description'));
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO registration(name, mail, phone, description, time_submit, status, telegram, project) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$bind = array($name, $mail, $phone, $description, $date, 'Pending', $telegram, $project);
		$insert = $this->db->query($query, $bind);
		if($insert){
			echo json_encode("ok");
		}else{
			echo json_encode("Failed Insert Data!!");
		}
	}

	public function addjointeam()
	{	
		date_default_timezone_set("Asia/Jakarta");
		$name = $this->clean($this->input->post('name'));
		$mail = $this->clean($this->input->post('mail'));
		$phone = $this->clean($this->input->post('phone'));
		$telegram = $this->clean($this->input->post('telegram'));
		$project = $this->clean($this->input->post('project'));
		$description = $this->clean($this->input->post('description'));
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO join_team(name, mail, phone, description, time_submit, status, telegram, project) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$bind = array($name, $mail, $phone, $description, $date, 'Pending', $telegram, $project);
		$insert = $this->db->query($query, $bind);
		if($insert){
			echo json_encode("ok");
		}else{
			echo json_encode("Failed Insert Data!!");
		}
	}

	function clean($str)
	{
		$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
		$t = htmlentities($t, ENT_QUOTES, "UTF-8");
		return $t;
	}
}
