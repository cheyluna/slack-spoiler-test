<?php

namespace Spoiler;

require('vendor/autoload.php');

use Spoiler\Spoiler;

$spoiler = new Spoiler();

$spoiler->loadConfig();
$spoiler->setupConfigVars();

if ($spoiler->hasConfigErrors()) {
    $errors = $spoiler->getConfigErrors();

    foreach ($errors as $error) {
        echo $error . '\n';
    }
} else {
    $post = $_POST;

    if (isset($post['command']) && $post['command'] == SLASH_COMMAND) {
        $request = new Api($post);
    }
}
