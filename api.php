<?php

namespace Spoiler;

require('vendor/autoload.php');
require('src/Spoiler/api.php');
require('src/Spoiler/spoiler.php');
require('src/Spoiler/request.php');

$spoiler = new Spoiler();

$spoiler->loadConfig();
$spoiler->setupConfigVars();

if ($spoiler->hasConfigErrors()) {
    $errors = $spoiler->getConfigErrors();

    foreach ($errors as $error) {
        echo $error . ' ';
    }
} else {
    $post = $_POST;

    if (isset($post['command']) && $post['command'] == SLASH_COMMAND) {
        $request = new Api($post);
    }
}
