
		//------------------ captcha check 	
				if(isset($_POST['g-recaptcha-response'])&&$_POST['g-recaptcha-response']!=""){
				$valide=true;
$siteKey = "PUBLIC_KEY";
$secret = "SECRET_KEY";
$url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => $secret,
                 'response' => $_POST['g-recaptcha-response'],
                 'remoteip' => $_SERVER['REMOTE_ADDR']];
	$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);
 $resp= json_decode($response)->success;
if (!($resp != null && $resp)) {
   $valide=false;
   echo ('Please confirme that you are not a robot');
}

}else{
	$valide=false;
	echo ('Please confirme that you are not a robot');
}
			//------------------ captcha check 
