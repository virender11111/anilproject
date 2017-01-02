<?php
	$url = Router::url(array(
		'controller' => 'contacts',
		'action' => 'view',
		$contact['Contact']['alias'],
	), true);
	echo __('You have received a new order and details are : ') . "\n \n";
	if( !empty($message['Message']['body'])) echo __('Message: %s', $message['Message']['body']) . "\n";
	if( !empty($message['Message']['order'])) echo __('Required Order Quantity: %s', $message['Message']['order']) . "\n";
        echo "\n \nPersonal/shipping detail\n \n";
	if( !empty($message['Message']['name'])) echo __('Name: %s', $message['Message']['name']) . "\n";
	if( !empty($message['Message']['phone'])) echo __('Phone: %s', $message['Message']['phone']) . "\n";
	if( !empty($message['Message']['email'])) echo __('Email: %s', $message['Message']['email']) . "\n";
        if( !empty($message['Message']['address'])) echo __('Address1: %s', $message['Message']['address']) . "\n";
        if( !empty($message['Message']['address2'])) echo __('Address2: %s', $message['Message']['address2']) . "\n";
        if( !empty($message['Message']['city'])) echo __('City: %s', $message['Message']['city']) . "\n";
        if( !empty($message['Message']['state'])) echo __('State: %s', $message['Message']['state']) . "\n";
        if( !empty($message['Message']['country'])) echo __('Country: %s', $message['Message']['country']) . "\n";
        if( !empty($message['Message']['zip'])) echo __('Zip Code: %s', $message['Message']['zip']) . "\n";
	if( !empty($message['Product'])) echo __('Product Details are : ') . "\n\n";
	if( !empty($message['Product']['id'])) echo __('Id: %s', $message['Product']['id']) . "\n";
	if( !empty($message['Product']['name'])) echo __('Name: %s', $message['Product']['name']) . "\n";
	if( !empty($message['Product']['price'])) echo __('Price: $%s', $message['Product']['price'].' per '. $message['Product']['price_unit']) . "\n";
	echo __('IP Address: %s', $_SERVER['REMOTE_ADDR']) . "\n";
	
?>