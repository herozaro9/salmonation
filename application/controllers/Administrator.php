<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == false) { 
			redirect('/', 'refresh');
		}
	}
	private function load($title = '', $datapath = '')
	{
		$notification = $this->db->query("SELECT * FROM notification ORDER BY notification_id DESC LIMIT 5")->result_array();
		$page = array(
			"css" => $this->load->view('dashboard/template/main_css', array("title" => $title), true),
			"header" => $this->load->view('dashboard/template/header', array("notification" => $notification), true),
			"js" => $this->load->view('dashboard/template/main_js', false, true),
			"footer" => $this->load->view('dashboard/template/footer', false, true),
			"sidebar" => $this->load->view('dashboard/template/sidebar', false, true)
		);
		return $page;
	}

	public function index()
	{	
		$path = "";
		$datasend = array(
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Dashboard", $path),
			"content" =>$this->load->view('dashboard/index', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function news()
	{	
		$path = "";
		$datasend = array(
			"total" => $this->db->query("SELECT COUNT('news_id') as total FROM news")->result_array(),
			"aktif" => $this->db->query("SELECT COUNT('news_id') as total FROM news WHERE status='Aktif'")->result_array(),
			"nonaktif" => $this->db->query("SELECT COUNT('news_id') as total FROM news WHERE status='Tidak Aktif'")->result_array(),
			"all" => $this->db->query("SELECT * FROM news ORDER BY news_id DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("News Blog", $path),
			"content" =>$this->load->view('dashboard/news', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function registration()
	{	
		$path = "";
		$datasend = array(
			"total" => $this->db->query("SELECT COUNT('registration_id') as total FROM registration")->result_array(),
			"pending" => $this->db->query("SELECT COUNT('registration_id') as total FROM registration WHERE status='Pending'")->result_array(),
			"followup" => $this->db->query("SELECT COUNT('registration_id') as total FROM registration WHERE status='Follow Up'")->result_array(),
			"end" => $this->db->query("SELECT COUNT('registration_id') as total FROM registration WHERE status='Finished'")->result_array(),
			"all" => $this->db->query("SELECT * FROM registration ORDER BY time_submit DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Registration", $path),
			"content" =>$this->load->view('dashboard/registration', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function jointeam()
	{	
		$path = "";
		$datasend = array(
			"total" => $this->db->query("SELECT COUNT('join_id') as total FROM join_team")->result_array(),
			"pending" => $this->db->query("SELECT COUNT('join_id') as total FROM join_team WHERE status='Pending'")->result_array(),
			"followup" => $this->db->query("SELECT COUNT('join_id') as total FROM join_team WHERE status='Follow Up'")->result_array(),
			"end" => $this->db->query("SELECT COUNT('join_id') as total FROM join_team WHERE status='Finished'")->result_array(),
			"all" => $this->db->query("SELECT * FROM join_team ORDER BY time_submit DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Join Team", $path),
			"content" =>$this->load->view('dashboard/jointeam', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function team()
	{	
		$path = "";
		$datasend = array(
			"all" => $this->db->query("SELECT * FROM team ORDER BY order_position DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Team", $path),
			"content" =>$this->load->view('dashboard/team', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function schedule()
	{	
		$date = date('Y-m-d');
		$path = "";
		$datasend = array(
			"total" => $this->db->query("SELECT COUNT('calendar_id') as total FROM calendar")->result_array(),
			"commingsoon" => $this->db->query("SELECT COUNT('calendar_id') as total FROM calendar WHERE schedule > '$date'")->result_array(),
			"missed" => $this->db->query("SELECT COUNT('calendar_id') as total FROM calendar WHERE schedule < '$date'")->result_array(),
			"all" => $this->db->query("SELECT * FROM calendar ORDER BY schedule DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Schedule", $path),
			"content" =>$this->load->view('dashboard/schedule', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function user()
	{	
		if($this->session->userdata('role') == 'Admin'){
			$path = "";
			$user_id = $this->session->userdata('id');
			$datasend = array(
				"totaluser" => $this->db->query("SELECT COUNT('user_id') as total FROM user WHERE role='User'")->result_array(),
				"totaladmin" => $this->db->query("SELECT COUNT('user_id') as total FROM user WHERE role='Admin'")->result_array(),
				"aktif" => $this->db->query("SELECT COUNT('user_id') as total FROM user WHERE status='Aktif'")->result_array(),
				"nonaktif" => $this->db->query("SELECT COUNT('user_id') as total FROM user WHERE status='Tidak Aktif'")->result_array(),
				"all" => $this->db->query("SELECT * FROM user WHERE user_id!='$user_id' ORDER BY user_id DESC")->result_array(),
				'csrf_name' => $this->security->get_csrf_token_name(),
            	'csrf_hash' => $this->security->get_csrf_hash()
			);
			$data = array(
				"page" => $this->load("User", $path),
				"content" =>$this->load->view('dashboard/user', $datasend, true)
			);
			$this->load->view('dashboard/template/template', $data);
		}else{
			redirect('/', 'refresh');
		}
	}

	public function video()
	{	
		$path = "";
		$user_id = $this->session->userdata('id');
		$datasend = array(
			"totalvideo" => $this->db->query("SELECT COUNT('video_id') as total FROM video")->result_array(),
			"aktif" => $this->db->query("SELECT COUNT('video_id ') as total FROM video WHERE status='Aktif'")->result_array(),
			"nonaktif" => $this->db->query("SELECT COUNT('video_id ') as total FROM video WHERE status='Tidak Aktif'")->result_array(),
			"all" => $this->db->query("SELECT * FROM video ORDER BY video_id DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
        	'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Video", $path),
			"content" =>$this->load->view('dashboard/video', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}

	public function notification()
	{	
		$path = "";
		$datasend = array(
			"all" => $this->db->query("SELECT * FROM notification ORDER BY notification_id DESC")->result_array(),
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$data = array(
			"page" => $this->load("Notification", $path),
			"content" =>$this->load->view('dashboard/notification', $datasend, true)
		);
		$this->load->view('dashboard/template/template', $data);
	}
}