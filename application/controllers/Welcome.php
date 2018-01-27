<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}



	public function register()
	{
		$this->load->helper('url');
		if(!$_POST)
		$this->load->view('register');
		else
		{

			$this->load->model('User_model');
            $this->User_model->insert_user();
            $this->load->view('register');
		}


	}

	public function twitter()
	{
		$this->load->helper('url');
		$data['search'] = $_POST['search'];
		$this->load->model('Twitter_model');
        // Validate the user can login
        $result['twits'] = $this->Twitter_model->search1($data);




		//$d['twits'] = $this->load->view('twitter', $data);

		//print_r($d['twits']);

		//echo "<pre>";
		//print_r($result);

		//echo"</pre>";


		$this->load->view('userdash', $result);
	}

	

	
}
