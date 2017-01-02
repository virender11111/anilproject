<?php
$url = Router::url(array(
		'controller' => 'users',
		'action' => 'reset',
                $data['User']['id'],
		$data['User']['activation_key'],
	), true);
	
	//echo __('Dear %s', $data['User']['name']); 
	//echo "\n \n";
	echo 'Please click on link given below to reset your password:';
	echo "\n";
	echo __(' %s', $url);
	echo "\n \n";
	echo __("If you can't able to click the above link directly, please copy the link and paste in your browser's address bar.");
	echo "\n \n";
	echo "\n \n";
	echo "Regards";
	echo "\n \n";
	echo Configure::read('Site.title');
