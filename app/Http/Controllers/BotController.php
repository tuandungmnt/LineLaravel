<?php

namespace App\Http\Controllers;

use App\Services\LineBotService;
use Illuminate\Http\Request;

class BotController extends Controller
{
    private $lineBotService;
    private $request;

    public function __construct(
        LineBotService $lineBotService,
        Request $request
    ) {
        $this->lineBotService = $lineBotService;
        $this->request = $request;
    }

    public function sendMessage() {

        $userId = $this->request->input('user_id');
        $textMessage = $this->request->input('text_message');

        return $this->lineBotService->sendMessage($userId, $textMessage);
    }
}
