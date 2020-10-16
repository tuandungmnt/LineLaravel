<?php

namespace App\Webhook;

use App\Services\LineBotService;
use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\WebhookResponse\RespondsToWebhook;
use Symfony\Component\HttpFoundation\Response;

class WebhookResponse implements RespondsToWebhook
{
    private $lineBotService;

    public function __construct(
        LineBotService $lineBotService
    ) {
        $this->lineBotService = $lineBotService;
    }

    public function respondToValidWebhook(Request $request, WebhookConfig $config): Response
    {
        return $this->lineBotService->replyMessage($request);
    }
}
