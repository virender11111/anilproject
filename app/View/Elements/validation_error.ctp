<?php
$message = array();
foreach ($valildationErrors as $fields => $errors) {
    $message[] = $errors[0];
}
$response['status'] = false;
$response['message'] = implode('<br>', $message);
echo json_encode($response);
exit();


