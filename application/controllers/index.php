<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start(); //we need to call PHP's session object to access it through CI

class Index extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
	     parent:: __construct();
	     $this->load->helper('form'); //loading form helper
	     $this->load->model('user_model'); //loading your model
	     $this->load->helper('url');
	     $this->load->library('form_builder');
	     $this->load->library('session');
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

			if($this->session->userdata('user_type') == 'admin') {
				$this->load->model("user_model");
				$data['results'] = $this->user_model->getAll();
				$this -> render('list_view', $data);
			} else {
				$data['results'] = "Sorry list is available only for admins!";
				$this -> render('list_user_view', $data);
			}

			
        } else {
            //If no session, redirect to login page
            $this->login();
        }

	}

	public function login() {
		$this->render('login_view');
	}

	public function login_validation() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_login_data');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		if($this->form_validation->run()){
			redirect('index');
		} else {
			$this->render('login_view');
		}
	}

	public function validate_login_data() {
		$this->load->model("user_model");

		if($this->user_model->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_login_data','Incorrect username or password!');
			return false;
		}
	}

	function logout() {

        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->index();
    }

	function User() {

		if($this->session->userdata('user_type') == 'admin') {
			if(isset($_POST) && !empty($_POST)) {

				$this->load->model("user_model");

				// echo "<pre>";
				// print_r($_POST);
				// die('fvdsf');
				if(isset($_POST['id']) && is_numeric($_POST['id'])) {
					if(empty($_POST['password'])){
						$user_data = $this->user_model->getUser($_POST['id']);
						$_POST['password'] = $user_data['password'];
					}
					$this->user_model->update($_POST, $_POST['id']);

				} else {
					$this->user_model->insertUser();
				}

				redirect('index');

			} 

		} else {
			$this->index();
		} 

	}

	public function check_user() {
		$user=$this->input->post('username');
        $result=$this->user_model->check_user_exist($user);
        if($result) {
			echo "false";
        } else {	
			echo "true";
        }
	}

	public function check_email() {
		$email=$this->input->post('email');
        $result=$this->user_model->check_email_exist($email);
        if($result) {
			echo "false";
        } else {	
			echo "true";
        }
	}

	function search() {
		if(isset($_POST) && !empty($_POST['keyword'])) {
			$search = $_POST['keyword'];

			$result = $this->user_model->search($search);
			echo json_encode($result);
		}
	}

	public function delete_user() {
		
		if(isset($_POST) && !empty($_POST['user_id']))
		{
			$this->load->model("user_model");
			$user_id = $_POST['user_id'];

			$result = $this->user_model->delete($user_id);

			if($result)	{
				echo "true";
			} else {
				echo "false";
			}
			

		}
	}

	function getUserData() {
		if(isset($_POST['user_id']) && !empty($_POST['user_id']) && is_numeric($_POST['user_id'])) {

			$id = $_POST['user_id'];
			$this->load->model("user_model");
			$user_data = $this->user_model->getUser($id);

			echo json_encode($user_data);

		} else {
			echo "Do not repeat this request!";
		}
	}

	public function render( $view, $data = array() ) {
		$this->load->view('head', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */