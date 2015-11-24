<?php

namespace Spoiler;

use GuzzleHttp\Client;

class Request
{
    public function __construct($request)
    {
        $this->webhookUrl = WEBHOOK_URL;

        $this->body = $request['body'];
        $this->channel = $request['channel'];
        $this->user = $request['user'];

        $this->client = new Client();

        $this->postResponse();
    }

    public function postResponse()
    {
        $data = array(
            'payload' => json_encode([
                'username' => $this->user . ": SPOILER",
                'channel' => $this->channel,
                'text' => $this->body
            ])
        );

        $this->client->post(WEBHOOK_URL, array(
            'body' => $data
        ));
    }
}
