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

	public function allnews()
    {
        $config['base_url'] = site_url('blog');
        $this->db->from('news');
        $this->db->where('status', 'Aktif');
        $countdata = $this->db->count_all_results();
        $config['total_rows'] = $countdata;
        $config['per_page'] = 9;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $datasend['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $datasend['data'] = $this->get_data_list($config["per_page"], $datasend['page']);

        $datasend['pagination'] = $this->pagination->create_links();
        $path = "";
        $data2 = array(
            "page" => $this->load("Blog", $path),
			"content" =>$this->load->view('allnews', $datasend, true)
        );
        $this->load->view('template/template', $data2);
    }

    public function get_data_list($limit, $start)
    {
        $this->db->order_by('news_id', "DESC");
        $this->db->where('status', 'Aktif');
        $query = $this->db->get('news', $limit, $start);
        return $query->result_array();
    }

	public function news($slug)
	{
		$path = "";
		$news = $this->db->query("SELECT * FROM news WHERE slug='$slug' AND status='Aktif' ORDER BY news_id DESC LIMIT 1")->result_array();
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

	public function addjoinwhitelist()
	{	
		date_default_timezone_set("Asia/Jakarta");
		$fullname = $this->clean($this->input->post('fullname'));
		$telegram = $this->clean($this->input->post('telegram'));
		$twitter = $this->clean($this->input->post('twitter'));
		$bscaddress = $this->clean($this->input->post('bscaddress'));
		$email = $this->clean($this->input->post('email'));
		$query = "INSERT INTO whitelist(fullname, telegram, twitter, bscaddress, email) VALUES(?, ?, ?, ?, ?)";
		$bind = array($fullname, $telegram, $twitter, $bscaddress, $email);
		$insert = $this->db->query($query, $bind);
		if($insert){
			echo json_encode("ok");
		}else{
			echo json_encode("Failed Insert Data!!");
		}
	}

	public function waitlist()
	{
		$datasend = array(
			'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
		);
		$this->load->view('waitlist', $datasend);
	}

	function clean($str)
	{
		$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
		$t = htmlentities($t, ENT_QUOTES, "UTF-8");
		return $t;
	}
}
