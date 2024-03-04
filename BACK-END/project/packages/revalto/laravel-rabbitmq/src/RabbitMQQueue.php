<?php

namespace Revalto\RabbitMQ;

use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQQueue extends \VladimirYuldashev\LaravelQueueRabbitMQ\Queue\RabbitMQQueue
{
    /**
     * @param $payload
     * @param $queue
     * @param array $options
     *
     * @return int|string|null
     * @throws \PhpAmqpLib\Exception\AMQPProtocolChannelException
     */
    public function pushRaw($payload, $queue = null, array $options = []): int|string|null
    {
        [$destination, $exchange, $exchangeType, $attempts] = $this->publishProperties($queue, $options);

        $this->getChannel()->confirm_select(); // CONFIRM SELECT

        $this->declareDestination($destination, $exchange, $exchangeType);

        [$message, $correlationId] = $this->createMessage($payload, $attempts);

        $this->publishBasic($message, $exchange, $destination, true);

        return $correlationId;
    }
}
