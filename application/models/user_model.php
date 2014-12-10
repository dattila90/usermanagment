<?php

class User_model extends CI_Model{

	function can_log_in() {
        $this->db->where("email", $this->input->post('email'));
        $this->db->where("password", md5($this->input->post('password')));

        $query = $this->db->get("user");
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $newdata = array(
                    'id' => $rows->id,
                    'username' => $rows->username,
                    'email' => $rows->email,
                    'user_type' => $rows->user_type,
                    'logged_in' => TRUE,
                );
            }
            $this->session->set_userdata($newdata);

            return true;
        } else {

            return false;
        }
    }
	
	function getAll(){
		$query = $this->db->query("SELECT * FROM ci_user");

		return $query->result();
	}

	function getUser($id){
		$query = $this->db->query("SELECT * FROM ci_user WHERE id=".$id);

		return $query->result();
	}

	function insertUser(){
		$data=array(
		    'username'		=> $this->input->post('username'),
		    'password'		=> md5($this->input->post('password')),
		    'firstname'		=> $this->input->post('firstname'),
		    'lastname'		=> $this->input->post('lastname'),
		    'email'			=> $this->input->post('email'),
		    'phone'			=> $this->input->post('phone'),
		    'description'	=> $this->input->post('description'),
		    'user_type'		=> $this->input->post('user_type'),
  		);
		$this->db->insert("ci_user", $data);
	}

	function update($data, $id){
		
		$data=array(
		    'username'		=> $this->input->post('username'),
		    'password'		=> md5($this->input->post('password')),
		    'firstname'		=> $this->input->post('firstname'),
		    'lastname'		=> $this->input->post('lastname'),
		    'email'			=> $this->input->post('email'),
		    'phone'			=> $this->input->post('phone'),
		    'description'	=> $this->input->post('description'),
		    'user_type'		=> $this->input->post('user_type'),
  		);
		$this->db->where('id', $id);
		$this->db->update('ci_user', $data);

		// $this->db->update("ci_user", $data, array('id' => $id));
	}

	public function check_user_exist($user)
    {
        $this->db->where("username",$user);
        $query = $this->db->get("ci_user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

	public function check_email_exist($email)
    {
        $this->db->where("email",$email);
        $query = $this->db->get("ci_user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

	function search($data) {

		$this->db->select('id, username, email');
		$this->db->from('ci_user');
		$this->db->like('username', $data);
		$this->db->or_like('firstname', $data);
		$this->db->or_like('lastname', $data);
		$this->db->or_like('email', $data);

		$query = $this->db->get();
		return $query->result();
	}

	public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('ci_user');

        $query = $this->db->affected_rows();
        return $query;
    }
}