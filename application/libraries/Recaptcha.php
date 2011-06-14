<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

define("RECAPTCHA_API_SERVER", "http://www.google.com/recaptcha/api");
define("RECAPTCHA_API_SECURE_SERVER", "https://www.google.com/recaptcha/api");
define("RECAPTCHA_VERIFY_SERVER", "www.google.com");

require("recaptchalib.php");

class Recaptcha
{
	public function get_code()
	{
		$CI =& get_instance();
		$CI->config->load('recaptcha');
		
		$config = array_merge(array("lang" => "en", "theme" => ""), $CI->config->item('recaptcha'));
		
		$settings = 	'<script type="text/javascript">'
					. 	'var RecaptchaOptions = {'
					.	(!empty($config["lang"]) ? "lang: '" . $config["lang"] . "'," : "")
					.	(!empty($config["theme"]) ? "theme: '" . $config["theme"] . "'" : "")
					.	'};'
					.	'</script>';
		
		return $settings . recaptcha_get_html($config["public_key"]);
	}
	
	public function get_custom_code()
	{
		$CI =& get_instance();
		$CI->config->load('recaptcha');
		
		$config = array_merge(array("lang" => "en"), $CI->config->item('recaptcha'));
		
		$settings = 	'<script type="text/javascript">'
					. 	'var RecaptchaOptions = {'
					.	(!empty($config["lang"]) ? "lang: '" . $config["lang"] . "'," : "")
					.	"theme: 'custom',"
					.	(!empty($config["custom_theme_widget"]) ? "custom_theme_widget: '" . $config["custom_theme_widget"] . "'" : "")
					.	'};'
					.	'</script>';
		
		return $settings . $CI->load->view($config["custom_view"], array("public_key" => $config["public_key"]), true);
	}
	
	public function get_answer($challenge, $response)
	{
		$CI =& get_instance();

		$CI->config->load('recaptcha');
		$config = $CI->config->item('recaptcha');
		
		$response = recaptcha_check_answer ($config["private_key"],  
											$_SERVER["REMOTE_ADDR"],  
											$challenge,  
											$response);  
			
		return $response;
	}
}

/* End of file Recaptcha.php */
/* Location: ./application/libraries/Recaptcha.php */