<style type="text/css" />
#recaptcha_widget
{  
	width:500px;  
	font-size:12px; font-family:Arial, Helvetica, sans-serif;
}
#recaptcha_image
{  
	padding:2px; background:#f9f9f9;  
	border:1px solid #e0e0e0;  
}  
#recaptcha_response_field
{						
   border: 1px solid #999 !important; //Text input field border color  
   background-color:#ccc !important; //Text input field background color  
   width:120px !important;  
   padding:5px;  
}  
#recaptcha_widget a
{  
	font-size:11px;    font-family:Verdana;  
	text-decoration:none; color:#3366ff;  
}  
#recaptcha_widget a:hover
{  
	color:113399; text-decoration:underline;  
}  
</style>
 
 <div id="recaptcha_widget" style="display:none">

   <div id="recaptcha_image"></div>
   <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>

   <span class="recaptcha_only_if_image">Enter the words above:</span>
   <span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>

   <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

   <div><a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a></div>
   <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
   <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>

   <div><a href="javascript:Recaptcha.showhelp()">Help</a></div>

 </div>

 <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=<?= $public_key; ?>">
 </script>
 <noscript>
   <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?= $public_key; ?>"
        height="300" width="500" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
 </noscript>