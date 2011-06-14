<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reigniter extends CI_Controller
{
	public function index()
	{
		$this->load->helper("url");
		redirect("reigniter/simple");
	}
	
	public function simple()
	{
		$this->load->library("recaptcha");
		$this->load->library("form_validation");
		
		$this->form_validation->set_rules("recaptcha_response_field", "reCAPTCHA", "required|recaptcha");
		
		if ($this->form_validation->run())
		{
			$this->load->helper("url");
			
			echo "This works!<br/>".anchor("reigniter/simple", "Try again!");
		}
		else
		{
			echo validation_errors();
			$this->load->helper("form");
			
			echo form_open("reigniter/simple");
			echo $this->recaptcha->get_code();
			echo form_close();
		}
	}
	
	public function custom()
	{
		$this->load->library("recaptcha");
		$this->load->library("form_validation");
		
		$this->form_validation->set_rules("recaptcha_response_field", "reCAPTCHA", "required|recaptcha");
		
		if ($this->form_validation->run())
		{
			$this->load->helper("url");
			
			echo "This works!<br/>".anchor("reigniter/custom", "Try again!");
		}
		else
		{
			echo validation_errors();
			$this->load->helper("form");
			
			echo form_open("reigniter/custom");
			echo $this->recaptcha->get_custom_code();
			echo form_close();
		}		
	}
}

/* End of file reigniter.php */
/* Location: ./application/controllers/reigniter.php */