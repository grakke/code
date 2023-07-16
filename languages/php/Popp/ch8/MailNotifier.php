<?php

namespace Popp\ch8;

class MailNotifier extends Notifier
{



    public function inform($message): void
    {
        print "MAIL notification: {$message}\n";
    }
}
