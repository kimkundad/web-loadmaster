<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class OrderStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     */
    public function __construct($order)
    {
        $this->order = $order;

        // ส่ง Event ไปยัง Socket.IO Server
        $client = new Client();
        $response = $client->post('https://chat.loadmasterth.com', [
            'json' => [
                'event' => 'order-update', // Event Name
                'data' => [
                    'id' => $this->order->id,
                    'order_status' => $this->order->order_status,
                ],
                'order' => $this->order
            ],
        ]);

        \Log::info('OrderStatusUpdated event triggered', [
            'response' => $response->getBody()->getContents(),
        ]);
    }
}
