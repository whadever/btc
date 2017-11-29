<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register/index');
	}

	public function submit(){

		$this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('api', 'API Key', 'required');
        $this->form_validation->set_rules('api', 'API Key', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('register/index');
        }
        else
        {
        		if($this->input->post('register')){
					$data['email'] = $this->input->post('email');
					$data['password'] = sha1($this->input->post('password'));
					$data['api_key'] = $this->input->post('api');
					$data['secret_key'] = $this->input->post('secret');

					$this->db->insert('user',$data);

					$this->session->set_flashdata('reg_success','You have successfully registered your account jink.');

					redirect('login');
				}        
        }

		

	}
		
}
