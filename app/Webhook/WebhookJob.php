<?php

namespace App\Webhook;

use \Spatie\WebhookClient\ProcessWebhookJob as SpatieProcessWebhookJob;

class WebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        // $this->webhookCall // contains an instance of `WebhookCall`

        // perform the work here
    }
}
