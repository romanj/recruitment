<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param $id
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user/{id}", name="homepage")
     */
    public function updateAction($id) {
        $user = $this->get('user_repository')->findOne($id);
        $request = $this->get('request');
        if ($request->getMethod() == Request::METHOD_POST) {
            $email = $request->request->get('email');
            $this->get('user_model')->changeEmail($user, $email);
            return new JsonResponse(['status'=>'changed']);
        }
        return new JsonResponse(['status'=>'failed']);
    }
}
