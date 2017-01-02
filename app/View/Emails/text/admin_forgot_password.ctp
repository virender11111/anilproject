<?php
echo 'Your New Password:';
	echo "\n";
	echo __(' Password: %s', $data['User']['password']);	
	echo "\n \n";
	echo 'Copy this password and login to your admin dashboard';
	echo "\n \n";
	echo 'Note: For security purpose change your password from your dashboard after login';
	echo "\n \n";
	echo "\n \n";
	echo "Regards";
	echo "\n \n";
	echo Configure::read('Site.title');
