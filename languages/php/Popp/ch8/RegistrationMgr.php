<?php

namespace Popp\ch8;

include 'Notifier.php';

class RegistrationMgr
{
    public function register(Lesson $lesson): void
    {
// do something with this Lesson
// now tell someone
        $notifier = Notifier::getNotifier();
        $notifier->inform("new lesson: cost ({$lesson->cost()})");
    }
}
