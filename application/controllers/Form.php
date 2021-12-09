<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == false) { 
			redirect('/', 'refresh');
		}
	}

	// NEWS
	public function addblog()
	{	
		if (empty($_FILES['file'])) {
			echo json_encode("Please Insert Image!!");
		}

		date_default_timezone_set("Asia/Jakarta");
		$title = $this->input->post('title');
		$tanggal = date("Y-m-d H:i:s");
		$status = $this->input->post('status');
		$description = $this->input->post('description');
		$slug = $this->slug($title);
		$new_name = time().$_FILES["file"]['name'];

		$config['upload_path']          = './upload/news';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 30000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
		$config['encrypt_name'] 		= TRUE;
		$config['file_name'] 			= $new_name;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($this->clean($this->upload->display_errors()));
		}
		else
		{
			$data = $this->upload->data();
			$query = "INSERT INTO news(title, slug, description, publish, author, file, status) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$bind = array($title, $slug, $description, $tanggal, $this->session->userdata('username'), $data['file_name'], $status);
			$insert = $this->db->query($query, $bind);
			if($insert){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Insert News', $this->session->userdata('username'), 'plus', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Insert Data!!");
			}
		}		
	}

	public function editblog()
	{
		$news_id = $this->input->post('news_id');
		date_default_timezone_set("Asia/Jakarta");
		$hgambar = $this->input->post('hgambar');
		$title = $this->input->post('title');
		$status = $this->input->post('status');
		$description = $this->input->post('description');
		$slug = $this->slug($title);

		if (!empty($_FILES['file'])) {
			$new_name = time().$_FILES["file"]['name'];
			$config['upload_path']          = './upload/news';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 30000;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			$config['encrypt_name'] 		= TRUE;
			$config['file_name'] 			= $new_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($this->clean($this->upload->display_errors()));
			}
			else
			{
				$data = $this->upload->data();
				$query = "UPDATE news SET title = ?, slug = ?, description = ?, file = ?, status = ? WHERE news_id = ?";
				$bind = array($title, $slug, $description, $data['file_name'], $status, $news_id);
				$update = $this->db->query($query, $bind);
				if($update){
					$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
					$bindnotif = array('Edit News', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
					$insertnotif = $this->db->query($querynotif, $bindnotif);

					unlink('./upload/news/'.$hgambar);
					echo json_encode("ok");
				}else{
					echo json_encode("Failed Update Data!!");
				}
			}	
		}else{
			$query = "UPDATE news SET title = ?, slug = ?, description = ?, status = ? WHERE news_id = ?";
			$bind = array($title, $slug, $description, $status, $news_id);
			$update = $this->db->query($query, $bind);
			if($update){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Edit News', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Update Data!!");
			}
		}
	}

	public function findblog()
	{
		$blog_id = $this->input->post('news_id');
		$query = "SELECT * FROM news WHERE news_id = ? ORDER BY news_id DESC LIMIT 1";
		$bind =array($blog_id);
		$query = $this->db->query($query, $bind);
		if(!empty($query->num_rows())){
			echo json_encode($query->result_array());
		}else{
			echo json_encode("fail");
		}
	}

	public function deleteblog()
	{
		$blog_id = $this->input->post('blog_id');
		$image = $this->input->post('image');
		$query = "DELETE FROM news WHERE news_id = ?";
		$bind =array($blog_id);
		$query = $this->db->query($query, $bind);
		if($query){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Delete News', $this->session->userdata('username'), 'trash', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			unlink('./upload/news/'.$image);
			echo json_encode("ok");
		}else{
			echo json_encode("fail");
		}
	}

	// REGISTRATION
	public function editregistration()
	{
		$registration_id = $this->input->post('registration_id');
		$status = $this->input->post('status');
		$query = "UPDATE registration SET status = ? WHERE registration_id = ?";
		$bind = array($status, $registration_id);
		$update = $this->db->query($query, $bind);
		if($update){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Edit Registration', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			echo json_encode("ok");
		}else{
			echo json_encode("Failed Update Data!!");
		}
	}

	public function findregistration()
	{
		$registration_id = $this->input->post('registration_id');
		$query = "SELECT * FROM registration WHERE registration_id = ? ORDER BY registration_id DESC LIMIT 1";
		$bind =array($registration_id);
		$query = $this->db->query($query, $bind);
		if(!empty($query->num_rows())){
			echo json_encode($query->result_array());
		}else{
			echo json_encode("fail");
		}
	}

	public function deleteregistration()
	{
		$registration_id = $this->input->post('registration_id');
		$query = "DELETE FROM registration WHERE registration_id = ?";
		$bind =array($registration_id);
		$query = $this->db->query($query, $bind);
		if($query){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Delete Registration', $this->session->userdata('username'), 'trash', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			echo json_encode("ok");
		}else{
			echo json_encode("fail");
		}
	}

	// TEAM
	public function addteam()
	{	
		if (empty($_FILES['file'])) {
			echo json_encode("Please Insert Image!!");
		}

		date_default_timezone_set("Asia/Jakarta");
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$job = $this->input->post('job');
		$order_position = $this->input->post('order_position');
		$ln = $this->input->post('ln');
		$ig = $this->input->post('ig');
		$tw = $this->input->post('tw');
		$fb = $this->input->post('fb');

		$new_name = time().$_FILES["file"]['name'];

		$config['upload_path']          = './upload/team';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 30000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
		$config['encrypt_name'] 		= TRUE;
		$config['file_name'] 			= $new_name;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($this->clean($this->upload->display_errors()));
		}
		else
		{
			$data = $this->upload->data();
			$query = "INSERT INTO team(name, status, job, order_position, ln, ig, tw, fb, file) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$bind = array($name, $status, $job, $order_position, $ln, $ig, $tw, $fb, $data['file_name']);
			$insert = $this->db->query($query, $bind);
			if($insert){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Add Team', $this->session->userdata('username'), 'plus', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Insert Data!!");
			}
		}		
	}

	public function editteam()
	{
		$team_id = $this->input->post('team_id');
		date_default_timezone_set("Asia/Jakarta");
		$hgambar = $this->input->post('hgambar');
		$name = $this->input->post('name');
		$status = $this->input->post('status');
		$job = $this->input->post('job');
		$order_position = $this->input->post('order_position');
		$ln = $this->input->post('ln');
		$ig = $this->input->post('ig');
		$tw = $this->input->post('tw');
		$fb = $this->input->post('fb');

		if (!empty($_FILES['file'])) {
			$new_name = time().$_FILES["file"]['name'];
			$config['upload_path']          = './upload/team';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 30000;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			$config['encrypt_name'] 		= TRUE;
			$config['file_name'] 			= $new_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($this->clean($this->upload->display_errors()));
			}
			else
			{
				$data = $this->upload->data();
				$query = "UPDATE team SET name = ?, status = ?, job = ?, order_position = ?, ln = ?, ig = ?, tw = ?, fb = ?, file = ? WHERE team_id = ?";
				$bind = array($name, $status, $job, $order_position, $ln, $ig, $tw, $fb, $data['file_name'], $team_id);
				$update = $this->db->query($query, $bind);
				if($update){
					$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
					$bindnotif = array('Edit Team', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
					$insertnotif = $this->db->query($querynotif, $bindnotif);

					unlink('./upload/team/'.$hgambar);
					echo json_encode("ok");
				}else{
					echo json_encode("Failed Update Data!!");
				}
			}	
		}else{
			$query = "UPDATE team SET name = ?, status = ?, job = ?, order_position = ?, ln = ?, ig = ?, tw = ?, fb = ? WHERE team_id = ?";
			$bind = array($name, $status, $job, $order_position, $ln, $ig, $tw, $fb, $team_id);
			$update = $this->db->query($query, $bind);
			if($update){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Edit Team', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Update Data!!");
			}
		}
	}

	public function findteam()
	{
		$team_id = $this->input->post('team_id');
		$query = "SELECT * FROM team WHERE team_id = ? ORDER BY team_id DESC LIMIT 1";
		$bind =array($team_id);
		$query = $this->db->query($query, $bind);
		if(!empty($query->num_rows())){
			echo json_encode($query->result_array());
		}else{
			echo json_encode("fail");
		}
	}

	public function deleteteam()
	{
		$team_id = $this->input->post('team_id');
		$image = $this->input->post('image');
		$query = "DELETE FROM team WHERE team_id = ?";
		$bind =array($team_id);
		$query = $this->db->query($query, $bind);
		if($query){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Delete Team', $this->session->userdata('username'), 'trash', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			unlink('./upload/team/'.$image);
			echo json_encode("ok");
		}else{
			echo json_encode("fail");
		}
	}

	// SCHEDULE
	public function addschedule()
	{	
		if (empty($_FILES['file'])) {
			echo json_encode("Please Insert Image!!");
		}

		date_default_timezone_set("Asia/Jakarta");
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$schedule = $this->input->post('schedule');
		$time_first = $this->input->post('time_first');
		$time_end = $this->input->post('time_end');
		$link = $this->input->post('link');

		$new_name = time().$_FILES["file"]['name'];

		$config['upload_path']          = './upload/calendar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 30000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
		$config['encrypt_name'] 		= TRUE;
		$config['file_name'] 			= $new_name;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($this->clean($this->upload->display_errors()));
		}
		else
		{
			$data = $this->upload->data();
			$query = "INSERT INTO calendar(title, description, schedule, time_first, time_end, link, file) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$bind = array($title, $description, $schedule, $time_first, $time_end, $link, $data['file_name']);
			$insert = $this->db->query($query, $bind);
			if($insert){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Add Schedule', $this->session->userdata('username'), 'plus', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Insert Data!!");
			}
		}		
	}

	public function editschedule()
	{
		$calendar_id = $this->input->post('calendar_id');
		date_default_timezone_set("Asia/Jakarta");
		$hgambar = $this->input->post('hgambar');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$schedule = $this->input->post('schedule');
		$time_first = $this->input->post('time_first');
		$time_end = $this->input->post('time_end');
		$link = $this->input->post('link');

		if (!empty($_FILES['file'])) {
			$new_name = time().$_FILES["file"]['name'];
			$config['upload_path']          = './upload/calendar';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 30000;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;
			$config['encrypt_name'] 		= TRUE;
			$config['file_name'] 			= $new_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file')){
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($this->clean($this->upload->display_errors()));
			}
			else
			{
				$data = $this->upload->data();
				$query = "UPDATE calendar SET title = ?, description = ?, schedule = ?, time_first = ?, time_end = ?, link = ?, file = ? WHERE calendar_id = ?";
				$bind = array($title, $description, $schedule, $time_first, $time_end, $link, $data['file_name'], $calendar_id);
				$update = $this->db->query($query, $bind);
				if($update){
					$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
					$bindnotif = array('Edit Schedule', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
					$insertnotif = $this->db->query($querynotif, $bindnotif);

					unlink('./upload/calendar/'.$hgambar);
					echo json_encode("ok");
				}else{
					echo json_encode("Failed Update Data!!");
				}
			}	
		}else{
			$query = "UPDATE calendar SET title = ?, description = ?, schedule = ?, time_first = ?, time_end = ?, link = ? WHERE calendar_id = ?";
			$bind = array($title, $description, $schedule, $time_first, $time_end, $link, $calendar_id);
			$update = $this->db->query($query, $bind);
			if($update){
				$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
				$bindnotif = array('Edit Schedule', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
				$insertnotif = $this->db->query($querynotif, $bindnotif);

				echo json_encode("ok");
			}else{
				echo json_encode("Failed Update Data!!");
			}
		}
	}

	public function findschedule()
	{
		$calendar_id = $this->input->post('schedule_id');
		$query = "SELECT * FROM calendar WHERE calendar_id = ? ORDER BY calendar_id DESC LIMIT 1";
		$bind =array($calendar_id);
		$query = $this->db->query($query, $bind);
		if(!empty($query->num_rows())){
			echo json_encode($query->result_array());
		}else{
			echo json_encode("fail");
		}
	}

	public function deleteschedule()
	{
		$calendar_id = $this->input->post('schedule_id');
		$image = $this->input->post('image');
		$query = "DELETE FROM calendar WHERE calendar_id = ?";
		$bind =array($calendar_id);
		$query = $this->db->query($query, $bind);
		if($query){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Delete Schedule', $this->session->userdata('username'), 'trash', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			unlink('./upload/calendar/'.$image);
			echo json_encode("ok");
		}else{
			echo json_encode("fail");
		}
	}

	// USER
	public function adduser()
	{	
		date_default_timezone_set("Asia/Jakarta");
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$status = $this->input->post('status');
		$role = $this->input->post('role');
		$password = md5($this->input->post('password'));

		$query = "INSERT INTO user(username, email, status, role, password) VALUES(?, ?, ?, ?, ?)";
		$bind = array($username, $email, $status, $role, $password);
		$insert = $this->db->query($query, $bind);
		if($insert){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Add User', $this->session->userdata('username'), 'plus', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			echo json_encode("ok");
		}else{
			echo json_encode("Failed Insert Data!!");
		}		
	}

	public function edituser()
	{
		$user_id = $this->input->post('user_id');
		date_default_timezone_set("Asia/Jakarta");
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$status = $this->input->post('status');
		$role = $this->input->post('role');
		$password = md5($this->input->post('password'));
		if(!empty($this->input->post('password'))){
			$query = "UPDATE user SET username = ?, email = ?, status = ?, role = ?, password = ? WHERE user_id = ?";
			$bind = array($username, $email, $status, $role, $password, $user_id);
		}else{
			$query = "UPDATE user SET username = ?, email = ?, status = ?, role = ? WHERE user_id = ?";
			$bind = array($username, $email, $status, $role, $user_id);
		}
		$update = $this->db->query($query, $bind);
		if($update){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Edit User', $this->session->userdata('username'), 'edit', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			echo json_encode("ok");
		}else{
			echo json_encode("Failed Update Data!!");
		}
	}

	public function finduser()
	{
		$user_id = $this->input->post('user_id');
		$query = "SELECT * FROM user WHERE user_id = ? ORDER BY user_id DESC LIMIT 1";
		$bind =array($user_id);
		$query = $this->db->query($query, $bind);
		if(!empty($query->num_rows())){
			echo json_encode($query->result_array());
		}else{
			echo json_encode("fail");
		}
	}

	public function deleteuser()
	{
		$user_id = $this->input->post('user_id');
		$image = $this->input->post('image');
		$query = "DELETE FROM user WHERE user_id = ?";
		$bind =array($user_id);
		$query = $this->db->query($query, $bind);
		if($query){
			$querynotif = "INSERT INTO notification(notification, author, icon, time_notification) VALUES(?, ?, ?, ?)";
			$bindnotif = array('Delete User', $this->session->userdata('username'), 'trash', date("Y-m-d H:i:s"));
			$insertnotif = $this->db->query($querynotif, $bindnotif);

			echo json_encode("ok");
		}else{
			echo json_encode("fail");
		}
	}

	function slug($text)
	{
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text))
		{
			return 'n-a';
		}
		return $text;
	}

	function clean($str)
	{
		$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
		$t = htmlentities($t, ENT_QUOTES, "UTF-8");
		return $t;
	}

}