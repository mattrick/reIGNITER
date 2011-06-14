<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config["recaptcha"] = array(	"recaptcha_api_server" => "http://www.google.com/recaptcha/api",
								"recaptcha_api_secure_server" => "https://www.google.com/recaptcha/api",
								"recaptcha_verify_server" => "www.google.com",
								
								// register on http://recaptcha.net to get these
								"public_key" => "------------",
								"private_key" => "------------",
								
								// global settings, can be overrided
								"lang" => "en",
								"theme" => "",
								
								"custom_view" => "recaptcha",
								"custom_theme_widget" => "recaptcha_widget"
							);

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */