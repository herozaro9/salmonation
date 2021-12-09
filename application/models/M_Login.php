<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Login extends CI_Model{ 

    public function readBy($email, $password){
      // $password= $this->hash($password);
      // $querycheck = $this->db->query("SELECT * FROM user WHERE email = '$email' and password = md5('$password') ORDER BY id_user DESC LIMIT 1");
      $sql = "SELECT * FROM user WHERE email = ? and password = ? and status = ?";
      $bind = array($email,  md5($password), 'Aktif');
      $query = $this->db->query($sql, $bind);
      if($query->num_rows() > 0){
        foreach ($query->result() as $row){
            $data = array(
                'id'            =>$row->user_id,
                'username'      =>$row->username,
                'password'      =>$row->password,
                'email'         =>$row->email,
                'role'         =>$row->role,
                'logged_in'     =>TRUE
            );
        }
        $this->session->set_userdata($data);
        return TRUE;
    }
    else{
        return FALSE;
    }    
}
public function hash($string)
{
    return hash('sha512', $string . config_item('encryption_key'));
}
}