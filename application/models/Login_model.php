<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate_admin(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        //echo $username.$password;
        
        $query = $this->db->get('admin');
        $query->result_array();

        //echo "<pre>";
        //  echo ($query->num_rows());
        //echo "</pre>";



        

        if($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
                    'adminid' => $row->id,
                    'admin_username' => $row->username
                    );
            $this->session->set_userdata('admin_logged_in', $data);
            return true;
        }
        
        return false;
    }

    public function validate_user(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        //echo $username.$password;
        
        $query = $this->db->get('user');
        $query->result_array();

        //echo "<pre>";
        //  echo ($query->num_rows());
        //echo "</pre>";



        

        if($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
                    'userid' => $row->id,
                    'username' => $row->username
                    );
            $this->session->set_userdata('user_logged_in', $data);
            return true;
        }
        
        return false;
    }
}
?>