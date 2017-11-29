<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login/index');
	}

	public function submit(){

		$this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
               //$this->load->view('login/index');
        }
        else
        {
        		if($this->input->post('login')){
					$data_login['email'] = $this->input->post('email');
					$data_login['password'] = sha1($this->input->post('password'));
					
					$result = $this->db->get_where('user',$data_login)->row();

					$data['email'] = $result->email;
					$data['api_key'] = $result->api_key;
					$data['secret_key'] = $result->secret_key;

					$this->session->set_userdata($data);

					redirect('home');
				}        
        }

		

	}
		
}
