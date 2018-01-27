<?php
	class Admin_model extends CI_Model{

		function return_users(){

			$query = $this->db->query("select * from user");
			$query->result_array();

			//echo "<pre>";
			//print_r($query->result_array());
			//echo "</pre>";
			return $query;
		}
	
		function delete_users(){

			$id = $_POST['id'];

			$query = $this->db->query("delete from user where id = $id");
			
			return ;
		}

		function look_users(){

			$id = $_POST['id'];

			$query = $this->db->query("select * from user where id = $id");
			$query->result_array();

			return $query;
		}

		function update_users(){

			
				$id = $_POST['id'];
			 $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email')
                );


			 	$this->db->where('id', $id);
                $this->db->update('user', $data);
                return;





		}
	}


?>