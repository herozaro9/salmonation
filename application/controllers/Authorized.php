<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorized extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
        $this->load->helper('url');
	}

    private function load($title = '', $datapath = '')
    {
        $page = array(
        );
        return $page;
    }

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
            $datasend = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view('dashboard/auth', $datasend);
		}else{
			redirect('administrator', 'refresh');
		}
	}

    public function login()
    {
        if(!$this->session->userdata('logged_in')){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $checklogin = $this->M_Login->readBy($email, $password);
            if ($checklogin) {
                echo true;
            } else {
                echo false;
            }
        }else{
            echo false;
        }
    }

    public function logout()
    {
        if($this->session->userdata('logged_in')){
            $this->session->sess_destroy();
            redirect('Authorized', 'refresh');
        }else{
            redirect('administrator', 'refresh');
        }
    }

    public function changePassword()
    {
        if($this->session->userdata('logged_in')){
            $oldpassword = md5( $this->input->post('password'));
            $passwordBaru = md5($this->input->post('newpassword'));
            $old = $this->session->userdata('password');
            $id = $this->session->userdata('id');
            if ($oldpassword == $old) {
                $data = array("password" => $passwordBaru);
                $this->db->where('user_id', $id);
                $update = $this->db->update('user', $data);
                if ($update) {
                    echo json_encode('ok');
                }else{
                    echo json_encode('Please Try Again!!');
                }
            }else{
                echo json_encode('Wrong Password!!');
            }
        }else{
            echo json_encode('You Are Not Login!');
        }
    }
}