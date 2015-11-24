<?php

header('Content-Type: application/json');

$post = $_POST;

if ($post['token'] != 'gMqc5K9y9r3UJOO3hca0QLhm') {
    $err_msg = "The token for the slash command doesn't match. Check your script.";
    echo $err_msg;
}

$response = [
    'response_type' => 'in_channel',
    'username' => $post['user_name'],
    'text' => $post['text'],
];

echo json_encode($response);
