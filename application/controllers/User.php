<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function dash()
	{
		$this->load->helper('url');
		$result['twits'] = NULL;
		$this->load->view('userdash', $result);

	}

	public function index($msg = NULL)
	{
		$this->load->helper('url');
		$data['msg'] = $msg;


		$this->load->view('user_login', $data);
	}

	public function process(){
		$this->load->helper('url');

        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate_user();

        //var_dump($result);
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('user/dash');
        }        
    }

    public function do_logout(){
    	$this->load->helper('url');
        $this->session->sess_destroy();
        redirect('user');
    }



}
