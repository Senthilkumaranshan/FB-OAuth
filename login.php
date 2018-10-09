<?php

session_start();

require './vendor/autoload.php';

$fb = new Facebook\Facebook([

'app_id' => '684917228554903',
'app_secret' =>'2ac5dfdd2f310801144e8786fd7277cd',
'default_graph_version' =>'v2.7'
]);


$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost:333/fb-oauth/");

try{
	
	$accessToken = $helper->getAccessToken();
	if(isset($accessToken))
	{
		
		$_SESSION['access_token'] = (string)$accessToken;
		header("Location:index.php");
	}
}catch(Exception $exc){
	
	echo $exc->getTraceAsString();
}

	if(isset($_SESSION['access_token'])){
		try
		{

				
				$fb->setDefaultAccessToken($_SESSION['access_token']);
				$res = $fb->get('/me?locale=en_us&fields=name,email');
				$user = $res->getGraphUser();
				
			
		}catch(Exception $exc)
		{echo $exc->getTraceAsString();}
	}