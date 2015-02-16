<?php

namespace AppBundle\Tests\Model;

use AppBundle\Model\User as UserModel;
use AppBundle\Event\User as UserEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class UserTest
 * @package App\Tests\Model
 */
class UserTest extends \PHPUnit_Framework_TestCase {

    /** @var UserModel - System Under Test */
    private $sut;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $dispatcher;

    public function setUp() {

        $this->dispatcher = $this->getMockBuilder('Symfony\Component\EventDispatcher\EventDispatcherInterface')
            ->setMethods(array(
                'dispatch',
                'addListener',
                'addSubscriber',
                'removeListener',
                'removeSubscriber',
                'getListeners',
                'hasListeners'
            ))
            ->getMock();
        $this->sut = new UserModel($this->dispatcher);
    }

    /**
     * @covers AppBundle\Model\User::__construct
     */
    public function testConstruct_ShouldSetDispacher_ResultIsObjectInjection()
    {
        $this->assertAttributeEquals($this->dispatcher, 'dispatcher', $this->sut);
    }

    /**
     * @covers AppBundle\Model\User::changeEmail
     */
    public function testConstruct_ShouldDispatchEvent_ResultIsChangedEmail()
    {
        $email = 'test@email.com';
        $this->dispatcher
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->equalTo(UserEvent::NAME));

        $user = $this->getMockBuilder('AppBundle\Entity\User')
            ->disableOriginalConstructor()
            ->setMethods(array('setEmail'))
            ->getMock();
        $user
            ->expects($this->once())
            ->method('setEmail')
            ->with($email);

        $this->sut->changeEmail($user, $email);
    }

}
