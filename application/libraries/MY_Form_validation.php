<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
	public function recaptcha()
	{
		$CI =& get_instance();
		
		$CI->load->library('recaptcha');
		
		$answer = $CI->recaptcha->get_answer(
												$CI->input->post("recaptcha_challenge_field"),
												$CI->input->post("recaptcha_response_field")
											);

		if ($answer->is_valid)
			return true;
		else
		{
			$CI->form_validation->set_message('recaptcha', 'Submitted reCAPTCHA code is invalid!');
			return false;
		}
	}
	
}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */