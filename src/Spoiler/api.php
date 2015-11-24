<?php

namespace Spoiler;

class Api
{
    public function __construct($request)
    {
        $token = $request['token'];

        if ($token) {
            if ($this->isValidToken($token)) {
                $data = array(
                    'team_id'   => $request['team_id'],
                    'channel'   => $request['channel_id'],
                    'user_id'   => $request['user_id'],
                    'user'      => $request['user_name'],
                    'body'      => $request['text']
                );

                $request = new Request($data);
            } else {
                echo 'Invalid Slash Command token!';
            }
        } else {
            echo 'Invalid API call. Slash Command token missing.';
        }
    }

    private function isValidToken($token)
    {
        return $token == SLASH_COMMAND_TOKEN;
    }
}
