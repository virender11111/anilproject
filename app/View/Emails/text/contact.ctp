<?php	
	echo __('You have received a new message ') . "\n \n";
	if( !empty($data['name'])) echo __('Name: %s', $data['name']) . "\n";
	//if( !empty($message['Message']['last'])) echo __('Last Name: %s', $message['Message']['last']) . "\n";
	if( !empty($data['email'])) echo __('Email: %s', $data['email']) . "\n";
	if( !empty($data['title'])) echo __('Subject: %s', $data['title']) . "\n";
	if( !empty($data['body'])) echo __('Message: %s', $data['body']) . "\n";
	
?>