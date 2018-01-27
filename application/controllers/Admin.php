<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

		$this->load->model('Admin_model');
		$data['userArray'] = $this->Admin_model->return_users();
		
		$this->load->view('admin', $data);

	}

	public function index($msg = NULL)
	{
		$this->load->helper('url');
		$data['msg'] = $msg;


		$this->load->view('admin_login', $data);
	}

	public function process(){
		$this->load->helper('url');

        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate_admin();

        //var_dump($result);
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('admin/dash');
        }        
    }

    public function do_logout(){
    	$this->load->helper('url');
        $this->session->sess_destroy();
        redirect('admin');
    }





	public function delete_user()
	{
		$this->load->helper('url');
		if($_POST){
		
		$this->load->model('Admin_model');
		$this->Admin_model->delete_users();
		redirect(site_url('admin'), 'refresh');
		}
		else
		{
			redirect(site_url('admin'));
		}
	}

	public function edit_user()
	{
		$this->load->helper('url');
		if($_POST){
		
		$this->load->model('Admin_model');
		$data['userArr'] = $this->Admin_model->look_users();
		$this->load->view('edit', $data);
		}
		else
		{
			
			redirect(site_url('admin'), 'refresh');
		}
	}

	public function update()
	{
		$this->load->helper('url');
		if($_POST){
		
			$this->load->model('Admin_model');
            $this->Admin_model->update_users();
			redirect(site_url('admin'), 'refresh');
		}
		else
		{
			
			redirect(site_url('admin'), 'refresh');
		}
	}

}
