<?php

namespace AppBundle\Controller\admin\Users;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class UsersController extends Controller
{
  /**
  * @Route("/admin/users", name="user_list")
  */

  //List substances
  public function listAction()
  {
    //Gets all substances to the object substances
    $users = $this->getDoctrine()
      ->getRepository('AppBundle:User')
      ->findAll();
    //passess the substances object to the view
    return $this->render('users/list.html.twig', array(
      'users' => $users

    ));
  }


}
