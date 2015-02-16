<?php

namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class User extends Event
{
    const NAME = 'event.update.user.email';
}
