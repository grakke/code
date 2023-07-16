<?php

namespace com\getinstance\util {
    class Debug
    {
        public static function helloWorld(): void
        {
            print "hello from Debug\n";
        }
    }

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }

    function connect()
    { /* ... */
    }
}

namespace other {
    \com\getinstance\util\Debug::helloWorld();

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }

    function connect()
    { /* ... */
    }
}
