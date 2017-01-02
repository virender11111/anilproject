<?php
echo __('Dear %s', $data['name']); 
echo "\n \n";
echo 'Your New Password:';
echo "\n";
echo __('%s', $data['password']);
echo "\n \n";
echo "Regards";
echo "\n";
echo __('%s', $data['site_title']);