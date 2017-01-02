<?php
	echo __('Hello %s', $message['Message']['name'])."\n \n";
	echo __('Your request has been recieved.We will contact with you very shortly.') . "\n \n";
	echo "Thanks \n \n".Configure::read('Site.title');
?>