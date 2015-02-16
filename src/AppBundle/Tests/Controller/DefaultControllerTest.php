<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @covers AppBundle\Controller\DefaultController::updateAction
     */
    public function test_updateAction_ShouldCallPostMethodWithEmailData_ResultIsStatusChanged()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_POST, '/user/1034', array(
            'user' => array(
                'email'  => 'new@mail.com'
            )
        ));
        $response = $client->getResponse();
        $result = json_decode($response->getContent());
        $expected = 'changed';
        $this->assertEquals($expected, $result->status);
    }

    /**
     * @covers AppBundle\Controller\DefaultController::updateAction
     */
    public function test_updateAction_ShouldCallGetMethod_ResultIsStatusFailed()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/1034', array(
            'user' => array(
                'email'  => 'new@mail.com'
            )
        ));
        $response = $client->getResponse();
        $result = json_decode($response->getContent());
        $expected = 'failed';
        $this->assertEquals($expected, $result->status);
    }

    /**
     * @covers AppBundle\Controller\DefaultController::updateAction
     */
    public function test_updateAction_ShouldRetrieveNonExistingUser_ResultIsException()
    {
        $client = static::createClient();
        $client->request(Request::METHOD_POST, '/user/1', array(
            'user' => array(
                'email'  => 'new@mail.com'
            )
        ));
        $code = $client->getResponse()->getStatusCode();
        $expected = 500;
        $this->assertEquals($expected, $code);
    }
}
