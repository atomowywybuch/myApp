<?php

namespace AppBundle\Controller;

use AppBundle\Entity\substances;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SubstanceController extends Controller
{

  /**
  * @Route("/substance/new")
  */

  public function newAction()
  {
    $substances = new substances();
    $substances->setName('Test_name'.rand(1,100));
    $substances->setCas('Test_cas');
    $substances->setWe('Test_we');
    $substances->setVpressure('Test_vpressure');

    $em = $this->getDoctrine()->getManager();
    $em->persist($substances);
    $em->flush();

    return new Response('test created');
  }

  /**
  * @Route("/substance")
  */

  public function listAction()
  {
    $substances = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->findAll();

    return $this->render('substance/index.html.twig', array(
      'substances' => $substances

    ));
  }


}
