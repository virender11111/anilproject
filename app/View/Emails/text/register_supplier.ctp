<?php echo __('Dear %s', $user['User']['name'].' '.$user['User']['last_name']); 
echo "\n \n";
echo 'Thank you for your supplier registration to the Jeweller Hub. Your account is pending approval by the administrator. You will be notified when your account is approved.';
echo "\n \n";
echo "Best Wishes,";
echo "\n \n";
echo Configure::read('Site.title');