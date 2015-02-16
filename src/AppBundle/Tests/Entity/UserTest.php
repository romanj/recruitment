<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\User;

/**
 * Class UserTest
 * @package App\Tests\Entity
 */
class UserTest extends \PHPUnit_Framework_TestCase {

    const ID    = 1;
    const NAME  = 'random';
    const EMAIL = 'random@gmail.com';

    /** @var User - System Under Test */
    private $sut;

    public function setUp() {
        $this->sut = new User(UserTest::ID, UserTest::NAME, UserTest::EMAIL);
    }

    /**
     * @covers AppBundle\Entity\User::__construct
     */
    public function testContstruct_shouldSetIdNameEmail_ResultIsUserObjectStateChange() {
        $this->assertAttributeEquals(UserTest::ID,    'id',    $this->sut);
        $this->assertAttributeEquals(UserTest::NAME,  'name',  $this->sut);
        $this->assertAttributeEquals(UserTest::EMAIL, 'email', $this->sut);
    }

    /**
     * @covers AppBundle\Entity\User::getId
     */
    public function testGetId_ShouldGetIdFieldValue_ResultIsInteger() {
        $expectedEmail = $this->sut->getId();
        $this->assertAttributeEquals($expectedEmail, 'id', $this->sut);
    }

    /**
     * @covers AppBundle\Entity\User::getName
     */
    public function testGetName_ShouldGetNameFieldValue_ResultIsString() {
        $expectedEmail = $this->sut->getName();
        $this->assertAttributeEquals($expectedEmail, 'name', $this->sut);
    }

    /**
     * @covers AppBundle\Entity\User::setEmail
     */
    public function testSetEmail_ShouldSetNewValueToEmailField_ResultIsUserObjectStateChange() {
        $expectedEmail = 'random2@gmail.com';
        $this->assertAttributeEquals(UserTest::EMAIL, 'email', $this->sut);
        $sut = $this->sut->setEmail($expectedEmail);
        $this->assertAttributeEquals($expectedEmail, 'email', $this->sut);
        $this->assertInstanceOf(User::class, $sut);
    }

    /**
     * @covers AppBundle\Entity\User::getEmail
     */
    public function testGetEmail_ShouldGetEmailFieldValue_ResultIsString() {
        $expectedEmail = $this->sut->getEmail();
        $this->assertAttributeEquals($expectedEmail, 'email', $this->sut);
    }
}
