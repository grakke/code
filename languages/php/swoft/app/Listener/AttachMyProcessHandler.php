<?php declare(strict_types=1);

namespace App\Listener;

use App\Process\MyProcess;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Server\ServerEvent;

/**
 * Class AttachMyProcessHandler
 * @Listener(ServerEvent::BEFORE_START)
 */
class AttachMyProcessHandler implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        // TODO:fix
//        $swooleServer = $event->target->getSwooleServer();
//
//        $process = bean(MyProcess::class);
//
//        $swooleServer->addProcess($process->create());
    }
}
