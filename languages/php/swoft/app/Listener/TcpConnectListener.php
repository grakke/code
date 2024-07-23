<?php declare(strict_types=1);

namespace App\Listener;

use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Tcp\Server\TcpServerEvent;

/**
 * Class UserSavingListener
 *
 * @since 2.0
 *
 * @Listener(TcpServerEvent::CONNECT)
 */
class TcpConnectListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        /* @var int $fd */
        $fd = $event->getTarget();

        var_dump(
            $event->getParam(0), // \Swoole\Server
            $event->getParam(1), // reactorId
        );
    }
}
