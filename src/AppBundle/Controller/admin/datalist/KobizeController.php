<?php

namespace AppBundle\Controller\admin\datalist;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KobizeController extends Controller
{
    /**
     * @Route("/admin/datalist/kobize", name="kobize")
     */
    public function indexAction()
    {
      //Gets all substances to the object substances
      $kobize = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\kobize')
        ->findAll();
      //passess the substances object to the view
      return $this->render('datalist/kobize/list.html.twig', array(
        'kobize' => $kobize

      ));
    }
}
