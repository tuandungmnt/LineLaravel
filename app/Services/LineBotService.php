<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineBotService {

    private $httpClient;
    private $bot;

    public function __construct()
    {
        $this->httpClient = new CurlHTTPClient(env('LINE_BOT_CHANNEL_ACCESS_TOKEN'));
        $this->bot = new LINEBot($this->httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);
    }

    public function replyMessage($request) {
        $events = $request['events']['0'];
        $replyToken = $events['replyToken'];
        $textMessage = $events['message']['text'];
        //Log::debug($replyToken);


        $textMessageBuilder = new TextMessageBuilder($textMessage);
        $response = $this->bot->replyMessage($replyToken, $textMessageBuilder);
        if ($response->isSucceeded()) {
            Log::debug('ok');
        }
        return $response = response()->json(['message' => 'ok']);
    }

    public function sendMessage($userId, $textMessage) {
        Log::debug($userId);
        Log::debug($textMessage);

        $textMessageBuilder = new TextMessageBuilder($textMessage);

        $response = $this->bot->pushMessage($userId, $textMessageBuilder);
        if ($response->isSucceeded()) {
            Log::debug('ok');
        }
        return $response = response()->json(['message' => 'ok']);
    }
}
