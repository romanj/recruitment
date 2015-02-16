<?php

namespace AppBundle\Model;

use AppBundle\Entity\User as UserEntity;
use AppBundle\Event\User as UserEvent;
use AppBundle\Service\MarketingSystem;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class User
 * @package App\Model
 */
class User
{
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function changeEmail(UserEntity $user, $email)
    {
        $this->dispatcher->dispatch(UserEvent::NAME);

        $user->setEmail($email);
    }
}