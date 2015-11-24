<?php

$message = $_POST['text'];
$token = $_POST['token'];

if ($token != 'gMqc5K9y9r3UJOO3hca0QLhm') {
    $msg = "The token for the slash command doesn't match. Check your script.";
    die($msg);
    echo $msg;
}
